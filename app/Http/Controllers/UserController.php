<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\BeInstructorAnswer;
use App\Models\BeInstructorQuestion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $data = User::all();
        return view('admin.users',compact('data'));
    }

    public function destroy($id){
        $data = User::findOrFail($id);
        if($data->id == Auth::user()->id){
            return redirect()->back()->with('message','you cant remove yourself');
        }

        else
        $data->delete();
        return redirect()->back()->with('message','removed successfully');
    }
}
