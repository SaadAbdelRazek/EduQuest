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
        $adVideo = AdVideo::all();
        
        return view('admin.adVideo-controll', compact('adVideo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:20000',
            'video' => 'required|mimes:mp4,avi,mov|max:20000',
        ]);

        // $videoPath = $request->file('video')->store('videos', 'public');
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time().'.'.$video->getClientOriginalExtension();
            $video->move(public_path('video'), $videoName);

            // Save the video path to the database
            AdVideo::create([
                'description' => $request->description,
                'video' => $video,
            ]);
            return back()->with('success', 'Video uploaded successfully.');
        }
        

        return redirect()->route('about')->with('success', 'Done');
    }


    public function edit(){
        $user = User::all();
        $adVideo = AdVideo::all();
        return view('admin.videoEdit' ,compact('adVideo','user'));
    }
    
    public function update(Request $request ,$id){

        $request->validate([
            'video' => 'required|mimes:mp4,avi,mov|max:20000',
        ]);
        $adVideo = AdVideo::all();
        if (!$adVideo) {
            return response()->json(['error' => 'Video not found'], 404);
        }
        if ($adVideo->file_path && Storage::disk('public')->exists($adVideo->file_path)) {
            Storage::disk('public')->delete($adVideo->file_path);
        }
        // Store the new video file in the public storage
        $newVideoPath = $request->file('video')->store('videos', 'public');

        // Update the video record with the new file path
        // Save the video path to the database
            AdVideo::create([
                'description' => $request->description,
                'video' => $adVideo,
            ]);

        // if ($request->hasFile('video')) {
        //     $video = $request->file('video');
        //     $videoName = time().'.'.$video->getClientOriginalExtension();
        //     $video->move(public_path('video'), $videoName);

        //     $adVideo = AdVideo::findOrFail();
        //     $adVideo->delete();

        //     // Save the video path to the database
        //     AdVideo::create([
        //         'description' => $request->description,
        //         'video' => $video,
        //     ]);
        // }

        
        return to_route('adVideo-controll', compact('adVideo','id'));

    }
}
