<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\TestController;
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
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('website.index');
})->name('home');
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

Route::get('/instructor-start', function () {
    return view('website.instructor-start');
})->name('instructor-start');

Route::get('/instructor-dashboard', function () {
    return view('website.instructor-dashboard');
})->name('instructor-dashboard');

Route::get('/instructor-add-course', function () {
    return view('website.instructor-add-course');
})->name('instructor-add-course');


Route::get('/myProfile', function () {
    return view('website.myProfile');
})->name('myProfile');

//Route::get('/admin/faqs', function () {
//    return view('admin.faqs');
//})->name('admin-faqs');

Route::resource('/dashboard/faqs', FaqController::class);
Route::get('/faqs', [FaqController::class, 'showFaq'] )->name('faqs');
