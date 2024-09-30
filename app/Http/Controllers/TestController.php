<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function getUserCountsLastFiveDays()
{
    $counts = [];
    for ($i = 0; $i < 5; $i++) {
        $date = Carbon::today()->subDays($i);
        // استخدام count() للحصول على عدد المستخدمين في ذلك اليوم
        $count = DB::table('users')
            ->whereDate('created_at', $date)
            ->count();
        // تخزين العدد في المصفوفة مع ضمان أنه رقم
        $counts[$date->format('Y-m-d')] = (int) $count; // تحويله إلى عدد صحيح
    }
    return $counts;
}
    public function index(){
        if(Auth::check()){
            $data = Auth::user();


            $today = Carbon::today();



            $userCounts = $this->getUserCountsLastFiveDays(); // يجب أن تُعيد مصفوفة من 5 عناصر


            // $users_count = User::where('user_type','user')->count();
            $users = User::all();

            $user_type = $data->is_admin;

            if($user_type == 1){
                return view('admin.dashboard',compact('users','userCounts'));
            }
            else if($user_type == 0){
                // return view('website.index');
                return redirect()->route('home',compact('users'));
            }
        }
        return redirect()->back();
    }

    public function check_dashboard(){
        if(Auth::check()){
            $data = Auth::user();

            // $users_count = User::where('user_type','user')->count();
            $users = User::all();

            $user_type = $data->is_admin;

            if($user_type == 1){
                return view('admin.dashboard',compact('users'));
            }
            else if($user_type == 0){
                // return view('website.index');
                return redirect()->route('home',compact('users'));
            }
        }
        return redirect()->back();
    }


}
