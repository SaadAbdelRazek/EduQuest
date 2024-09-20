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
