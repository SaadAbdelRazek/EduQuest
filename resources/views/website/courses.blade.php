@extends('website.layouts.app')
@section('content')

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
                                            <li class="breadcrumb-item"><a href="{{route('courses')}}">Services</a></li>
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
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Our featured courses</h2>
                </div>
            </div>
        </div>

        <!-- Courses List -->
        <div class="row" id="course-list">
            @foreach ($all_courses as $index => $course )
            <div class="col-lg-4 course-item" @if($index >= 6) style="display: none;" @endif>
                <div class="properties properties2 mb-30">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{asset('storage/'. $course->image)}}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>{{$course->category}}</p>
                            <h3><a href="{{route('course_details', $course->id)}}">{{$course->title}}</a></h3>
                            <p style="overflow-y: scroll; height:200px; border:1px solid rgb(209, 209, 209);border-bottom:0; padding:10px; border-radius:5px;">{{$course->description}}</p>
                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                <div class="restaurant-name">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half"></i>
                                    </div>
                                    <p><span>(4.5)</span> based on 120</p>
                                </div>
                                <div class="price">
                                    <span>{{$course->price}} EGP</span>
                                </div>
                            </div>
                            <a href="{{route('course_details',$course->id)}}" class="border-btn border-btn2">View</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More Button -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mt-40">
                    <a href="#" id="load-more" class="border-btn">Load More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Courses area End -->

        <!--? top subjects Area Start -->
        <div class="topic-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Explore top subjects</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{asset('img/gallery/topic2.png')}}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="{{route('courses')}}">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mt-20">
                            <a href="{{route('courses')}}" class="border-btn">View More Subjects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- top subjects End -->
        <!-- ? services-area -->
        <div class="services-area services-area2 section-padding40">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="single-services mb-30">
                            <div class="features-icon">
                                <img src="{{asset('img/icon/icon1.svg')}}" alt="">
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
                                <img src="{{asset('img/icon/icon2.svg')}}" alt="">
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
                                <img src="{{asset('img/icon/icon3.svg')}}" alt="">
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
