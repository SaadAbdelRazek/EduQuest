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
    box-shadow: 0px 6px 6px 0px rgba(2, 25, 65, 0.08);
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 30px;
    margin: 15px;
    padding: 0;
    padding-top:0;
    text-align: left;
    max-width: 30%;
    transition-duration:.5s;
}
.course-item:hover {
    box-shadow: 0px 6px 6px 0px rgba(2, 25, 65, 0.3);
    transform:translateY(-5px);
}

.course-info-div {
    padding: 15px;
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
    flex-wrap: wrap; /* يجعل العناصر تلتف عند الحاجة */
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

/* تحسين الـ Responsive */
@media (max-width: 1024px) {
    .course-item {
        max-width: 45%; /* تصبح 45% في الشاشات المتوسطة */
    }
}

@media (max-width: 768px) {
    .course-item {
        max-width: 45%; /* تأخذ العرض الكامل في الشاشات الصغيرة */
    }

    .properties__img.overlay1 img {
        height: 200px; /* تقليل ارتفاع الصور في الشاشات الصغيرة */
    }

    .border-btn2 {
        font-size: 14px; /* تصغير حجم النص في الأزرار */
    }

    .course-info-div {
        padding: 10px; /* تقليل التباعد في الشاشات الصغيرة */
    }
}

@media (max-width: 676px) {
    .course-item {
        max-width: 80%; /* تأخذ العرض الكامل في الهواتف */
    }

    .properties__caption .description {
        height: 150px; /* تقليل ارتفاع وصف الدورة */
    }

    .border-btn2 {
        font-size: 12px; /* تقليل حجم النص في الأزرار */
        padding: 8px 15px; /* تقليل التباعد الداخلي */
    }
}

    </style>
    <main>
        <!--? Slider Area Start-->
        <section class="slider-area slider-area2">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height2">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-11 col-md-12">
                                <div class="hero__caption hero__caption2">
                                    <h1 data-animation="bounceIn" data-delay="0.2s">Our courses</h1>
                                    <!-- Breadcrumb Start -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
                                            <li class="breadcrumb-item">
                                                <a href="{{ route('courses', $category) }}">{{ $category_name->name }}</a>
                                            </li>
                                        </ol>
                                    </nav>
                                    <!-- Breadcrumb End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Area Start -->
        @if ($categoryCourses->count())
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2>Our featured courses</h2>
                        </div>
                    </div>
                </div>
        @elseif (!$categoryCourses->count())
            <div class="section-tittle text-center mb-55">
                <h3>No Courses Available right now</h3>
            </div>
        @endif

        <!-- Courses List -->
        <div class="container">
            <div class="row" id="course-list">
                @foreach ($categoryCourses as $course)
                    @if ($course->is_accepted == 1 && $course->is_deleted == 0)
                        <div class="col-lg-4 col-md-6 col-sm-12 course-item mb-4">
                            <div class="course-card">
                                <div class="course-image">
                                    <a href="{{ route('course_details', $course->id) }}">
                                        <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}" class="img-fluid">
                                    </a>
                                </div>
                                <div class="course-info-div">


                                <div class="course-info p-3">
                                    <h5 class="course-title">
                                        <a href="{{ route('course_details', $course->id) }}" class="text-dark">{{ $course->title }}</a>
                                    </h5>
                                    <div style="display: flex; align-items:end; gap:10px; padding:5px;">
                                        @if ($course->instructor->user->profile_photo_path)
                                        <img class="submenu" src="{{asset('storage/'. $course->instructor->user->profile_photo_path)}}" alt="" style="width: 40px; height:40px; border-radius:50%; object-fit:cover">
                                        @else
                                        <img class="submenu" src="{{asset('img/icon/default_prof_img.jpg')}}" alt="" style="width: 40px; height:40px; border-radius:50%; object-fit:cover">
                                        @endif
                                        <a href="{{route('course-instructor', $course->instructor->user_id)}}" style="color: gray">{{ $course->instructor->user->name ?? 'Unknown Instructor' }}</a></p>
                                    </div>

                                    <div class="course-rating d-flex align-items-center">
                                        <div class="rating-stars">
                                            <!-- هنا ستبقى كود التقييم الخاص بك -->
                                            @php
                                                $roundedRate = round($course->reviews_avg_rate * 2) / 2; // تقريب لأقرب نصف
                                            @endphp
                                            <span
                                            style="font-size: 13px">{{ $course->reviews_avg_rate ?? 'No Ratings' }}</span>

                                            @if ($roundedRate >= 0.5)
                                                <i style="font-size: 12px; color:#b4690e" class="fas fa-star{{ $roundedRate >= 1 ? '' : '-half' }}"></i>
                                            @endif
                                            @if ($roundedRate >= 1.5)
                                                <i style="font-size: 12px; color:#b4690e" class="fas fa-star{{ $roundedRate >= 2 ? '' : '-half' }}"></i>
                                            @endif
                                            @if ($roundedRate >= 2.5)
                                                <i style="font-size: 12px; color:#b4690e" class="fas fa-star{{ $roundedRate >= 3 ? '' : '-half' }}"></i>
                                            @endif
                                            @if ($roundedRate >= 3.5)
                                                <i style="font-size: 12px; color:#b4690e" class="fas fa-star{{ $roundedRate >= 4 ? '' : '-half' }}"></i>
                                            @endif
                                            @if ($roundedRate >= 4.5)
                                                <i style="font-size: 12px; color:#b4690e" class="fas fa-star{{ $roundedRate == 5 ? '' : '-half' }}"></i>
                                            @endif
                                            <span style="font-size: 10px; color:rgb(145, 145, 145)"
                                            class="ml-2">({{ $course->reviews_count ?? 'No Ratings' }})</span>
                                        </div>

                                    </div>

                                    <div class="course-price mt-2">
                                        <span style="color: rgb(60, 38, 38)">{{ $course->price }} EGP</span>
                                    </div>

                                </div>
                                <div style="display: flex; justify-content:space-between; flex-direction:row; gap:15px">

                                    <a href="{{route('course_details', $course->id)}}" class="cart-btn">View</a>
                                    <div style="display: flex; justify-content:center; gap:10px; margin-top:10px">
                                        <a class="fav" data-bs-placement="top" title="add to favourite"  data-course-id="{{ $course->id }}"><i id="favourite-icon" class="fas fa-regular fa-heart" ></i></a>
                                        <a class="cart" data-bs-placement="top" title="add to cart"  data-course-id="{{ $course->id }}"><i id="cart-icon" class="fas fa-regular fa-cart-plus" ></i></a>
                                    </div>
                                </div>
                                    <style>
                                        #favourite-icon{
                                            color: rgb(226, 68, 68);
                                            font-size: 20px;
                                            transition-duration: .5s;
                                            cursor: pointer;
                                        }

                                        #favourite-icon:hover{
                                            color: rgb(172, 8, 8);
                                            scale: 1.2;
                                        }

                                        #cart-icon{
                                            color: rgb(100, 100, 100);
                                            font-size: 20px;
                                            transition-duration: .5s;
                                            cursor: pointer;
                                        }
                                        #cart-icon:hover{
                                            color: #484848;
                                            scale: 1.2;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Services Area -->
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
                                <h3>Lifetime access</h3>
                                <p>The automated process all your website tasks.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            // Check if user is logged in before adding to cart
            $('.cart').click(function (e) {
                e.preventDefault();

                let courseId = $(this).data('course-id');

                @if (auth()->check())  // If user is logged in
                    $.ajax({
                        url: '{{ route("cart.add") }}',
                        type: 'POST',
                        data: {
                            course_id: courseId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            alert(response.success);
                            // Optionally, update cart count or UI
                        },
                        error: function (xhr) {
                            alert(xhr.responseJSON.error);
                        }
                    });
                @else  // If user is not logged in
                    alert('Please log in to add items to the cart.');
                    window.location.href = '{{ route("login") }}';  // Redirect to login page
                @endif
            });

            // Check if user is logged in before adding to favourites
            $('.fav').click(function (e) {
                e.preventDefault();

                let courseId = $(this).data('course-id');

                @if (auth()->check())  // If user is logged in
                    $.ajax({
                        url: '{{ route("favourite.add") }}',
                        type: 'POST',
                        data: {
                            course_id: courseId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response) {
                            alert(response.success);
                            // Optionally, update UI for favourites
                        },
                        error: function (xhr) {
                            alert(xhr.responseJSON.error);
                        }
                    });
                @else  // If user is not logged in
                    alert('Please log in to add items to favourites.');
                    window.location.href = '{{ route("login") }}';  // Redirect to login page
                @endif
            });
        });
    </script>

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
