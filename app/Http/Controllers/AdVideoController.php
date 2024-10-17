<?php

namespace App\Http\Controllers;

use App\Models\AdVideo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdVideoController extends Controller
{
    public function index()
    {
        $adVideoes = AdVideo::all();
        return view('admin.adVideo-controll',[
            'adVideoes' => $adVideoes, 
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('admin.adVideo-create', [
            'users' => $users, 
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov|max:20000',
        ]);
        $video =  time() . '.' . $request->video->extension();
        $request->video->move(public_path('img'), $video);
        
        $video = 'img/' . $video;
        
         // Save the video path to the database
         AdVideo::create([
            'video' => $video,
        ]);
        return to_route('adVideo-controll');
    }


    // public function edit(){
    //     $user = User::all();
    //     $adVideo = AdVideo::all();
    //     return view('admin.videoEdit' ,compact('adVideo','user'));
    // }
    
    // public function update(Request $request ,$id){

    //     $request->validate([
    //         'video' => 'required|mimes:mp4,avi,mov|max:20000',
    //     ]);
    //     $adVideo = AdVideo::all();
    //     if (!$adVideo) {
    //         return response()->json(['error' => 'Video not found'], 404);
    //     }
    //     if ($adVideo->file_path && Storage::disk('public')->exists($adVideo->file_path)) {
    //         Storage::disk('public')->delete($adVideo->file_path);
    //     }
    //     // Store the new video file in the public storage
    //     $newVideoPath = $request->file('video')->store('videos', 'public');

    //     // Save the video path to the database
    //         AdVideo::create([
    //             'description' => $request->description,
    //             'video' => $adVideo,
    //         ]);

        
    //     return to_route('adVideo-controll', compact('adVideo','id'));

    // }
    public function destroy($id)
    {

        $adVideo = AdVideo::findOrFail($id);
        $adVideo->delete();

        return to_route('adVideo-controll', $id);
    }
}
