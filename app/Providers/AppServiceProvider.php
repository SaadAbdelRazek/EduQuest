<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\TestController;
use App\Models\Course;


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
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('user_data', Auth::user());
            }
        });

        View::composer('*', function ($view) {


            $cheap_courses = Course::orderBy('price', 'asc')->limit(5)->get();



            $view->with('all_courses', Course::all());
            $view->with('home_courses', $cheap_courses);
        });

        View::composer('admin.layouts.dash', function ($view) {
            $userCounts = (new TestController())->getUserCountsLastFiveDays(); // استبدل YourController باسم الكنترولر الخاص بك
            $view->with('userCounts', $userCounts);
        });
    }
}
