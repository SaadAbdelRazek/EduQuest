<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\TestController;


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

        View::composer('admin.layouts.dash', function ($view) {
            $userCounts = (new TestController())->getUserCountsLastFiveDays(); // استبدل YourController باسم الكنترولر الخاص بك
            $view->with('userCounts', $userCounts);
        });
    }
}
