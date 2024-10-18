@extends('website.layouts.app')
@section('content')
    <style>
        .courses-area {
            background-color: rgb(255, 255, 255);
            padding: 40px 0;
        }

        .section-tittle h2 {
            color: #6200EA;
        }

        .course-item {
            border: 1px solid white;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 30px;
            text-align: left;
            max-width: 25%;
        }

        .properties__img.overlay1 {
            position: relative;
        }

        .properties__img.overlay1 img {
            width: 100%;
            height: 250px;
        }

        .properties__img.overlay1::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
        }

        .properties__caption {
            padding: 20px;
            background-color: white;
        }

        .properties__caption p {
            color: orange;
        }

        .properties__caption h3 a {
            color: orange;
        }

        .properties__caption .description {
            overflow-y: scroll;
            height: 200px;
            border: 1px solid skyblue;
            border-bottom: 0;
            padding: 10px;
            border-radius: 5px;
        }

        .properties__footer {
            margin-top: 20px;
        }

        .properties__footer .rating {
            color: orange;
        }

        .properties__footer .price {
            color: #6200EA;
        }

        .border-btn2 {
            display: inline-block;
            background-color: skyblue;
            color: orange;
            border: 2px solid orange;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0s, color 0s;
        }

        .border-btn2:hover {
            background-color: orange;
            color: white;
            transform: scale(1.05);
        }

        .row {
            display: flex;
            justify-content: flex-start;
            margin: 0 auto;
        }

        .col-xl-7,
        .col-lg-8 {
            max-width: 100%;
            padding: 0 15px;
        }

        .section-tittle {
            margin-top: 40px;
            text-align: center;
        }

        .section-tittle a {
            display: inline-block;
            padding: 10px 20px;
            border: 2px solid skyblue;
            color: white;
            background-color: skyblue;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0s, color 0s;
        }

        .section-tittle a:hover {
            background-color: orange;
            color: white;
            border: 2px solid orange;
        }

        /* General container styling */
        .container {
            max-width: 1140px;
            margin: auto;
        }

        /* Card container */
        .course-item {
            transition: transform 0.3s ease;
        }

        .course-item:hover {
            transform: translateY(-5px);
        }

        /* Course card styling */
        .course-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .course-card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        /* Course image */
        .course-image img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-bottom: 1px solid #f0f0f0;
        }

        /* Course title */
        .course-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        /* Instructor text */
        .course-instructor {
            font-size: 14px;
            color: #777;
            margin-bottom: 8px;
        }

        /* Rating stars */
        .rating-stars i {
            color: #FFD700; /* Gold color for stars */
            margin-right: 2px;
        }

        /* Load More Button */
        #load-more {
            display: inline-block;
            padding: 10px 30px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        #load-more:hover {
            background-color: #0056b3;
            text-decoration: none;
        }

    </style>
    <main>
        <!--? slider Area Start-->
        <section class="slider-area slider-area2">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
                                    <!-- breadcrumb Start-->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                            <li class="breadcrumb-item"><a href="{{route('courses',$category)}}">{{$category}}</a></li>

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
        <!-- Courses area start -->
        @if($categoryCourses->count())
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Our featured courses</h2>
                </div>
            </div>
        </div>
        @endif
        <div class="container">
            <div class="row" id="course-list">
                @foreach ($categoryCourses as $course)
                    @if($course->is_accepted==1 && $course->is_deleted==0)
                        <div class="col-lg-4 col-md-6 col-sm-12 course-item mb-4">
                            <div class="course-card">
                                <!-- Course Image -->
                                <div class="course-image">
                                    <a href="{{ route('course_details', $course->id) }}">
                                        <img src="{{ asset('storage/'. $course->image) }}" alt="{{ $course->title }}" class="img-fluid rounded">
                                    </a>
                                </div>
                                <!-- Course Info -->
                                <div class="course-info p-3">
                                    <h5 class="course-title">
                                        <a href="{{ route('course_details', $course->id) }}" class="text-dark font-weight-bold">{{ $course->title }}</a>
                                    </h5>
                                    <p class="course-instructor">{{ $course->instructor->user->name ?? 'Unknown Instructor' }}</p>
                                    <div class="course-rating d-flex align-items-center">
                                        <div class="rating-stars">
                                            @switch($course->reviews_avg_rating)
                                                @case(0.5) <i class="fas fa-star-half"></i> @break
                                                @case(1) <i class="fas fa-star"></i> @break
                                                @case(1.5) <i class="fas fa-star"></i><i class="fas fa-star-half"></i> @break
                                                @case(2) <i class="fas fa-star"></i><i class="fas fa-star"></i> @break
                                                @case(2.5) <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half"></i> @break
                                                @case(3) <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> @break
                                                @case(3.5) <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half"></i> @break
                                                @case(4) <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> @break
                                                @case(4.5) <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half"></i> @break
                                                @case(5) <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> @break
                                                @default <i class="fas fa-star"></i>
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Load More Button -->
            @if($categoryCourses->count())
                <div class="row justify-content-center mt-4">
                    <div class="col-auto">
                        <a href="#" id="load-more" class="btn btn-primary">Load More</a>
                    </div>
                </div>
            @endif
        </div>

        {{--                </div>--}}


        <div class="services-area services-area2 section-padding40">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{ asset('img/icon/icon1.svg') }}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>60+ UX courses</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{ asset('img/icon/icon2.svg') }}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Expert instructors</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{ asset('img/icon/icon3.svg') }}" alt="">
                            </div>
                            <div class="features-caption">
                                <h3>Life time access</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // عدد الكورسات التي سيتم عرضها في كل مرة
            const coursesToShow = 6;
            let currentlyVisibleCourses = coursesToShow;

            // جلب زر "Load More"
            const loadMoreButton = document.getElementById('load-more');
            // جلب قائمة الكورسات
            const courses = document.querySelectorAll('.course-item');

            loadMoreButton.addEventListener('click', function(e) {
                e.preventDefault(); // منع السلوك الافتراضي للرابط

                // حساب عدد الكورسات المخفية
                const hiddenCourses = document.querySelectorAll('.course-item[style="display: none;"]');
                for (let i = 0; i < coursesToShow && i < hiddenCourses.length; i++) {
                    hiddenCourses[i].style.display = 'block'; // إظهار 6 كورسات إضافية
                }

                // إذا تم إظهار جميع الكورسات، إخفاء زر "Load More"
                currentlyVisibleCourses += coursesToShow;
                if (currentlyVisibleCourses >= courses.length) {
                    loadMoreButton.style.display = 'none'; // إخفاء الزر بعد إظهار كل الكورسات
                }
            });
        });
    </script>
@endsection
