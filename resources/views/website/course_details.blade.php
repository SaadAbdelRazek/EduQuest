

@extends('website.layouts.app')
@section('content')


<style>

        .student-reviews, .instructors, .certificates {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .course-details {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        border-radius: 10px;
        margin: 10px;
    }
    .course-content {
        display: flex;
        width: 100%;
        max-width: 1200px;

    }
    .course-description {
        flex: 1;
        padding: 20px;
        background: white;
        border-radius: 8px;
        margin-right: 20px;
        /* box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); */
    }
    .course-title {
        font-size: 2em;
        margin-bottom: 10px;
        color: #007bff;
        text-align: left;
    }
    .course-description p {
        margin: 10px 0;
        line-height: 1.6;
        font-size: 1em;
    }
    .course-description strong {
        color: #007bff;
    }
    .course-image {
        flex: 2;
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;


    }
    .course-image img {
        width: 90%;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .course-price {
        margin-top: 20px;
    }
    .register-button {
        background-color: #FF9F67;
        color: white;
        float: right;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .register-button:hover {
        background-color: gray;
    }
        .floating-button {
            position: fixed;
            bottom: 20px;
            right: 100px;
            padding: 15px 25px;
            background-color: #ff4081;
            color: white;
            border: none;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .floating-button:hover {
            background-color: #e91e63;
        }
        .instructor-container {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        margin-top: 20px;
    }
    .instructor-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 10px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        width: 220px; /* Fixed width */
        height: 320px; /* Fixed height */
        text-align: center;
        background-color: #f9f9f9;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .instructor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    .instructor-card img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin-bottom: 15px;
        border: 2px solid #007bff; /* Border color */
    }
    .instructor-card h3 {
        margin: 10px 0 5px;
        color: #007bff; /* Title color */
    }
    .instructor-card p {
        margin: 5px 0;
        color: #666; /* Description color */
    }



    .certificate-section {
        background: #f2f8ff;
        padding: 30px;
        border-radius: 10px;
        margin: 20px auto;
        max-width: 800px;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .certificate-content {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    .certificate-image {
        width: 100%;
        max-width: 600px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .certificate-description h3 {
        font-size: 2em;
        color: #28a745; /* Success color */
        margin-bottom: 10px;
    }
    .certificate-description p {
        line-height: 1.6;
        font-size: 1.1em;
        color: #333;
    }


    .student-reviews {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        margin: 20px auto;
        max-width: 800px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    .review-form {
        margin-bottom: 30px;
    }
    .rating {
        display: flex;
        justify-content: center;
        margin: 10px 0;
    }
    .rating input {
        display: none;
    }
    .star {
        font-size: 30px;
        cursor: pointer;
        color: #ddd;
    }
    .rating input:checked ~ .star {
        color: #ffcc00; /* Star color when selected */
    }
    textarea {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
        resize: none;
    }
    .submit-review {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .submit-review:hover {
        background-color: #0056b3;
    }
    .reviews {
        border-top: 2px solid #ddd;
        padding-top: 20px;
    }
    .review {
        margin-bottom: 15px;
    }
    .stars {
        font-size: 20px;
        color: #ffcc00; /* Star color */
    }
</style>

<main>





<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">Course details</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Course details</a></li>
                                </ol>
                            </nav>
                            <!-- breadcrumb End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="course-details">
    <div class="course-content">
        <div class="course-description">
            <h1 class="course-title">{{$course_info->title}}</h1>
            <p><strong>Description:</strong> {{$course_info->description}}</p>
            <p><strong>Objectives:</strong> {{$course_info->objective}}</p>
            {{-- <p><strong>Duration:</strong> 10 weeks, with 2 classes per week.</p> --}}
            <div class="course-price">
                <span><strong>Price:</strong> {{$course_info->price}} EGP</span>
                @if($enrolledUsers)
                    <a href="{{route('course_videos',$course_info->id)}}" class="register-button">Go To Course</a>
                @else
                    @if($course_info->price==0)
                        <a href="{{route('view.free.enroll',$course_info->id)}}" class="register-button">Enroll</a>
                    @else
                        <a href="{{route('view.enroll.course',$course_info->id)}}" class="register-button">Buy Now</a>
                    @endif
                @endif
            </div>
            <span><strong>Course Instructor: </strong><a href="{{route('course-instructor',$course_info->user_id)}}" style="color: black"> mohamed</a> </span><br>

        </div>
        <div class="course-image">
            <img src="{{asset('storage/'. $course_info->image)}}" alt="Course Image">
        </div>
    </div>
</section>




<section class="instructors">
    <h2>Instructors</h2>
    <div class="instructor-container">
        <div class="instructor-card">
            <img src="{{asset('storage/'. $course_info->User->profile_photo_path)}}" alt="Instructor Name">
            <h3>{{$course_info->User->name}}</h3>
            <p>Senior Instructor</p>
            <p>Expert in web development and programming.</p>
        </div>

    </div>
</section>

<aside class="sidebar">
    <button class="floating-button">Register / Buy</button>
</aside>

<section class="certificate-section">
    <h2>Course Completion Certificate</h2>
    <div class="certificate-content">
        <img src="https://via.placeholder.com/600x400" alt="Certificate" class="certificate-image">
        <div class="certificate-description">
            <h3>Congratulations!</h3>
            <p>You have successfully completed the <strong>Course Name</strong>.</p>
            <p>We are pleased to award you this certificate of achievement. This document serves as a testament to your hard work and dedication to learning.</p>
            <p>Keep this certificate safe as it can help you in your future endeavors.</p>
        </div>
    </div>
</section>



<section class="student-reviews">
    <h2>Student Reviews</h2>

    <div class="review-form">
        <h3>Rate the Course</h3>
        <div class="rating">
            <input type="radio" id="star1" name="rating" value="5">
            <label for="star1" class="star">⭐</label>
            <input type="radio" id="star2" name="rating" value="4">
            <label for="star2" class="star">⭐</label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3" class="star">⭐</label>
            <input type="radio" id="star4" name="rating" value="2">
            <label for="star4" class="star">⭐</label>
            <input type="radio" id="star5" name="rating" value="1">
            <label for="star5" class="star">⭐</label>
        </div>
        <textarea placeholder="Leave a comment..." rows="4"></textarea>
        <button class="submit-review">Submit Review</button>
    </div>

    <div class="reviews">
        <div class="review">
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p>Great course! Learned a lot.</p>
        </div>
        <div class="review">
            <div class="stars">⭐⭐⭐⭐</div>
            <p>Very informative and engaging!</p>
        </div>
        <div class="review">
            <div class="stars">⭐⭐⭐⭐⭐</div>
            <p>Excellent materials and clear explanations.</p>
        </div>
    </div>
</section>


</main>

@endsection

