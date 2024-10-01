@extends('website.layouts.app')
@section('content')

{{--    <section class="slider-area slider-area2">--}}
{{--        <div class="slider-active">--}}
{{--            <!-- Single Slider -->--}}
{{--            <div class="single-slider slider-height2">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xl-8 col-lg-11 col-md-12">--}}
{{--                            <div class="hero__caption hero__caption2">--}}
{{--                                <h1 data-animation="bounceIn" data-delay="0.2s">My Courses</h1>--}}
{{--                                <!-- breadcrumb Start-->--}}
{{--                                <nav aria-label="breadcrumb">--}}
{{--                                    <ol class="breadcrumb">--}}
{{--                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">Courses</a></li>--}}
{{--                                        <li class="breadcrumb-item"><a href="#">Course Videos</a></li>--}}
{{--                                    </ol>--}}
{{--                                </nav>--}}
{{--                                <!-- breadcrumb End -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}



{{--    <div class="container">--}}
{{--        <h1>Course Videos</h1>--}}

{{--        <div class="video-player">--}}
{{--            <h2 class="video-title">Current Video Title</h2>--}}
{{--            <iframe width="100%" height="450" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allowfullscreen></iframe>--}}
{{--            <p class="video-description">In this video, you will learn about the key concepts of the course and how to apply them effectively.</p>--}}
{{--        </div>--}}



{{--        <div class="video-list-container" id="videoList">--}}
{{--            <h3>Video List</h3>--}}
{{--            <div class="toggle-button" onclick="toggleVideoList()">--}}
{{--                <span class="toggle-icon">+</span> <!-- الرمز الافتراضي -->--}}
{{--                Show List--}}
{{--            </div>--}}
{{--            <div class="video-list" id="videoListContent">--}}
{{--                <div class="video-item">--}}
{{--                    <div class="video-header" onclick="toggleDetails('video1-details')">--}}
{{--                        <h4>Video Title 1 (5 min)</h4>--}}
{{--                        <span class="toggle-icon">+</span>--}}
{{--                    </div>--}}
{{--                    <div class="video-details" id="video1-details" style="display: none;">--}}
{{--                        <p>Description: This video covers the basics of the course.</p>--}}
{{--                        <a href="#" onclick="loadVideo('VIDEO_ID1', 'Video Title 1')">Watch Now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="video-item">--}}
{{--                    <div class="video-header" onclick="toggleDetails('video2-details')">--}}
{{--                        <h4>Video Title 1 (5 min)</h4>--}}
{{--                        <span class="toggle-icon">+</span>--}}
{{--                    </div>--}}
{{--                    <div class="video-details" id="video2-details" style="display: none;">--}}
{{--                        <p>Description: This video covers the basics of the course.</p>--}}
{{--                        <a href="#" onclick="loadVideo('VIDEO_ID1', 'Video Title 1')">Watch Now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="video-item">--}}
{{--                    <div class="video-header" onclick="toggleDetails('video3-details')">--}}
{{--                        <h4>Video Title 1 (5 min)</h4>--}}
{{--                        <span class="toggle-icon">+</span>--}}
{{--                    </div>--}}
{{--                    <div class="video-details" id="video3-details" style="display: none;">--}}
{{--                        <p>Description: This video covers the basics of the course.</p>--}}
{{--                        <a href="#" onclick="loadVideo('VIDEO_ID1', 'Video Title 1')">Watch Now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- المزيد من الفيديوهات حسب الحاجة -->--}}
{{--            </div>--}}
{{--        </div>--}}




{{--        <div class="progress-section">--}}
{{--            <h2>Course Progress</h2>--}}
{{--            <div class="progress-bar-container">--}}
{{--                <div class="progress-bar" style="width: 75%;"></div> <!-- النسبة يمكن تعديلها ديناميكيًا -->--}}
{{--            </div>--}}
{{--            <div class="progress-text">Completed: 75%</div>--}}
{{--        </div>--}}


{{--        <div class="resources-section">--}}
{{--            <h2>Additional Resources</h2>--}}
{{--            <ul>--}}
{{--                <li><a href="resource1.pdf" target="_blank">Resource 1: PDF Guide</a></li>--}}
{{--                <li><a href="resource2.pdf" target="_blank">Resource 2: Cheat Sheet</a></li>--}}
{{--                <li><a href="resource3.pdf" target="_blank">Resource 3: Study Material</a></li>--}}
{{--                <!-- المزيد من الموارد حسب الحاجة -->--}}
{{--            </ul>--}}
{{--        </div>--}}

{{--        <button class="back-button" onclick="goBack()">Back to Course</button>--}}
{{--    </div>--}}

{{--    <script>--}}
{{--        function toggleVideoList() {--}}
{{--    const videoListContent = document.getElementById('videoListContent');--}}
{{--    const toggleIcon = document.querySelector('.toggle-button .toggle-icon');--}}

{{--    if (videoListContent.style.display === "none" || videoListContent.style.display === "") {--}}
{{--        videoListContent.style.display = "block";--}}
{{--        toggleIcon.textContent = "-"; // تغيير الرمز إلى ---}}
{{--    } else {--}}
{{--        videoListContent.style.display = "none";--}}
{{--        toggleIcon.textContent = "+"; // تغيير الرمز إلى +--}}
{{--    }--}}
{{--}--}}

{{--// الدالة الموجودة مسبقًا--}}
{{--function toggleDetails(detailsId) {--}}
{{--    const details = document.getElementById(detailsId);--}}
{{--    const icon = details.previousElementSibling.querySelector('.toggle-icon');--}}
{{--    if (details.style.display === "none") {--}}
{{--        details.style.display = "block";--}}
{{--        icon.textContent = "-"; // تغيير الرمز عند الفتح--}}
{{--    } else {--}}
{{--        details.style.display = "none";--}}
{{--        icon.textContent = "+"; // إعادة الرمز عند الإغلاق--}}
{{--    }--}}
{{--}--}}






{{--        function loadVideo(videoId, title) {--}}
{{--            document.querySelector('.video-title').textContent = title;--}}
{{--            document.querySelector('iframe').src = 'https://www.youtube.com/embed/' + videoId;--}}
{{--            document.querySelector('.video-description').textContent = 'Description of ' + title;--}}
{{--        }--}}

{{--        function goBack() {--}}
{{--            // Logic to go back to the course page--}}
{{--            window.location.href = 'course.html'; // Replace with your course page URL--}}
{{--        }--}}
{{--    </script>--}}

{{--</main>--}}
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
        max-width: 1200px;
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

</style>
<div class="navbar-bg"></div>
<br><br><br><br><br>
<div class="course-title">
    <h2>Course Title Goes Here</h2>
</div>
<!-- Main Container -->
<div class="container">
    <!-- Main Video Area -->
    <div class="video-container">
        <!-- Video Player -->
        <video id="course-video" controls>
            <source src="sample-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Course Title and Instructor -->
        <div class="course-details">
            <h1>Course Title</h1>
            <div class="instructor-details">
                <img src="instructor.jpg" alt="Instructor Image">
                <div class="instructor-info">
                    <h4>Instructor: John Doe</h4>
                </div>
            </div>
            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress" style="width: 40%;"></div>
            </div>
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
            <img src="logo.png" alt="Course Logo">
        </div>

        <ul>
            <li class="section">
                <div class="section-header">
                    <span><i class="fas fa-folder"></i> Section 1</span>
                    <span>+</span>
                </div>
                <div class="section-content">
                    <a href="#">Video 1: Introduction</a>
                    <a href="#">Video 2: Basics</a>
                    <a href="#">Quiz 1</a>
                </div>
            </li>
            <li class="section">
                <div class="section-header">
                    <span><i class="fas fa-folder"></i> Section 2</span>
                    <span>+</span>
                </div>
                <div class="section-content">
                    <a href="#">Video 1: Advanced Topics</a>
                    <a href="#">Quiz 2</a>
                </div>
            </li>
        </ul>
    </div>

</div>



<script>
    // script.js

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
            const videoSrc = 'sample-video.mp4'; // Replace this with dynamic source
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

</script>

@endsection
