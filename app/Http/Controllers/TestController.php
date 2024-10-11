<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Enrollment;
use App\Models\Review;
use App\Models\Activity;
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
            $activities = Activity::with('user')->orderBy('created_at', 'desc')->get();

            if($user_type == 1){
                return view('admin.dashboard',compact('users','activities'));
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
            $activities = Activity::with('user')->orderBy('created_at', 'desc')->get();

            if($user_type == 1){
                return view('admin.dashboard',compact('users','activities'));
            }
            else if($user_type == 0){
                // return view('website.index');
                return redirect()->route('home',compact('users'));
            }
        }
        return redirect()->back();
    }




    public function courses_details($id) {



        // جلب معلومات الدورة مع بيانات المستخدم (المدرب)
        $course_info = Course::with('user')->findOrFail($id);


        $user = auth()->user();
        $enrolledUsers = Enrollment::where('course_id', $course_info->id)->where('user_id',$user->id)->exists();
        $instructor_students = Enrollment::with('course','instructor_id',$course_info->user_id)->count();


        // جلب المدرب بناءً على user_id المرتبط بالدورة
        $instructor = Instructor::where('user_id', $course_info->user_id)->firstOrFail();

        // جلب الدورات المرتبطة بالمدرب
        $courses = Course::where('user_id', $instructor->user_id)->get();

        // تجميع الدورات بناءً على العنوان
        $coursesGrouped = $courses->groupBy('title');

        // اختيار عنوان كل دورة بشكل فريد
        $uniqueCourses = $coursesGrouped->map(function ($group) {
            return $group->first(); // اختيار العنصر الأول من كل مجموعة
        })->values();

        // حساب إجمالي عدد المراجعات لكل الدورات
        // جلب جميع الدورات المرتبطة بالمدرب


// جمع المراجعات الخاصة بالدورات
$reviewsCount = $courses->sum(function ($course) {
    return $course->reviews->count(); // جمع عدد المراجعات لكل دورة
});

// إضافة المراجعات الخاصة بالمدرب نفسه إذا كان لديه مراجعات شخصية
$instructorReviews = Review::where('user_id', $instructor->user_id)->count(); // جلب عدد المراجعات الخاصة بالمدرب

// جمع العدد الكلي للمراجعات (للدورات وللمدرب نفسه)
$totalReviewsCount = $reviewsCount + $instructorReviews;

        // حساب متوسط التقييمات وعدد المراجعات للدورة المحددة
        $averageRating = $course_info->reviews->avg('rate');
        $totalReviews = $course_info->reviews->count();

        $course = Course::findOrFail($id); // جلب الدورة باستخدام الـ id

        // تمرير المتغيرات إلى العرض
        return view('website.course_details', compact(
            'course_info', 'instructor', 'reviewsCount','course', 'courses', 'averageRating', 'totalReviews','totalReviewsCount','enrolledUsers','instructor_students',
        ));
    }








}
