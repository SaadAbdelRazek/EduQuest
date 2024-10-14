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

                                    <a href="#courses" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Browse</a>
                                    @else
                                    <a href="{{route('register')}}" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>

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
                <div class="courses-actives" id="courses">
                    <!-- Single -->
                    @foreach ($home_courses as $courses )
                    <div class="properties pb-20">
                        <div class="properties__card">
                            <div class="properties__img overlay1">
                                <a href="#"><img src="{{asset('storage/'. $courses->image)}}" alt=""></a>
                            </div>
                            <div class="properties__caption">
                                <p>{{$courses->category}}</p>
                                <h3><a href="#">{{$courses->title}}</a></h3>
                                <p> {{$courses->objectives}} </p>
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
                                        <span>{{$courses->price}}EGP</span>
                                    </div>
                                </div>
                                <a href="{{route('courses')}}" class="border-btn border-btn2">View</a>
                            </div>

                        </div>
                    </div>
                    @endforeach

                    <!-- Single -->

                </div>
                <a href="{{route('courses')}}" class="border-btn border-btn2">Find out more</a>
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
                            <p>Join millions of people from around the world  learning together.</p>
                        </div>
                    </div>

                    <div class="single-features">
                        <div class="features-icon">
                            <img src="{{asset('img/icon/right-icon.svg')}}" alt="">
                        </div>
                        <div class="features-caption">
                            <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                        </div>
                    </div>
                </div>
                <div class="right-content1">
                    <!-- img -->
                    <div class="right-img">
                        <img src="{{asset('img/gallery/about.png')}}" alt="">

                        <div class="video-icon" >
                            <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Area End -->
        <!--? top subjects Area Start -->
        <div class="topic-area section-padding40">
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
                        {{-- @foreach($categories as $category)
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="{{ asset('public/images/' . $category->image) }}" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach --}}
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="section-tittle text-center mt-20">
                                    {{-- <a href="{{route('categories')}}" class="border-btn">View More Subjects</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- top subjects End -->

                <!--? Team -->
                <section class="team-area section-padding40 fix">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-7 col-lg-8">
                                <div class="section-tittle text-center mb-55">
                                    <h2>Community experts</h2>
                                </div>
                            </div>
                        </div>
                        <div class="team-active">
                            <div class="single-cat text-center">
                                <div class="cat-icon">
                                    <img src="{{asset('img/gallery/team1.png')}}" alt="">
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="{{route('contact')}}">Mr. Urela</a></h5>
                                    <p>The automated process all your website tasks.</p>
                                </div>

                            </div>
                        </div>
                </section>
            </div>
            </div>
                <!-- Services End -->
                <!--? About Area-2 Start -->

                <!-- About Area End -->
    </main>


@endsection
