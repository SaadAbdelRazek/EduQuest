<?php

namespace App\Http\Controllers;
use App\Models\CourseDecline;
use App\Models\Enrollment;
use App\Models\Quiz;
use App\Models\QuizHistory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getUserCountsLastFiveDays()
{
    $counts = [];
    for ($i = 0; $i < 5; $i++) {
        $date = Carbon::today()->subDays($i);
        // استخدام count() للحصول على عدد المستخدمين في ذلك اليوم
        $count = DB::table('users')
            ->whereDate('created_at', $date)
            ->count();
        // تخزين العدد في المصفوفة مع ضمان أنه رقم
        $counts[$date->format('Y-m-d')] = (int) $count; // تحويله إلى عدد صحيح
    }
    return $counts;
}
    public function index(){
        if(Auth::check()){
            $data = Auth::user();


            $today = Carbon::today();



            $userCounts = $this->getUserCountsLastFiveDays(); // يجب أن تُعيد مصفوفة من 5 عناصر


            // $users_count = User::where('user_type','user')->count();
            $users = User::all();

            $user_type = $data->is_admin;

            if($user_type == 1){
                return view('admin.dashboard',compact('users','userCounts'));
            }
            else if($user_type == 0){
                // return view('website.index');
                return redirect()->route('home',compact('users'));
            }
        }
        return redirect()->back();
    }

    public function check_dashboard(){
        if(Auth::check()){
            $data = Auth::user();

            // $users_count = User::where('user_type','user')->count();
            $users = User::all();

            $user_type = $data->is_admin;

            if($user_type == 1){
                return view('admin.dashboard',compact('users'));
            }
            else if($user_type == 0){
                // return view('website.index');
                return redirect()->route('home',compact('users'));
            }
        }
        return redirect()->back();
    }

    public function courses_details($id){
        $course_info = Course::with('User')->findOrFail($id);
        $user = auth()->user();
        $enrolledUsers = Enrollment::where('course_id', $course_info->id)->where('user_id',$user->id)->exists();

        return view('website.course_details',compact('course_info','enrolledUsers'));


    }

    public function viewProfile()
    {
        $user = Auth::user();
        $userEnrolledCourses=Enrollment::where('user_id',$user->id)->get('course_id');
        $courses = Course::whereIn('id', $userEnrolledCourses)->get();
        $quizHistory=QuizHistory::where('user_id',$user->id)->get();

        $quizHist = QuizHistory::select('quiz_id')->get();

        // Step 2: Extract the quiz IDs from the result
        $quizIds = $quizHist->pluck('quiz_id'); // This will return an array of quiz IDs

        // Step 3: Fetch related quizzes from the quizzes table using the quiz IDs
        $quizzes = Quiz::whereIn('id', $quizIds)->get();

        $courseDeclines = CourseDecline::with('course')
            ->where('user_id', $user->id)
            ->get();
        return view('website.myProfile',compact('courses','quizHistory','quizzes','courseDeclines'));
    }


}
