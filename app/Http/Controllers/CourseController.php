<?php
namespace App\Http\Controllers;

use App\Models\CourseProgress;
use App\Models\Quiz;
use App\Models\Video;
use http\Client\Response;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Exceptions\PostTooLargeException;


class CourseController extends Controller
{

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'objectives' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'num_sections' => 'required|integer|min:1',
            'sections.*.title' => 'required|string',
            'sections.*.videos.*' => 'required|mimes:mp4,mkv,avi|max:80240' // 10MB max for each video
        ]);

        // Store the course image
        $imagePath = $request->file('image')->store('course_images', 'public');

        // Create the course
        $course = Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'objectives' => $request->objectives,
            'category' => $request->category,
            'price' => $request->price,
            'image' => $imagePath
        ]);

        // Loop through sections and store them
        foreach ($request->sections as $sectionData) {
            $section = Section::create([
                'course_id' => $course->id,
                'title' => $sectionData['title']
            ]);

            // Store videos for the section
            if (isset($sectionData['videos'])) {
                foreach ($sectionData['videos'] as $video) {
                    $videoPath = $video->store('section_videos', 'public');
                    $section->videos()->create([
                        'path' => $videoPath
                    ]);
                }
            }
        }
        auth()->user()->courses()->save($course);

        // Redirect to a success page or display a success message
        return redirect()->back()->with('success', 'Course created successfully!');
    }

    public function showMyCourses()
    {
        $instructor = Auth::user();

        // Get the courses that belong to this instructor
        $courses = $instructor->courses; // Since we already defined the relationship in User model

        // Return view with the courses data
        return view('website.instructor-courses', compact('courses'));
    }
    public function showAdminCourses()
    {
        $courses = Course::where('is_accepted', 0)
            ->get();
        return view('admin.admin-courses', compact('courses'));
    }
    public function viewCourse($id){
        $course = Course::find($id);


        if (!$course) {
            return redirect()->back()->with('error', 'Course not found');
        }

        $sections = Section::where('course_id', $course->id)->get();

        $videos = [];

// Loop through each section to retrieve its videos
        foreach ($sections as $section) {
            $sectionVideos = Video::where('section_id', $section->id)->get();
            $videos[$section->id] = $sectionVideos; // Store videos by section ID
        }

        return view('admin.admin-view-course', compact('course', 'sections', 'videos'));
    }

    public function acceptCourse($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }

        $course->is_accepted = 1;
        $course->save();

        return redirect()->back();
    }
    public function declineCourse($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found.');
        }

        $course->is_accepted = 2;
        $course->save();

        return redirect('admin-pending-courses');
    }

    public function showAccepted(){
        $accepted=Course::where('is_accepted', 1)->get();
        return view('admin.admin-courses', ['filter' =>'accepted','accepted'=>$accepted]);
    }
    public function showDeclined(){
        $declined=Course::where('is_accepted', 2)->get();
        return view('admin.admin-courses', ['filter' => 'declined', 'declined'=>$declined ]);
    }
    public function showPending(){
        $pending=Course::where('is_accepted', 0)->get();
        return view('admin.admin-courses', ['filter' => 'pending', 'pending'=>$pending ]);
    }



    //------------------------------------------------------------------


    public function edit($id)
    {
        $course = Course::find($id);


        if (!$course) {
            return redirect()->back()->with('error', 'Course not found');
        }

        $sections = Section::where('course_id', $course->id)->get();

        $videos = [];

// Loop through each section to retrieve its videos
        foreach ($sections as $section) {
            $sectionVideos = Video::where('section_id', $section->id)->get();
            $videos[$section->id] = $sectionVideos; // Store videos by section ID
        }

        return view('website.instructor-view-course', compact('course','sections','videos'));
    }

    // Handle the course update logic
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'objectives' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // If a new image is uploaded
        ]);

        $course = Course::find($id);

        if (!$course) {
            return redirect()->back()->with('error', 'Course not found');
        }

        // Update course details
        $course->title = $request->input('title');
        $course->description = $request->input('description');
        $course->objectives = $request->input('objectives');
        $course->price = $request->input('price');
        $course->category = $request->input('category');

        // Handle image update if a new one is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('course_images', 'public');
            $course->image = $imagePath;
        }

        $course->save();

        // Update sections and videos
        if ($request->has('sections')) {
            foreach ($request->sections as $section_id => $section_title) {
                $section = Section::find($section_id);
                if ($section) {
                    $section->title = $section_title;
                    $section->save();
                }
            }
        }

        return redirect()->route('courses.edit', $id)->with('success', 'Course updated successfully');
    }

//    ------------------------------------------------
public function viewCourseQuiz($id)
{
    $course=Course::where('id', $id)->first();
    return view('website.course-quiz', compact('course'));
}

    public function viewAllCourseDetails($id){
        $course = Course::find($id);
        $sections=Section::where('course_id', $id)->get();
        $firstSection = $sections->first();

        // Get the first video from the first section
        $firstVideo = null;
        if ($firstSection && $firstSection->videos->isNotEmpty()) {
            $firstVideo = $firstSection->videos->first();
        }

        $videos = [];

// Loop through each section to retrieve its videos
        foreach ($sections as $section) {
            $sectionVideos = Video::where('section_id', $section->id)->get();
            $videos[$section->id] = $sectionVideos; // Store videos by section ID
        }
        $instructor = User::where('id', $course->user_id)->first();

        //Course progress

        $userId = auth()->id();
        $completedVideos = CourseProgress::where('user_id', $userId)
            ->where('course_id', $id)
            ->count();

        $videoCount = Video::whereHas('section', function($query) use ($id) {
            $query->where('course_id', $id);
        })->count();

        // Calculate progress percentage
        $progress = ( $completedVideos /$videoCount) * 100;



        //-----------------------------------------------------
        //// show course quizzes-------------------------------
        $quizzes=Quiz::where('course_id', $id)->get();




        return view('website.course_videos', compact('course', 'videos','firstVideo','sections','instructor','progress','quizzes'));
    }
//    ------------------------------------------------------------------------------

// Course Progress

    public function markVideoAsCompleted(Request $request,$id)
    {

        $request->validate([
            'course_id' => 'required|integer',
            'video_id' => 'required|integer',
        ]);

       // $user = auth()->user();
        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $progress = CourseProgress::updateOrCreate(
            [
                'user_id' => $userId,
                'course_id' => $request->course_id,
                'video_id' => $request->video_id,
            ],
            [
                'status' => true,
                'updated_at' => now(),
            ]
        );
        return response()->json(['success' => 'Video marked as completed'], 200);
    }




}



