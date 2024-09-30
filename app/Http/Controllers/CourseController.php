<?php
namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'sections.*.videos.*' => 'required|mimes:mp4,mkv,avi|max:40240' // 10MB max for each video
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
        $course=Course::where('id', $id)->first();
        $sections=Section::where('id', $id)->get();
        $videos=Video::where('id', $id)->get();
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


}

