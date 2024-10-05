<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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
}
