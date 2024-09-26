<?php

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
Route::get('/elements', function () {
    return view('website.elements');
})->name('elements');
Route::get('/book-details', function () {
    return view('website.book-details');
})->name('book-details');
Route::get('/faqs', function () {
    return view('website.faqs');
})->name('faqs');
Route::get('/courses', function () {
    return view('website.courses');
})->name('courses');
Route::get('/login', function () {
    return view('website.login');
})->name('login');
Route::get('/register', function () {
    return view('website.register');
})->name('register');
Route::get('/main', function () {
    return view('website.main');
});
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
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin');

Route::get('course_details',function () {
    return view('website.course_details');
})->name('course_details');
Route::get('course_videos',function () {
    return view('website.course_videos');
})->name('course_videos');



Route::get('/myProfile', function () {
    return view('website.myProfile');
})->name('myProfile');


