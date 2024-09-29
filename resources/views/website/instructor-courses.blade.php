@extends('website.layouts.instructor-dash')
@section('courses')
    active
@endsection
@section('content')
    <center>
        <header>
            <h1>My Course</h1>
        </header>
    </center>
<div class="page-container">
    <div class="courses-container">
        <!-- Course 1 -->
        @foreach($courses as $course)
            <div class="course-card">
                <div class="course-image">
                    <img src="{{asset('storage/'.$course->image)}}" alt="Course 1">
                </div>
                <div class="course-content">
                    <h3 class="course-title">{{$course->title}}</h3>
                    <p class="course-description">{{$course->description}} EGP</p>
                    <p class="course-price">{{$course->price}} </p>
                    @if($course->is_accepted==1)
                        <p style="color:Green">Accepted</p>
                    @elseif($course->is_accepted==0)
                        <p style="color:red">Pending</p>
                    @else
                        <p style="color:red">Declined</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
