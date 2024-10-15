@extends('website.layouts.app')

@section('custom-css')

<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <section class="slider-area slider-area2">
        <div class="slider-active" >
            <!-- Single Slider -->
            <div class="single-slider slider-height2" >
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12" >

                            <div class="hero_caption hero_caption2" >
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">My Profile</h1>


                            </div>
                        </div>
                        <img src="{{asset('img/hero/prof.png')}}" style="width: 200px; margin-top:150px; margin-left:150px;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="profile-container">
        <!-- Sidebar Navigation -->
        <div class="sidebar">
            <h2 style="color: white">Profile Menu</h2>
            <ul>
                <li><a href="#personal-info">Personal Info</a></li>
                <li><a href="#enrolled-courses">Enrolled Courses</a></li>
                <li><a href="#quiz-history">Latest Quizzes</a></li>

                    @if ($user_data->is_instructor ==1)
                        <li><a href="#instructor-link">Instructor Dashboard</a></li>
                        @elseif ($user_data->is_instructor ==0)
                        <li><a href="#instructor-link">Become an Instructor</a></li>
                        @endif

                        @if ($user_data->is_admin == 1)
                        <li><a href="#instructor-link">Admin Dashboard</a></li>

                    @endif

            </ul>
        </div>

        <!-- Main Profile Content -->
        <div class="main-content">
            <!-- Personal Information Section -->
            <div id="personal-info" class="profile-card">
                <div class="profile-photo">
                    <img src="{{asset('storage/'. $user_data->profile_photo_path)}}" alt="Your Photo">
                </div>
                <div class="profile-info">
                    <h2 class="name">{{$user_data->name}}</h2>
                    <p class="email">{{ $user_data->email }}</p>
                    <p class="email"><i class="fas fa-solid fa-phone"></i> {{ $user_data->phone }}</p>
                    <p class="email"><i class="fas fa-solid fa-map"></i> {{ $user_data->address }}</p>
                </div>
                <div class="profile-actions">
                    <a href="{{ route('edit_profile') }}" class="edit-btn">Edit Profile</a>
                </div>
            </div>

            <!-- Enrolled Courses Section -->
            <div id="enrolled-courses" class="section enrolled-courses">
                <h3>My Enrolled Courses</h3>
                <div class="courses-grid">
                    @foreach($courses as $course)
                            <!-- Course Card 1 -->
                            <div class="course-card">
                                <div class="course-image">
                                    <img src="{{asset('storage/'.$course->image)}}" alt="Course Image">
                                </div>
                                <div class="course-content">
                                    <h2 class="course-title">{{$course->title}}</h2>
                                    <p class="course-instructor"><span style="color: orange">Edu</span><span style="color: #6a1b9a">Quest</span></p>
                                    <a href="{{route('course_videos',$course->id)}}" class="btn-view">View Course</a>
                                </div>
                            </div>
                    @endforeach
                </div>

            </div>

            <!-- Latest Quiz History Section -->
            <div id="quiz-history" class="section quiz-history">
                <h3>My Latest Quizzes</h3>
                <div class="quiz-list">
                    @php
                    $quizCount=0;
                    @endphp
                    @foreach($quizHistory as $quiz )
                    <div class="quiz-item">
                        <p><strong>Quiz:</strong>
                            {{-- @for($i=1;$i<2;$i++) --}}
                            {{$quizzes[$quizCount]->title}}
                            {{-- @endfor --}}
                        </p>
                        <p><strong>Score:</strong> {{$quiz->percentage}}%</p>
                        <p><strong>Date:</strong> {{$quiz->created_at->format('F j, Y')}}</p>
                        <div class="quiz-progress">
                            <div class="progress-bar">
                                <div class="progress" style="width: {{$quiz->percentage}}%;"></div>
                            </div>
                        </div>
                    </div>
                        @php
                            // $quizCount++;
                        @endphp
                    @endforeach
                    <!-- Add more quiz history as needed -->
                </div>
            </div>

            <!-- Start as Instructor Section -->
            <div id="instructor-link" class="section instructor-link">
                @if ($user_data->is_instructor ==1)
                    <a href="{{route('instructor-dashboard')}}" class="instructor-button">Your Dashboard</a>
                @else
                    <a href="{{route('instructor-start')}}" class="instructor-button">Start as Instructor</a>
                    @endif
                    @if ($user_data->is_admin == 1)
                    <a href="{{route('dashboard')}}" class="instructor-button">Admin Dashboard</a>
                @endif
            </div>




            <div class="notifications">
                <h3>Notifications</h3>
                @if($courseDeclines->isEmpty())
                    <p>No Notifications Found.</p>
                @else
            <div class="quiz-list">
                @foreach($courseDeclines as $decline)
                    <div class="quiz-item">
                        <p><strong>Course:</strong>
                            {{$decline->course->title}}
                        </p>
                        <p><strong>Reason:</strong> {{ $decline->decline_reason }}</p>
                        <a href="{{route('courses.edit',$decline->course->id)}}" class="btn-view">Edit</a>
                    </div>
                @endforeach
            </div>
                @endif

        </div>
        </div>
    </div>

@endsection
