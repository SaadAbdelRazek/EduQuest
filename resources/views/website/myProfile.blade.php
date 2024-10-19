@extends('website.layouts.app')

@section('custom-css')

<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section('content')
    <main>
        <section class="slider-area slider-area2">
            <div class="slider-active">
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">  

                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">My  
                                        Profile</h1>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item"><a  
                                                                           href="#">my profile</a></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('img/hero/prof.png')}}" style="width: 100%; max-height:180px; margin-top:150px;" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="profile-container">
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
                    <li><a href="#notification">Notifications</a></li>
                </ul>
            </div>

            <div class="main-content">
                <div class="profile-card" id="personal-info">
                    <div class="profile-photo">
                        @if ($user_data->profile_photo_path)
                            <img class="submenu"
                                    src="{{ asset('storage/' . $user_data->profile_photo_path) }}"
                                    alt class="d-block ui-w-80"
                                    style="width:50px; border-radius:50%; height:50px; object-fit: cover;">
                        @else
                            <img class="submenu"
                                    src="{{ asset('/img/icon/default_prof_img.jpg') }}"
                                    alt class="d-block ui-w-80"
                                    style="width:50px; border-radius:50%; height:50px; object-fit: cover;">
                        @endif
                    </div>
                    @if ($instructor)
                        <div class="profile-info">
                            <h2 class="name">{{$user_data->name}}</h2>
                            <p class="email"><i class="fas fa-envelope"></i> <a href="mailto:{{ $user_data->email }}" style="color: gray">{{ $user_data->email }}</a></p>
                            <p class="phone"><i class="fas fa-phone-alt"></i> {{ $instructor->phone }}</p>
                            <p class="bio"><i class="fas fa-user"></i> {{ $instructor->bio }}</p>
                            <p class="university"><i class="fas fa-university"></i> {{ $instructor->university_name }}</p>
                            <p class="experience"><i class="fas fa-calendar-alt"></i> {{ $instructor->experience_years }} Years of Experience</p>
                            <p class="specialization"><i class="fas fa-briefcase"></i> {{ $instructor->specialization }}</p>
                            <p class="description"><i class="fas fa-info-circle"></i> {{ $instructor->description }}</p>
                            <p class="address"><i class="fas fa-map-marker-alt"></i> {{ $user_data->address }}</p>
                        </div>


                    @else
                    <div class="profile-info">
                        <h2 class="name">{{$user_data->name}}</h2>
                        <p class="email">{{ $user_data->email }}</p>
                        <p class="email"><i class="fas fa-solid fa-phone"></i> {{ $user_data->phone }}</p>
                        <p class="email"><i class="fas fa-solid fa-map"></i> {{ $user_data->address }}</p>
                    </div>

                    @endif

                    <div class="profile-actions">
                        <a href="{{ route('edit_profile') }}" class="edit-btn">Edit basic Profile</a>
                        <a href="{{ route('instructor_dashboard_info') }}" class="edit-btn">Edit Instructor Profile</a>
                        @if ($user_data->is_admin == 1)
                            <a href="{{route('dashboard')}}" class="edit-btn">Admin Dashboard</a>
                        @endif
                    </div>
                </div>

                <div id="enrolled-courses"></div><br>
                <div class="section enrolled-courses">
                    <h3>My Enrolled Courses</h3>
                    <div class="courses-grid">
                        @php
                            $cardCount=0;
                        @endphp
                        @foreach($courses as $course)
                            @if($cardCount>2)
                                <div class="course-card-o" style="display: none;" id="item">
                                    <div class="course-image-o">
                                        <img src="{{asset('storage/'.$course->image)}}" alt="Course Image">
                                    </div>
                                    <div class="course-content-o">
                                        <h2 class="course-title-o">{{$course->title}}</h2>
                                        <p class="course-instructor-o"><span style="color: orange">Edu</span><span style="color: #6a1b9a">Quest</span></p>
                                        <a href="{{route('course_videos',$course->id)}}" class="btn-view">View Course</a>
                                    </div>
                                </div>
                            @else
                                <div class="course-card-o">

                                    <div class="course-image-o">
                                        <img src="{{asset('storage/'.$course->image)}}" alt="Course Image">
                                    </div>
                                    <div class="course-content-o">
                                        <h2 class="course-title-o">{{$course->title}}</h2>
                                        <p class="course-instructor-o"><span style="color: orange">Edu</span><span style="color: #6a1b9a">Quest</span></p>
                                        <a href="{{route('course_videos',$course->id)}}" class="btn-view">View Course</a>
                                    </div>
                                </div>
                            @endif
                            @php
                                $cardCount++;
                            @endphp
                        @endforeach
                    </div><br>
                    <div >
                        @if($cardCount==4 && $totalCourses >= $cardCount)
                            <button class="show-more-courses" id="show-more-btn">Show More <i class="fas fa-chevron-down"></i> </button>
                        @endif
                    </div>
                </div>

            <!-- Latest Quiz History Section -->
            <!-- Latest Quiz History Section -->
                <div id="quiz-history"></div><br>
                <div class="section quiz-history">
                    <h3>My Latest Quizzes</h3>
                    <div class="quiz-list">
                        @php
                            $quizCount=0;
                            $count=0;
                        @endphp
                        @foreach($quizHistory as $quiz )
                            @if($quizCount>1)
                                <div class="quiz-item" style="display: none;" id="quizItem">
                                    <p><strong>Quiz:</strong>
                                        {{-- @for($i=0;$i<1;$i++) --}}
                                        {{$quizzes[$count]->title}}
                                        {{-- @endfor --}}
                                    </p>
                                    <p><strong>Score:</strong> {{$quiz->percentage}}%</p>
                                    <p><strong>Date:</strong> {{$quiz->created_at->format('F j, Y')}}</p>
                                    <div class="quiz-progress">
                                        <div class="progress-bar">
                                            <div class="progress" style="width: {{$quiz->percentage}}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="quiz-item">
                                    <p><strong>Quiz:</strong>
                                        {{-- @for($i=0;$i<1;$i++) --}}
                                        {{$quizzes[$count]->title}}
                                        {{-- @endfor --}}
                                    </p>
                                    <p><strong>Score:</strong> {{$quiz->percentage}}%</p>
                                    <p><strong>Date:</strong> {{$quiz->created_at->format('F j, Y')}}</p>
                                    <div class="quiz-progress">
                                        <div class="progress-bar">
                                            <div class="progress" style="width: {{$quiz->percentage}}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @php
                                $quizCount++;
                            @endphp
                        @endforeach
                    </div><br>
                    @if($quizCount==3 && $totalQuizzes >= $quizCount)
                        <button class="show-more-courses" id="show-more-quizzes">Show More <i class="fas fa-chevron-down"></i> </button>
                    @endif
                </div>



                <div class="cart-item1" style="height: 200px">
                    <img src="{{asset('img/instructor.jpg')}}" alt="" class="course-thumbnail1">
                    <div class="course-details1">
                        @if ($user_data->is_instructor !=1)
                            <h3 class="course-title1">Start as Instructor</h3>
                            <p class="course-instructor1">Start your career as instructor in EduQuest Platform</p>
                        @else
                            <h3 class="course-title1">your Dashboard</h3>
                            <p class="course-instructor1">Keep Going in your career as instructor in EduQuest Platform</p>
                        @endif
                    </div>
                    <div class="cart-actions1">
                        @if ($user_data->is_instructor ==1)
                            <a href="{{route('instructor-dashboard')}}" class="instructor-button">Your Dashboard</a>
                        @else
                            <a href="{{route('instructor-start')}}" class="instructor-button">Start as Instructor</a>
                        @endif
                    </div>
                </div>


                <div id="notification"></div>
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
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const items = document.querySelectorAll("#item");
            const showMoreBtn = document.getElementById("show-more-btn");
            // Add click event listener to "Show More" button
            showMoreBtn.addEventListener("click", function () {
                items.forEach(item => {
                    item.style.display = "block"; // Show all items
                });
                showMoreBtn.style.display = "none"; // Hide the button after showing all items
            });

        });

        document.addEventListener("DOMContentLoaded", function () {
            const quizItems = document.querySelectorAll(".quiz-item"); // Select all quiz items by class
            const showMoreQuiz = document.getElementById("show-more-quizzes");
            showMoreQuiz.addEventListener("click", function () {
                quizItems.forEach(quizItem => {
                    quizItem.style.display = "block"; // Show all items
                });
                showMoreQuiz.style.display = "none"; // Hide the button after showing all items
            });
        });
    </script>
</main>
@endsection
