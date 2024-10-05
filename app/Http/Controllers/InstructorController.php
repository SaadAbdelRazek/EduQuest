<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Instructor;
use App\Models\Course;

class InstructorController extends Controller
{
    public function index(){
        // return redirect()->route('instructor-dashboard');
        return view('website.instructor-dashboard');
    }

    public function add_course(){
        $categories = Category::all();
        return view('website/instructor-add-course',compact('categories'));
    }

    public function show_profile($id){
        // Instructor::with('User');
        // $course_instructor = Instructor::where('user_id',$id)->get();
        $course_instructor = Instructor::with(['courses','user'])->where('user_id',$id)->firstOrFail();

        return view('website.instructor-profile',compact('course_instructor'));
    }
}
