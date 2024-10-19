@extends('website.layouts.app')
@section('content')


    <main>
        <!--? slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7 col-md-12">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay="0.2s">Online learning<br> platform</h1>
                                    <p data-animation="fadeInLeft" data-delay="0.4s">Build skills with courses, certificates, and degrees online from world-class universities and companies</p>
                                    @if (Auth::user())

                                <a href="#courses" class="btn hero-btn" data-animation="fadeInLeft"
                                    data-delay="0.7s">Browse</a>
                                @else
                                <a href="{{route('register')}}" class="btn hero-btn" data-animation="fadeInLeft"
                                    data-delay="0.7s">Join for Free</a>

                                @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ? services-area -->
        <div class="services-area">
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

{{--        Slider --}}<br>
        <div class="section-tittle text-center mb-55">
            <h2 style="color: #51117f;">Our Process</h2>
        </div>
        <div class="gallery-slider">
            <button class="prev-btn">&#10094;</button>
            <div class="slider-container">
                <div class="slider-track">
                    <div class="slider-item">
                        <img src="{{asset('img/gal1.jpg')}}" alt="Image 1">
                    </div>
                    <div class="slider-item">
                        <img src="{{asset('img/gal5.jpg')}}" alt="Image 2">
                    </div>
                    <div class="slider-item">
                        <img src="{{asset('img/gal3.png')}}" alt="Image 3">
                    </div>
                    <div class="slider-item">
                        <img src="{{asset('img/gal2.png')}}" alt="Image 4">
                    </div>
                    <div class="slider-item">
                        <img src="{{asset('img/gal4.avif')}}" alt="Image 5">
                    </div>
                </div>
            </div>
            <button class="next-btn">&#10095;</button>
        </div>

        <br><br>
        @include('website.layouts.services-section')


        <!-- Courses area start -->
        <div class="courses-area section-padding40 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2 style="color: #51117f;">Our featured courses</h2>
                        </div>
                    </div>
                </div>
                <div class="courses-actives" id="courses">
                    <!-- Single -->
                    @foreach ($home_courses as $courses)
                    @if ($courses->is_accepted == 1 && $courses->is_deleted == 0)
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="{{ route('course_details', $courses->id) }}"><img src="{{asset('storage/'. $courses->image)}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>{{$courses->category}}</p>
                                <h3><a href="{{ route('course_details', $courses->id) }}">{{$courses->title}}</a></h3>
                                <div style="display: flex; align-items:center; gap:10px; padding:5px;">
                                    @if ($courses->instructor->user->profile_photo_path)
                                    <img class="submenu" src="{{asset('storage/'. $courses->instructor->user->profile_photo_path)}}" alt="" style="width: 40px; height:40px; border-radius:50%; object-fit:cover">
                                    @else
                                    <img class="submenu" src="{{asset('img/icon/default_prof_img.jpg')}}" alt="" style="width: 40px; height:40px; border-radius:50%; object-fit:cover">
                                    @endif
                                    <a href="{{route('course-instructor', $courses->instructor->user_id)}}" style="color: gray">{{ $courses->instructor->user->name ?? 'Unknown Instructor' }}</a></p>
                                </div>
                                {{-- <p> {{$courses->objectives}} </p> --}}
                                <div class="properties__footer d-flex justify-content-between align-items-start">
                                    <div class="rating-stars">

                                        <!-- هنا ستبقى كود التقييم الخاص بك -->
                                        @php
                                            $roundedRate = round($courses->reviews_avg_rate * 2) / 2; // تقريب لأقرب نصف
                                        @endphp

                                        <span
                                        style="font-size: 13px">{{ $courses->reviews_avg_rate ?? 'No Ratings' }}</span>

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
                                            class="ml-2">({{ $courses->reviews_count ?? 'No Ratings' }}) <i class="fas fa-regular fa-comments" style="color: #9a9191"></i></span>

                                            <div class="course-price">
                                                <span style="color: rgb(60, 38, 38)">{{ $courses->price }} EGP</span>
                                            </div>
                                        </div>
                                        <div style="display: flex; flex-direction:column; gap:5px">

                                            <a href="{{route('course_details', $courses->id)}}" class="cart-btn">View</a>
                                            <div style="display: flex; justify-content:center; gap:10px; margin-top:10px">
                                                <a class="fav" data-course-id="{{ $courses->id }}"><i id="favourite-icon" class="fas fa-regular fa-heart" ></i></a>
                                                <a class="cart" data-course-id="{{ $courses->id }}"><i id="cart-icon" class="fas fa-regular fa-cart-plus" ></i></a>
                                            </div>
                                            <style>
                                                #favourite-icon{
                                                    color: rgb(226, 68, 68);
                                                    font-size: 20px;
                                                    transition-duration: .5s;
                                                }

                                                #favourite-icon:hover{
                                                    color: rgb(172, 8, 8);
                                                    scale: 1.2;
                                                }

                                                #cart-icon{
                                                    color: rgb(100, 100, 100);
                                                    font-size: 20px;
                                                    transition-duration: .5s;
                                                }
                                                #cart-icon:hover{
                                                    color: #484848;
                                                    scale: 1.2;
                                                }
                                            </style>
                                        </div>

                                    </div>
                                </div>

                        </div>
                    </div>
                    @endif
                    @endforeach

                    <!-- Single -->

                </div>
                <div style="text-align: center">

                    <a href="{{route('categories')}}" class="view-more-btn" style="text-align: center">Find out more</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ? services-area -->
    <div class="services-area">
        <div class="container">
            <div class="row justify-content-sm-center">

            </div>
        </div>
    </div>


    <!-- Courses area End -->
    <!--? About Area-1 Start -->
    <section class="about-area1 fix pt-10">
        <div class="support-wrapper align-items-center">
            <div class="left-content1">
                <div class="about-icon">
                    <img src="{{asset('img/icon/about.svg')}}" alt="">
                </div>
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">Learn new skills online with top educators</h2>
                        <p>The automated process all your website tasks. Discover tools and
                            techniques to engage effectively with vulnerable children and young
                            people.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{asset('img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Techniques to engage effectively with vulnerable children and young people.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{asset('img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together.</p>
                    </div>
                </div>

                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{asset('img/icon/right-icon.svg')}}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Join millions of people from around the world learning together. Online learning is as easy
                            and natural.</p>
                    </div>
                </div>
            </div>
            <div class="right-content1 ">
                <!-- img -->
                <div class="right-img">
                    @foreach ($adVideo as $adVideo)
                    <video width="700" controls>
                        <source src="{{ asset('videos/' . $adVideo->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    @endforeach




                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        <!--? top subjects Area Start -->
        <div class="topic-area section-padding40" id="categories">
            <div class="container" >
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="section-tittle text-center mb-55">
                            <h2 style="color: #51117f;">Explore top subjects</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $counter = 0;
                    @endphp
                    @foreach($categories as $category)
                        @if($counter == 4)
                            @break
                        @endif
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-topic text-center mb-30">
                                <div class="topic-img">
                                    <img src="{{ asset('public/images/' . $category->image) }}" alt="">
                                    <div class="topic-content-box">
                                        <div class="topic-content">
                                            <h3><a href="{{ route('courses', $category->id) }}">{{ $category->name }}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @php
                                $counter++;
                            @endphp
                    @endforeach
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mt-20">
                            <a href="{{route('categories')}}" class="view-more-btn">View All</a>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </section>


        <div class="services-area">
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


        <br><br>

        <div class="section-tittle text-center mb-55" style="margin-bottom: 20px;">
            <h2 style="color: #51117f; font-size: 2.8rem; text-align: center;">Subscribe Now To Get Our News</h2>
        </div>
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: left; padding: 20px;">

            <div style="margin-bottom: 20px;">
                <img src="{{asset('img/hero/subscribe.png')}}" alt="Subscribe Image" style="max-width: 90%; height: auto; border-radius:20px;">
            </div>

            <div class="subscribe-section" style="width: 100%; max-width: 600px; text-align: left;">
                <p style="font-size: 2.5rem; color:#e50f98;">Stay up to date with the latest courses and developments.</p>
                <form action="{{ route('subscribe') }}" method="POST" class="subscribe-form" style="display: flex; flex-direction: column; align-items: baseline; gap: 10px;">
                    @csrf
                    <label for="email" style="font-size: 1.9rem; color: #333;">Subscribe:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required style="padding: 10px; border: 1px solid #ddd; border-radius: 5px; width: 100%; max-width: 450px;">
                    <button type="submit" class="view-more-btn" style="padding: 10px 20px; background-color: #51117f; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Subscribe</button>
                </form>
            </div>
        </div>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <br><br>
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



{{-- <script>
    $(document).ready(function () {
        @if (auth()->check())  // If user is logged in
            // Check if there are courses in Local Storage (for cart)
            let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
            if (cart.length > 0) {
                // Send the courses to the server
                $.ajax({
                    url: '{{ route("cart.add.bulk") }}',  // You'll need to create this route
                    type: 'POST',
                    data: {
                        course_ids: cart,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        alert('Your cart has been updated.');
                        // Clear Local Storage for cart after sending
                        localStorage.removeItem('cart');
                    },
                    error: function (xhr) {
                        alert('Error adding cart items.');
                    }
                });
            }

            // Check if there are courses in Local Storage (for favourites)
            let favourites = localStorage.getItem('favourites') ? JSON.parse(localStorage.getItem('favourites')) : [];
            if (favourites.length > 0) {
                // Send the courses to the server
                $.ajax({
                    url: '{{ route("favourite.add.bulk") }}',  // You'll need to create this route
                    type: 'POST',
                    data: {
                        course_ids: favourites,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        alert('Your favourites have been updated.');
                        // Clear Local Storage for favourites after sending
                        localStorage.removeItem('favourites');
                    },
                    error: function (xhr) {
                        alert('Error adding favourite items.');
                    }
                });
            }
        @endif
    });
</script> --}}


        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

        <script>
            // عند تحميل الصفحة، قم بإرجاع المستخدم إلى موضعه السابق
        document.addEventListener("DOMContentLoaded", function() {
            // الحصول على موضع التمرير المخزن
            const scrollPosition = localStorage.getItem("scrollPosition");

            if (scrollPosition) {
                // إذا كان هناك موضع مخزن، استرجعه
                window.scrollTo(0, scrollPosition);
            }
        });

        // قبل إعادة تحميل الصفحة أو إرسال البيانات، قم بحفظ موضع التمرير
        window.addEventListener("beforeunload", function() {
            // حفظ موضع التمرير في LocalStorage
            localStorage.setItem("scrollPosition", window.scrollY);
        });

        </script>
    </main>
@section('custom-js')
    <script src="{{asset('js/home-slider.js')}}"></script>
@endsection

@endsection
