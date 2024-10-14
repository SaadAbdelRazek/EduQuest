<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
class ActivityController extends Controller
{


    public function delete_activity($id){
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->back()->with('success','successfully removed');
    }
}
