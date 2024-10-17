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

<form class="container h-100" action="{{ route('video.update' ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="file" name="video" value="{{asset('img/.$adVideo->video')}}" >
    <label class="form-label">Video</label>
    <button class="m-3 w-25 btn btn-danger">Update</button>

</form>
<br>


@endsection