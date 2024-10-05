<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instructor;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;


class ReviewsController extends Controller
{
    public function index(){
        $data = Review::all();
        return view('website.courses');
    }

    public function submitReview(Request $request, $courseId)
{
    // التحقق من صحة البيانات
    $validated = $request->validate([
        'rate' => 'required|numeric|min:1|max:5',
        'comment' => 'required|string|max:500',
        'instructor_id' => 'required|exists:instructors,user_id', // التأكد من وجود المدرب
    ]);

    // التحقق مما إذا كان المستخدم مسجل دخول
    $user = auth()->user();

    // جلب المدرب بناءً على user_id
    $instructor = Instructor::where('user_id', $request->instructor_id)->first();
    if (!$instructor) {
        return redirect()->back()->with('error', 'Instructor not found.');
    }

    // التحقق مما إذا كان المستخدم قد قيم المدرب من قبل
    $existingReview = Review::where('course_id', $courseId)
                             ->where('user_id', $user->id)
                             ->first();

    if ($existingReview) {
        return redirect()->back()->with('error', 'You have already rated this instructor for this course.');
    }

    // إضافة تقييم جديد
    $review = new Review();
    $review->course_id = $courseId;
    $review->user_id = $user->id; // المستخدم الذي يقوم بالتقييم
    $review->rate = $request->rate;
    $review->comment = $request->comment;
    $review->save();

    // تحديث تقييم المدرب
    $this->updateInstructorRating($instructor->user_id);





    return redirect()->back()->with('success', 'Review submitted successfully!');
}


private function updateInstructorRating($instructorId)
{
    // جلب جميع المراجعات الخاصة بالدورات التي يدرسها المدرب بناءً على user_id
    $courses = Course::where('user_id', $instructorId)->pluck('id');

    // جلب جميع المراجعات التي تخص تلك الدورات
    $reviews = Review::whereIn('course_id', $courses)->orWhere('user_id',$instructorId)->get();

    if ($reviews->count() > 0) {
        // حساب متوسط التقييمات
        $averageRating = round($reviews->avg('rate') * 2) / 2;

        // تحديث تقييم المدرب
        $instructor = Instructor::where('user_id', $instructorId)->first();
        if ($instructor) {
            $instructor->rating = $averageRating; // تحديث تقييم المدرب
            $instructor->save();
        }
    }

}

public function deleteReview($reviewId)
{
    // جلب المراجعة بناءً على المعرف
    $review = Review::find($reviewId);

    // التحقق مما إذا كانت المراجعة موجودة
    if (!$review) {
        // إذا لم يتم العثور على المراجعة، يمكنك التعامل مع الحالة هنا
        return redirect()->back()->with('error', 'Review not found.');
    }

    // إذا كانت المراجعة موجودة، قم بحذفها
    $review->delete();

    // تحديث تقييم المدرب بعد الحذف
    $this->updateInstructorRating($review->course->user_id);

    return redirect()->back()->with('success', 'Review deleted successfully.');
}

public function update_review(Request $request,$id){
    $rev = Review::findOrFail($id);
    $rev->comment = $request->comment;
    $rev->save();
    return redirect()->back();

}



public function delete_review($id)
{
    // البحث عن التقييم وحذفه
    $review = Review::find($id);
    $review->delete();

    // تحديث تقييم المدرب بعد حذف التقييم
    $this->updateInstructorRating($review->course->user_id);

    // إعادة توجيه المستخدم إلى صفحة المراجعات
    return redirect()->back()->with('success', 'Review deleted successfully!');
}


public function showCourseReviews($course_id)
{
    // جلب الكورس مع المراجعات والمستخدمين المرتبطين بها
    $course = Course::with(['reviews.user'])->findOrFail($course_id);


    // return view('course.reviews', compact('course'));
    return view('website.instructor-profile', compact('course'));
}






}
