@extends('admin.layouts.dash')
@section('adVideo')
    active
@endsection
@section('activity-title')
Ad Video
@endsection
@section('content')
@php
// Define the variable to hide the div in the layout
$hideSpecialDiv = true;
@endphp

<form class="container h-100" action="{{ route('video.update', $adVideo->id ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    {{-- <textarea name="description" id="" cols="30" rows="10">{{$adVideo->description}}</textarea> --}}
    <input type="file" name="video" value="{{asset('img/.$adVideo->video')}}" >
    <label class="form-label">Video</label>
    <button class="m-3 w-25 btn btn-danger">Update</button>
    
</form>
@if($adVideo->video)
    <div class="form-group">
        <label class="form-label">Current Video:</label>
        <video width="320" height="240" controls>
            <source src="{{ asset('videos/'. $adVideo->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
@endif

<script>
    // JavaScript لتحميل الفيديو المختار وعرضه
    document.getElementById('videoInput').addEventListener('change', function(event) {
        const videoFile = event.target.files[0]; // الحصول على الملف المختار

        if (videoFile) {
            const videoPreview = document.getElementById('videoPreview'); // عنصر الفيديو
            const videoSource = document.getElementById('videoSource'); // مصدر الفيديو

            // إنشاء رابط لعرض الفيديو
            const videoURL = URL.createObjectURL(videoFile);
            videoSource.src = videoURL;
            videoPreview.style.display = 'block'; // عرض عنصر الفيديو

            videoPreview.load(); // إعادة تحميل الفيديو الجديد
        }
    });
</script>


@endsection
