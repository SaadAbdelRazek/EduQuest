<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instructor;
use App\Models\Review;
use App\Models\Course;

class InstructorController extends Controller
{
    public function index(){
        // return redirect()->route('instructor-dashboard');
        return view('website.instructor-dashboard');
    }

    public function add_course(){

        return view('website.instructor-add-course');
    }

    public function show_profile($id)
{
    // جلب معلومات المستخدم (المدرب) باستخدام معرف المستخدم
    $course_instructor = User::where('id', $id)->firstOrFail();

    // جلب معلومات المدرب بناءً على user_id
    $instructor = Instructor::where('user_id', $id)->firstOrFail();

    // جلب الدورات المرتبطة بالمدرب
    $courses = Course::where('user_id', $instructor->user_id)->get();

    // تجميع الدورات بناءً على العنوان
    $coursesGrouped = $courses->groupBy('title');

    // اختيار عنوان كل دورة بشكل فريد
    $uniqueCourses = $coursesGrouped->map(function ($group) {
        return $group->first(); // اختيار العنصر الأول من كل مجموعة
    })->values(); // إعادة ترتيب القيم لتكون مجموعة جديدة

    // جلب المراجعات المرتبطة بكل دورة
    $reviews = Review::whereIn('course_id', $courses->pluck('id'))->get();


    return view('website.instructor-profile', compact('course_instructor', 'instructor', 'courses', 'uniqueCourses', 'reviews'));
}

}
