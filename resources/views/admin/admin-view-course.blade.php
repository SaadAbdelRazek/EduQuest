@extends('admin.layouts.dash')
@section('Courses')
    active
@endsection
@section('activity-title')
    Courses
@endsection
@section('content')
    <div class="course-container">
        <!-- Course Header -->
        <div class="course-header">
            <h1>Course Title: {{$course->title}}</h1>
            <p class="course-price">{{$course->price}}</p>
        </div>

        <!-- Course Image -->
        <div class="course-image">
            <img src="{{asset('storage/'.$course->image)}}" alt="Course Image">
        </div>

        <!-- Course Details -->
        <div class="course-details">
            <!-- Description -->
            <div class="course-section">
                <h3>Description</h3>
                <p class="course-description">
                    {{$course->description}}
                </p>
            </div>

            <!-- Objectives -->
            <div class="course-section">
                <h3>Objectives</h3>
                <p class="course-description">
                    {{$course->objectives}}
                </p>
            </div>

            <!-- Category -->
            <div class="course-section">
                <h3>Category</h3>
                <p class="course-category">{{$course->category}}</p>
            </div>

            <!-- Sections -->
            <div class="course-section">
                <h3>Course Sections</h3>
                <ul>
                    @foreach($sections as $section)
                    <li><span>Section {{$loop->iteration}}</span> : {{$section->title}}</li>
                    @endforeach
                </ul>
            </div>

            <!-- Section Videos -->
            <div class="course-section">
                <h3>Videos</h3>
                <div class="video-container">
                    @foreach($videos as $video)
                    <div class="video-card">
                        <video controls>
                            <source src="{{asset('storage/'.$video->path)}}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="course-section">
                @if($course->is_accepted==0)
                <a href="{{ route('courses.accept', $course->id) }}" class="btn-accept" >Accept</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{{ route('courses.decline', $course->id) }}" class="btn">Decline</a>
                @elseif($course->is_accepted==1)
                    <a href="{{ route('courses.decline', $course->id) }}" class="btn">Decline</a>
                @else
                    <a href="{{ route('courses.accept', $course->id) }}" class="btn-accept" >Accept</a>
                @endif
            </div>
        </div>
    </div>

@endsection
