<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\TestController;
use App\Models\Course;
use App\Models\Review;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function
         ($view) {
            if (Auth::check()) {
                $view->with('user_data', Auth::user());
            }
            

        });

        View::composer('*', function ($view) {


            $all_courses = Course::withCount('reviews')  // حساب عدد التقييمات لكل كورس
                         ->withAvg('reviews', 'rate')  // حساب متوسط التقييمات
                         ->get();

    // الكورسات الأرخص مع حساب متوسط التقييمات
    $cheap_courses = Course::withAvg('reviews', 'rate')
                           ->orderBy('price', 'asc')
                           ->limit(5)
                           ->get();


            $view->with('all_courses',$all_courses);
            $view->with('home_courses', $cheap_courses);
            // $view->with('course_review', $course_review);
        });

        View::composer('admin.layouts.dash', function ($view) {
            $userCounts = (new TestController())->getUserCountsLastFiveDays(); // استبدل YourController باسم الكنترولر الخاص بك
            $view->with('userCounts', $userCounts);
        });
    }
}
