@extends('website.layouts.app')

@section('content')

<style>
    .containerr {
    padding: 40px;
    background-color: #f2f2f2; /* Light Gray */
}

.containerr .profile-details {
    display: flex;
    align-items: center;
    margin-bottom: 40px;
    border-bottom: 2px solid #e0e0e0; /* Light border */
    padding-bottom: 20px;
}

.containerr .profile-picture img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    border: 4px solid #6c757d; /* Gray */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.containerr .details {
    margin-left: 30px;
    background-color: #ffffff; /* White */
    padding: 20px;
    border-radius: 15px;
    color: #333;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.containerr .details:hover {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

.containerr .details h3 {
    margin-bottom: 10px;
    font-size: 1.6em;
    color: #007bff; /* Blue */
}

.containerr .about-teacher,
.containerr .courses-taught {
    margin-bottom: 40px;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.containerr .about-teacher {
    background-color: #e9ecef; /* Light Gray */
    color: #333;
}

.containerr .about-teacher h3 {
    margin-bottom: 15px;
    font-size: 1.5em;
    color: #007bff; /* Blue */
}

.containerr .courses-taught {
    background-color: #ffffff; /* White */
}

.containerr .courses-taught h3 {
    margin-bottom: 15px;
    font-size: 1.5em;
    color: #007bff; /* Blue */
}

.containerr .courses-taught ul {
    list-style: none;
    padding-left: 0;
}

.containerr .courses-taught ul li {
    background-color: #007bff; /* Blue */
    color: #fff;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.containerr .courses-taught ul li:hover {
    background-color: #0056b3; /* Darker Blue */
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

<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">Course instructor</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Course instructor</a></li>
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

<div class="containerr">
    <div class="profile-details">
        <div class="profile-picture">
            <img src="{{asset('storage/'. $course_instructor->User->profile_photo_path)}}" alt="Instructor Picture">
        </div>
        <div class="details">
            <h3>I'm {{$course_instructor->User->name}}</h3>
            <p>{{$course_instructor->specialization}}</p>
            <p>Have a {{$course_instructor->experience_years}} Years of Experience</p>
            <p>Email: <a style="color: peru" href="mailto:{{$course_instructor->User->email}}">{{$course_instructor->User->email}}</a> </p>
            <p>Phone: <a style="color:peru" href="tel:{{$course_instructor->phone}}">{{$course_instructor->phone}}</a> </p>
        </div>
    </div>

    <div class="about-teacher">
        <h3>About the Instructor</h3>
        <p>John is an experienced web developer with a passion for teaching students. He believes in the importance of interactive learning and has expertise in using innovative teaching methods to motivate students.</p>
    </div>

    <div class="courses-taught">
        <h3>Courses Taught</h3>
        <ul>
            <li>Introduction to Programming</li>
            <li>Advanced JavaScript</li>
            <li>Web Development with PHP</li>
            <li>Building Responsive Websites</li>
        </ul>
    </div>
</div>




<main>



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
