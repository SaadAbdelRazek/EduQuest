<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BeInstructorQuestionController;
use App\Http\Controllers\BeInstructorAnswerController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('website.index');
})->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');

// ============================================= middlewares ========================================================

Route::middleware(['auth:sanctum', 'verified','Admin'])->get('/dashboard',[TestController::class,'check_dashboard'])->name('dashboard');

Route::middleware(['auth', 'Admin'])->group(function () {

    Route::resource('/dashboard/faqs', FaqController::class);
    Route::resource('/dashboard/instructor-questions', BeInstructorQuestionController::class);
    Route::resource('/dashboard/users', UserController::class);
});

Route::middleware(['auth', 'isInstructor'])->group(function () {
    Route::get('/instructor-start', [InstructorController::class, 'index'])->name('instructor-start');
    Route::get('/instructor-dashboard', [InstructorController::class, 'index'])->name('instructor-dashboard');
    Route::get('/instructor-dashboard/add-course', [InstructorController::class, 'add_course'])->name('instructor-add-course');


});

Route::middleware(['auth', 'isStudent'])->group(function () {

    Route::get('/instructor-start', [BeInstructorQuestionController::class, 'showQuestions'])->name('instructor-start');
    Route::post('/submit-answers', [BeInstructorAnswerController::class, 'storeAnswers'])->name('submit.answers');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/myProfile', function () {
        return view('website.myProfile');
    })->name('myProfile');

    Route::get('/edit_profile', function () {
        return view('profile.show');
    })->name('edit_profile');
});


// ========================================================================================================


Route::get('/elements', function () {
    return view('website.elements');
})->name('elements');
Route::get('/book-details', function () {
    return view('website.book-details');
})->name('book-details');
Route::get('/courses', function () {
    return view('website.courses');
})->name('courses');

Route::get('/course_details', function () {
    return view('website.course_details');
})->name('course_details');

Route::get('/course_videos', function () {
    return view('website.course_videos');
})->name('course_videos');


Route::get('/contact', function () {
    return view('website.contact');
})->name('contact');


Route::get('/blog', function () {
    return view('website.blog');
})->name('blog');
Route::get('/blog-details', function () {
    return view('website.blog-details');
})->name('blog-details');


Route::get('/about', function () {
    return view('website.about');
})->name('about');
//Route::get('/admin/dashboard', function () {
//    return view('admin.dashboard');
//
//})->name('admin.dashboard');
Route::get('/categories', function () {
    return view('website.categories');
})->name('categories');
Route::get('/home', [TestController::class, 'index'] )->name('admin');



Route::get('/instructor-courses', [CourseController::class, 'showMyCourses'] )->name('instructor-courses');
Route::post('/instructor-add-course', [CourseController::class, 'store'])->name('courses.store');

Route::get('/instructor-add-course', function () {
    return view('website.instructor-add-course');
})->name('instructor-add-course');


Route::get('/myProfile', function () {
    return view('website.myProfile');
})->name('myProfile');

Route::get('/edit_profile', function () {
    return view('profile.show');
})->name('edit_profile');

Route::get('/admin-pending-courses',[CourseController::class, 'showPending'])->name('pending-courses');
Route::get('/admin-accepted-courses',[CourseController::class, 'showAccepted'])->name('accepted-courses');
Route::get('/admin-declined-courses',[CourseController::class, 'showDeclined'])->name('declined-courses');
Route::get('/admin-view-course/{id}',[CourseController::class, 'viewCourse'])->name('admin-view-course');
Route::get('/admin-courses/accept/{id}', [CourseController::class, 'acceptCourse'])->name('courses.accept');
Route::get('/admin-courses/decline/{id}', [CourseController::class, 'declineCourse'])->name('courses.decline');


//Route::get('/admin/faqs', function () {
//    return view('admin.faqs');
//})->name('admin-faqs');

Route::resource('/dashboard/faqs', FaqController::class);
Route::get('/faqs', [FaqController::class, 'showFaq'] )->name('faqs');
