@extends('website.layouts.app')
@section('content')


<style>
    .sidebar {
        width: 30%;
        background-color: #2e2e3a;
        height: 580px; /* Sidebar is limited to a specific height */
        overflow-y: auto;
        padding: 20px;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        margin-left: 20px; /* Spacing between sidebar and video */
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .sidebar-logo img {
        width: 60px;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .sidebar li {
        margin-bottom: 10px;
    }

    .sidebar a {
        display: block;
        text-decoration: none;
        color: #fff;
        font-size: 16px;
        padding: 12px;
        background-color: #333344;
        border-radius: 8px;
        transition: background 0.3s ease, color 0.3s ease;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .sidebar a:hover {
        background-color: #575787;
        color: #e0e0e0;
    }

    .sidebar a.active {
        background: linear-gradient(135deg, #d41872, #6a1b9a);
        color: white;
    }

    .sidebar a i {
        margin-right: 10px;
        font-size: 18px;
    }

    .sidebar .section-header {
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        background-color: #4c4c61;
        padding: 12px;
        border-radius: 8px;
        color: #fff;
        transition: background 0.3s ease;
    }

    .sidebar .section-header:hover {
        background-color: #5e5e73;
    }

    .sidebar .section-content {
        display: none;
        padding: 0;
        margin-top: 10px;
    }

    .sidebar .section-content a {
        font-size: 14px;
        padding-left: 20px;
        padding-right: 10px;
    }

    .sidebar .section.active .section-content {
        display: block;
    }

    /* Responsive for Smaller Screens */
    @media screen and (max-width: 992px) {
        .container {
            flex-direction: column;
        }

        .main-content, .sidebar {
            width: 100%;
        }

        .sidebar {
            height: auto; /* Full height when in mobile view */
            margin-left: 0;
        }
    }
    /* General Styles */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    /* Container for Main Content and Sidebar */
    .container {
        display: flex;
        flex-wrap: wrap;
        max-width: 1400px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Video Container */
    .video-container {
        flex: 3;
        padding-right: 20px;
    }

    /* Video Player */
    #course-video {
        width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Course Details */
    .course-details {
        margin-top: 20px;
    }

    .course-details h1 {
        font-size: 26px;
        margin-bottom: 15px;
        color: #333;
    }

    /* Instructor Details */
    .instructor-details {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .instructor-details img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .instructor-info h4 {
        font-size: 18px;
        color: #555;
    }

    /* Modern Progress Bar */
    .progress-bar {
        width: 100%;
        background-color: #e0e0e0;
        height: 14px;
        border-radius: 10px;
        margin-top: 10px;
        position: relative;
        overflow: hidden;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .progress-bar::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: linear-gradient(to right, #a445b2, #d41872);
        transition: width 0.5s ease-in-out;
        border-radius: 10px;
    }

    .progress {
        background-color: #6a1b9a;
        height: 100%;
        width: 50%; /* Example percentage */
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(106, 27, 154, 0.5);
    }

    /* Comments Section */
    .comments {
        margin-top: 40px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .comments h2 {
        font-size: 22px;
        color: #333;
        margin-bottom: 20px;
    }

    /* Comment Input */
    .comment-box {
        margin-bottom: 20px;
    }

    .comment-box textarea {
        width: 100%;
        height: 100px;
        padding: 15px;
        border: none;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.05);
        font-size: 16px;
        color: #333;
        resize: none;
        transition: box-shadow 0.3s ease;
    }

    .comment-box textarea:focus {
        outline: none;
        box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .submit-comment {
        padding: 10px 25px;
        background-color: #a445b2;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 16px;
        text-transform: uppercase;
    }

    .submit-comment:hover {
        background-color: #d41872;
    }

    /* Comment List */
    .comment-list {
        margin-top: 20px;
    }

    .comment {
        background-color: #f7f7f7;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        margin-bottom: 15px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .comment strong {
        font-weight: 600;
        color: #333;
    }

    .comment p {
        font-size: 15px;
        color: #555;
    }

    /* Review Section */
    .course-review {
        margin-top: 40px;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .course-review h2 {
        font-size: 22px;
        color: #333;
        margin-bottom: 20px;
    }

    .course-review p {
        font-size: 18px;
        color: #777;
        margin-bottom: 20px;
    }

    .review-box textarea {
        width: 100%;
        height: 80px;
        padding: 15px;
        border-radius: 8px;
        background-color: #f9f9f9;
        border: none;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.05);
        font-size: 16px;
        color: #333;
        resize: none;
        transition: box-shadow 0.3s ease;
    }

    .review-box textarea:focus {
        outline: none;
        box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .submit-review {
        padding: 10px 25px;
        background-color: #ff5722;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 16px;
        text-transform: uppercase;
    }

    .submit-review:hover {
        background-color: #e64a19;
    }
    .course-title {
        background-color: #4C4C6D; /* Dark purple background */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        margin-left: 180px ;
        width: 80%;
        max-width: 770px;
        text-align: center;
    }

    /* Title Text */
    .course-title h2 {
        font-size: 28px;
        font-weight: bold;
        color: white;
        letter-spacing: 1px;
        margin: 0;
        text-transform: uppercase;
    }

    /* Responsive Adjustments */
    @media (max-width: 1200px) {
        .course-title {
            font-size: 1.8rem; /* Slightly smaller font size */
            padding: 15px; /* Reduce padding */
            margin-left: 90px;
        }
    }

    @media (max-width: 992px) {
        .course-title {
            font-size: 1.6rem; /* Smaller font size */
            padding: 10px; /* Further reduce padding */
            margin-left: 70px;
        }
    }

    @media (max-width: 768px) {
        .course-title {
            font-size: 1.4rem; /* Even smaller font size for tablets */
            padding: 8px; /* Further reduce padding */
            width: 95%; /* Slightly increase width on smaller screens */
            margin-left: 50px;
        }
    }

    @media (max-width: 576px) {
        .course-title {
            font-size: 1.2rem; /* Small font size for mobile */
            padding: 5px; /* Minimal padding for mobile */
            width: 100%; /* Full width for mobile */
            margin-left: 25px;
        }
    }

    /* Responsive for smaller screens */
    @media screen and (max-width: 768px) {
        .course-title {
            width: 90%;
        }

        .course-title h2 {
            font-size: 24px;
        }
    }
    .navbar-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100px; /* Adjust the height of the background */
        background: linear-gradient(135deg, #6a0572, #a4508b); /* Purple to pink gradient */
        z-index: -1; /* Position behind the navbar */
    }
    #course-video{
        max-height: 550px;
    }

</style>
<div class="navbar-bg"></div>
<br><br><br><br><br>
<div class="course-title">
    <h2>{{$course->title}}</h2>
</div>
<!-- Main Container -->
<div class="container">
    <!-- Main Video Area -->
    <div class="video-container">
        <!-- Video Player -->
        <video id="course-video" controls>
            <source id="video-source" data-id="{{ $firstVideo->id }}" src="{{ asset('storage/' . $firstVideo->path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Course Title and Instructor -->
        <div class="course-details">
            <h1>{{$course->title}}</h1>
            <div class="instructor-details">
                <img src="{{asset('storage/'.$instructor->profile_photo_path)}}" alt="Instructor Image">
                <div class="instructor-info">
                    <h4>Instructor: {{$instructor->name}}</h4>
                </div>
            </div>
            <!-- Progress Bar -->
            <p><strong>Course Progress : </strong></p>
           @if($progress)
                <div class="progress-bar" style="width: {{$progress}}%">
                    <div class="progress"></div>
                </div>
                <p><strong>{{number_format($progress, 2)  }}%</strong></p>
               @if($progress==100 && $course->price != 0)
                   <a href="{{route('certificate',$course->id)}}" class="submit-comment"> Get Certificate</a>
               @endif
            @else
               <p>No Progress Yet</p>
           @endif
        </div>

        <!-- Comments Section -->
        <div class="comments">
            <h2>Comments</h2>
            <div class="comment-box">
                <textarea placeholder="Add a comment..."></textarea>
                <button class="submit-comment">Submit</button>
            </div>
            <div class="comment-list">
                <div class="comment">
                    <strong>Student1</strong>
                    <p>This course is great!</p>
                </div>
                <div class="comment">
                    <strong>Student2</strong>
                    <p>Really helped me understand the topic.</p>
                </div>
            </div>
        </div>

        <!-- Review Section -->
        <div class="course-review">
            <h2>Course Reviews</h2>
            <p>Average Rating: 4.5/5</p>
            <div class="review-box">
                <textarea placeholder="Write a review..."></textarea>
                <button class="submit-review">Submit Review</button>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <div class="sidebar-logo">
            <p style="color: white">
                <strong>{{$course->title}}</strong>
            </p>
        </div>
        <ul>
            @php
            $sectionCounter=1;
            @endphp
            @foreach($sections as $section)
            <li class="section">
                <div class="section-header">
                    <span><i class="fas fa-folder"></i> Section {{$loop->iteration}}: {{$section->title}}</span>
                    <span>+</span>
                </div>
                <div class="section-content">
                    @if(isset($videos[$section->id]) && count($videos[$section->id]) > 0)
                        @foreach($videos[$section->id] as $video)
                           <a data-video-url="{{ asset('storage/' . $video->path) }}" data-video-id="{{ $video->id }}" class="video-link" style="color: white">Video {{ $loop->iteration }} </a>
                        @endforeach
                    @endif
                        @foreach($quizzes as $quiz)
                            @if($quiz->section_no==$sectionCounter)
                             <a href="{{route('quiz',$quiz->id)}}">Quiz {{$loop->iteration}}</a>
                            @endif
                        @endforeach
                </div>
            </li>
                @php
                $sectionCounter++;
                @endphp
            @endforeach

        </ul>
    </div>

</div>



<script>
    // script.js
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    // Handle collapsing and expanding sections
    document.querySelectorAll('.section-title').forEach(function(sectionTitle) {
        sectionTitle.addEventListener('click', function() {
            const sectionId = this.getAttribute('data-section');
            const videoList = document.getElementById(sectionId);

            // Toggle the visibility of the video list
            if (videoList.style.display === 'none' || videoList.style.display === '') {
                videoList.style.display = 'block';  // Show
            } else {
                videoList.style.display = 'none';  // Hide
            }
        });
    });

    // Sample dynamic function to handle video click events
    document.querySelectorAll('.video-list li a').forEach(function(videoLink) {
        videoLink.addEventListener('click', function(e) {
            e.preventDefault();
            const videoSrc = '';
            document.getElementById('course-video').src = videoSrc;
        });
    });

    document.querySelectorAll('.section-header').forEach(header => {
        header.addEventListener('click', () => {
            const section = header.parentElement;
            section.classList.toggle('active');
        });
    });

    function toggleSidebar() {
        document.querySelector('.sidebar').classList.toggle('active');
    }


    // Course Progress
    var videoPlayer = document.getElementById('course-video');

    videoPlayer.addEventListener('ended', function() {
        // Mark the video as completed by sending an AJAX request
        // Add CSRF token for all Axios requests
        console.log('Video ended, sending data to the server...');

        let url = window.location.pathname;
        let videoId = url.substring(url.lastIndexOf('/') + 1);

        axios.post('{{route('course_progress',$course->id)}}', {
            course_id: '{{ $course->id }}',
            video_id: videoId,
        }).then(function(response) {
            alert('Video marked as completed');
        }).catch(function(error) {
            console.error('Error marking video:', error);
        });
    });






    document.querySelectorAll('.video-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();  // لمنع التحديث الكامل للصفحة

            var videoUrl = this.getAttribute('data-video-url'); // الحصول على رابط الفيديو من data attribute
            var videoId = this.getAttribute('data-video-id');   // الحصول على ID الفيديو

            // تحديث الفيديو المعروض
            var videoPlayer = document.getElementById('course-video');
            var videoSource = document.getElementById('video-source');
            videoSource.src = videoUrl;           // تغيير الـ URL للفيديو
            videoSource.setAttribute('data-id', videoId);  // تعيين الـ data-id لمعرفة الفيديو الحالي

            videoPlayer.load();  // إعادة تحميل الفيديو لعرض الفيديو الجديد

            // تحديث الـ URL في شريط العناوين دون إعادة تحميل الصفحة
            window.history.pushState({}, '', '/course_videos/{{$course->id}}/' + videoId);
        });
    });





</script>

@endsection
