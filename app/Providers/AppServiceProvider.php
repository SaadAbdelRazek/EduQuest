<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\TestController;
use App\Models\Course;
use App\Models\User;



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
        // Passing authenticated user data to all views
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('user_data', Auth::user());
            }
        });

        // Passing courses data to all views
        View::composer('*', function ($view) {
            $cheap_courses = Course::orderBy('price', 'asc')->limit(5)->get();
            $view->with('all_courses', Course::all());
            $view->with('home_courses', $cheap_courses);
        });

        // Passing user counts and all users to the admin dashboard view
        View::composer('admin.layouts.dash', function ($view) {
            $userCounts = (new TestController())->getUserCountsLastFiveDays(); // Fetch user counts for admin dashboard
            $users = User::all(); // Fetch all users
            $view->with('userCounts', $userCounts);
            $view->with('users', $users); // Pass users data to the view
        });
    }
}
