<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index(){
        if(Auth::check()){
            $data = Auth::user();

            // $users_count = User::where('user_type','user')->count();
            $users = User::all();

            $user_type = $data->is_admin;

            if($user_type == 1){
                return view('website.book-details');
            }
            else if($user_type == 0){
                return view('dashboard');
            }
        }
        return redirect()->back();
    }
}
