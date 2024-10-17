@extends('admin.layouts.dash')
@section('adVideo')
    active
@endsection
@section('activity-title')
Add AdVideo
@endsection
@section('content')
@php
// Define the variable to hide the div in the layout
$hideSpecialDiv = true;
@endphp

<form class="container h-100" action="{{ route('adVideo.store' ) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <label class="form-label">Video</label>
    <input type="file" name="video">
    <button class="m-3 w-25 btn btn-danger">Add</button>
    
</form>
<br>


@endsection