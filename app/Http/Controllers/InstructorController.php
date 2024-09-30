<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
    public function index(){
        // return redirect()->route('instructor-dashboard');
        return view('website.instructor-dashboard');
    }

    public function add_course(){

        return view('website.instructor-add-course');
    }
}
