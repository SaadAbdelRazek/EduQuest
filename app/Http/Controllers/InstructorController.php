<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Enrollment;
use App\Models\Instructor;
use App\Models\Review;
use App\Models\Course;
use Carbon\Carbon;

class InstructorController extends Controller
{
    public function getNewEnrollmentsLastFiveDays()
{
    $user = auth()->user();  // المستخدم الحالي
    $instructor = Instructor::where('user_id', $user->id)->first();  // المدرب الذي ينتمي للمستخدم الحالي
    $counts = [];

    // حساب عدد الطلاب لكل يوم في آخر 5 أيام
    for ($i = 0; $i < 5; $i++) {
        $date = Carbon::today()->subDays($i);  // الحصول على تاريخ اليوم قبل i أيام

        // حساب عدد التسجيلات (الطلاب) في ذلك اليوم
        $count = Enrollment::whereHas('course', function ($query) use ($instructor) {
                $query->where('instructor_id', $instructor->id);  // دورات المدرب الحالي
            })
            ->whereDate('created_at', $date)  // تاريخ التسجيل في ذلك اليوم
            ->count();

        // تخزين العدد في المصفوفة مع التاريخ
        $counts[$date->format('Y-m-d')] = (int) $count;  // تخزين العدد مع تاريخ اليوم
    }

    return $counts;  // إرجاع المصفوفة التي تحتوي على عدد الطلاب لكل يوم
}





public function getUserCountsLastFiveDays()
{
    $counts = [];
    for ($i = 0; $i < 5; $i++) {
        $date = Carbon::today()->subDays($i);

        // استخدام count() للحصول على عدد المستخدمين الذين سجلوا دخولهم في ذلك اليوم
        $count = DB::table('users')
            ->whereDate('last_seen', $date) // استخدام last_login بدلاً من created_at
            ->count();

        // تخزين العدد في المصفوفة مع ضمان أنه رقم
        $counts[$date->format('Y-m-d')] = (int) $count; // تحويله إلى عدد صحيح
    }
    return $counts;
}

    public function index(){
        $user = auth()->user();
        $userCounts = $this->getUserCountsLastFiveDays();
        $newUserCounts = $this->getNewEnrollmentsLastFiveDays();
        $instructor = Instructor::where('user_id', $user->id)->first();
    if ($instructor) {
        // حساب عدد الطلاب المسجلين في دورات هذا المدرب
        $students = Enrollment::whereHas('course', function($query) use ($instructor) {
            $query->where('instructor_id', $instructor->id);
        });
        $students_count = $students->count();
    } else {
        $students = 0;
    }

    $rating = Review::where('instructor_id', $instructor->id)->avg('rate');

    $total_enrolls = Course::where('instructor_id', $instructor->id)
    ->withCount('enrollments') // لحساب عدد الملتحقين في كل دورة
    ->get()
    ->sum(function($course) {
        return $course->price * $course->enrollments_count;
    });

    $courses = Course::where('instructor_id',$instructor->id)->count();



        return view('website.instructor-dashboard', compact('students','students_count','total_enrolls','rating','courses','userCounts','newUserCounts'));
    }

    public function add_course(){
        $categories = Category::all();
        return view('website.instructor-add-course',compact('categories'));
    }

    public function show_profile($id)
{
    // جلب معلومات المستخدم (المدرب) باستخدام معرف المستخدم
    $course_instructor = User::where('id', $id)->firstOrFail();

    // جلب معلومات المدرب بناءً على user_id
    $instructor = Instructor::where('user_id', $id)->firstOrFail();

    // جلب الدورات المرتبطة بالمدرب
    $courses = Course::where('instructor_id', $instructor->id)->get();

    // تجميع الدورات بناءً على العنوان
    $coursesGrouped = $courses->groupBy('title');

    // اختيار عنوان كل دورة بشكل فريد
    $uniqueCourses = $coursesGrouped->map(function ($group) {
        return $group->first(); // اختيار العنصر الأول من كل مجموعة
    })->values(); // إعادة ترتيب القيم لتكون مجموعة جديدة

    // جلب المراجعات المرتبطة بكل دورة
    $reviews = Review::whereIn('course_id', $courses->pluck('id'))->orWhere('instructor_id',$instructor->id)->get();


    return view('website.instructor-profile', compact('course_instructor', 'instructor', 'courses', 'uniqueCourses', 'reviews'));
}


public function instructor_info(){
    $user = auth()->user();
    $instructor = Instructor::where('user_id',$user->id)->first();

    return view('website.instructor-dashboard-info',compact('instructor'));
}

public function instructor_info_update(Request $request ,$id){

    $request->validate([
        'description' => 'nullable|string|max:400',
        'spec' => 'nullable|string|max:200',
        'degree' => 'nullable|string|max:100',
        'university' => 'nullable|string|max:100',
        'bio' => 'nullable|string|max:250',
        'phone' => 'nullable|max:13',
    ]);

    $instructor = Instructor::findOrFail($id);

    $instructor->description = $request->description;
    $instructor->specialization = $request->spec;
    $instructor->academic_degree = $request->degree;
    $instructor->university_name = $request->university;
    $instructor->bio = $request->bio;
    $instructor->phone = $request->phone;
    $instructor->save();
    return redirect()->back()->with('success',' successfully updated');


}

}
