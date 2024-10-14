<?php

use App\Http\Controllers\ContactController;use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SettingController;use App\Http\Controllers\TestController;
use App\Http\Controllers\BeInstructorQuestionController;
use App\Http\Controllers\BeInstructorAnswerController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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
/*Route::get('/', function () {
    return view('website.index');
})->name('home'); */

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
    Route::get('/instructor-dashboard/add-course', [InstructorController::class, 'add_course'])->name('instructor_add_course');


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

Route::get('/course_details/{id}', [TestController::class, 'courses_details'] )->name('course_details');
Route::get('/course-instructor/{id}',[InstructorController::class,'show_profile'])->name('course-instructor');


Route::get('/course_videos/{course_id}',[CourseController::class,'viewAllCourseDetails'])->name('course_videos');
Route::post('/course_videos/{course_id}',[CourseController::class,'markVideoAsCompleted'])->name('course_progress');
//Route::post('/save-video-progress', [CourseController::class, 'saveVideoProgress'])->name('save-video-progress');

Route::get('/contact', function () {
    return view('website.contact');
})->name('contact');
Route::get('/enrollment', function () {
    return view('website.enrollment');
})->name('enrollment');


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

Route::get('/home', [TestController::class, 'index'] )->name('admin');



Route::get('/instructor-courses', [CourseController::class, 'showMyCourses'] )->name('instructor-courses');
Route::post('/instructor-add-course', [CourseController::class, 'store'])->name('courses.store');

//Route::get('/instructor-add-courses', function () {
//    return view('website.instructor-add-course');
//})->name('instructor-add-course');



Route::get('/myProfile', function () {
    return view('website.myProfile');
})->name('myProfile');

Route::get('/edit_profile', function () {
    return view('profile.show');
})->name('edit_profile');

Route::get('/course-quiz/{id}',[CourseController::class,'viewCourseQuiz'])->name('course-quiz');

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


Route::get('/instructor-view-course/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');

Route::post('/instructor-view-course/{id}/update', [CourseController::class, 'update'])->name('courses.update');

Route::get('categories', [CategoryController::class, 'categories'])->name('categories');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('dashboard/categories', [CategoryController::class, 'categories_table'])->name('categories_table');
Route::get('category/add',[CategoryController::class,'index_category'])->name('category_add');
Route::post('category',[CategoryController::class,'create_category'])->name('category_data');
Route::get("/category/delete/{id}",[CategoryController::class,'delete_category'])->name("category_delete");
Route::get('/category/edit/{id}', [CategoryController::class, 'edit_category'])->name('category_edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update_category'])->name('category_update');
Route::get('/', [CategoryController::class, 'home'])->name('home');



Route::post('/course-quiz', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('view-course-quizzes/{course_id}',[QuizController::class, 'index'])->name('course-quizzes');
Route::get('view-quiz-details/{course_id}',[QuizController::class, 'viewQuizDetails'])->name('view-quiz');
Route::get('/quizzes/{quiz_id}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
Route::post('/quizzes/{quiz_id}/update', [QuizController::class, 'update'])->name('quizzes.update');
Route::delete('/quizzes/{quiz_id}/delete', [QuizController::class, 'destroy'])->name('quizzes.delete');

Route::get('/enroll-course/{courseId}', [EnrollmentController::class, 'viewEnrollForm'])->name('view.enroll.course');
Route::post('/enroll-course/{courseId}', [EnrollmentController::class, 'enrollCourse'])->name('enroll.course');


Route::get('/quiz/{id}', [QuizController::class,'showQuizForUser'])->name('quiz');
Route::post('/quiz/{quiz_id}/submit', [QuizController::class, 'submitQuiz'])->name('quiz.submit');
Route::get('/quiz/{id}/user-answers', [QuizController::class, 'showUserAnswers'])->name('quiz.user_answers');



Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::put('/contacts/{id}/status', [ContactController::class, 'updateStatus'])->name('contacts.updateStatus');

Route::resource('settings', SettingController::class);

Route::get('/contact', [SettingController::class, 'settingshow'])->name('contact');


