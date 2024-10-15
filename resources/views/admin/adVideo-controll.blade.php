@extends('admin.layouts.dash')
@section('adVideo-controll')
active
@endsection
@section('activity-title')
AdVideo
@endsection
@section('content')
    @php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp

<div class="d-block justify-content-center">


    @foreach ($adVideo as $adVideo)

    @endforeach
    <video width="600" controls>
        <source src="{{ asset($adVideo->video) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="d-flex flex-row mt-5">
        <div>
            <a href="{{route('video.edit', $adVideo->id)}}" class="btn btn-danger ">Edit Video</a>
        </div>
    </div>
    
</div>


@endsection