
@extends('website.layouts.instructor-dash')
@section('info')
    Additional Info
@endsection
@section('content')
<div class="main-content">

    <div class="container" style=" margin-left: 50px">
        @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" style="padding:10px; width:35%; background-color:rgb(41, 142, 55); color:white; border-radius:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" style="background-color: unset; cursor: pointer; margin-left:20px;" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" style="padding:10px; width:35%; background-color:rgb(239, 96, 96); color:white; border-radius:5px;" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" style="background-color: unset; cursor: pointer; margin-left:20px;" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif

        <form class="container" action="{{route('instructor_info_update', $instructor->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">specialization</label>
                <input type="text" name="spec" value="{{ $instructor->specialization }}" class="single-input">
            </div>
            <div class="form-group">
                <label class="form-label">academic degree</label>
                <input type="text" name="degree" value="{{ $instructor->academic_degree }}" class="single-input">
            </div>

            <div class="form-group">
                <label class="form-label">university name</label>
                <input type="text" name="university" value="{{ $instructor->university_name }}" class="single-input">
            </div>
            <div class="form-group">
                <label class="form-label">Bio</label>
                <input type="text" name="bio" value="{{ $instructor->bio }}" class="single-input">
            </div>
            <div class="form-group">
                <label class="form-label">description</label>
                <input type="text" name="description" value="{{ $instructor->description }}" class="single-input">
            </div>
            <div class="form-group">
                <label class="form-label">phone</label>
                <input type="tel" name="phone" value="{{ $instructor->phone }}" class="single-input">
            </div>




            <button class="btn edit-btn">Update</button>
        </form>

    </div>

</div>

@endsection
