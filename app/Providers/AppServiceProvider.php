<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\TestController;
use App\Models\Course;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Review;
use App\Models\Instructor;
use App\Models\Enrollment;
use App\Models\Favourite;
use App\Models\Cart;
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
            else{
                return view('auth.login');
            }


        });

        // Passing courses data to all views
        View::composer('*', function ($view) {

            // جلب جميع الكورسات مع حساب عدد التقييمات ومتوسط التقييم لكل كورس
            $all_courses = Course::with(['instructor.user'])  // جلب بيانات المدرسين
                                 ->withCount('reviews')  // حساب عدد التقييمات لكل كورس
                                 ->withAvg('reviews', 'rate')  // حساب متوسط التقييمات
                                 ->get();

            // جلب الكورسات الأرخص مع حساب متوسط التقييمات
            $cheap_courses = Course::withAvg('reviews', 'rate')  // حساب متوسط التقييم
                                   ->withCount('reviews')  // حساب عدد التقييمات
                                   ->orderBy('price', 'asc')  // ترتيب حسب السعر
                                   ->limit(5)  // تحديد 5 كورسات فقط
                                   ->get();

            // حساب عدد جميع الكورسات
            $courses_count = Course::count();

            

            // إرسال البيانات إلى جميع الـ Views
            $view->with('all_courses', $all_courses);
            $view->with('home_courses', $cheap_courses);  // الكورسات الأرخص
            $view->with('courses_count', $courses_count);
        });


        // Passing user counts and all users to the admin dashboard view
        View::composer('admin.layouts.dash', function ($view) {
            $userCounts = (new TestController())->getUserCountsLastFiveDays(); // Fetch user counts for admin dashboard
            $newUserCounts = (new TestController())->getNewUserCountsLastFiveDays(); // Fetch user counts for admin dashboard
            // $userCounts = (new InstructorController())->getUserCountsLastFiveDays(); // Fetch user counts for admin dashboard
            // $newUserCounts = (new InstructorController())->getNewUserCountsLastFiveDays(); // Fetch user counts for admin dashboard
            $users = User::all(); // Fetch all users
            $view->with('userCounts', $userCounts);
            $view->with('newUserCounts', $newUserCounts);
            $view->with('users', $users); // Pass users data to the view
        });

        view::composer('*', function ($view) {
            $categories = Category::all();

            $categories_count = $categories->count();

            $reviews_count = Review::all()->count();

            $feedbacks_count = Contact::all()->count();
            $enrollments_count = Enrollment::all()->count();

            $favourites_count = Favourite::all()->count();
            $cart_count = Cart::all()->count();


            $view->with('categories',$categories);
            $view->with('categories_count',$categories_count);
            $view->with('reviews_count',$reviews_count);
            $view->with('feedbacks_count',$feedbacks_count);
            $view->with('enrollments_count',$enrollments_count);
            $view->with('favourites_count',$favourites_count);
            $view->with('cart_count',$cart_count);

        });
    }
}
