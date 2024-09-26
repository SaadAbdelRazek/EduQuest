<?php

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
Route::get('/faqs', function () {
    return view('website.faqs');
})->name('faqs');
Route::get('/courses', function () {
    return view('website.courses');
})->name('courses');
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin-login');
Route::get('/admin/register', function () {
    return view('admin.register');
})->name('admin-register');
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


Route::get('/myProfile', function () {
    return view('website.myProfile');
})->name('myProfile');

