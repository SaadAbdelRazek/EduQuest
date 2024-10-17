@extends('website.layouts.app')
@section('content')

@section('custom-css')
    <link rel="stylesheet" href="{{asset('css/faqs.css')}}">
@endsection
<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">Search Result</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Search Result</a></li>
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
    <main>
        @if($query=="")
            <br><br>
            <center>
                <h2 style="font-size: 2.4rem">No Items Found</h2>
                <img src="{{asset('/img/no.png')}}" alt="" width="600px" height="600px">
            </center>
        @else
        <div class="container">
            <h2 class="results-title">Search Results for: "{{ $query }}"</h2>
            <div class="results-list">
                <h3>Courses</h3>
                @if($courses->count())
                    <div class="container">
                        <div class="row" id="course-list">
                            @foreach ($courses as $course)
                                @if($course->is_accepted==1 && $course->is_deleted==0)
                                    <div class="col-lg-4 col-md-6 col-sm-12 course-item mb-4">
                                        <div class="course-card">
                                            <div class="course-image">
                                                <a href="{{ route('course_details', $course->id) }}">
                                                    <img src="{{ asset('storage/'. $course->image) }}" alt="{{ $course->title }}" class="img-fluid">
                                                </a>

                                            </div>
                                            <div class="course-info p-3">
                                                <h5 class="course-title">
                                                    <a href="{{ route('course_details', $course->id) }}" class="text-dark">{{ $course->title }}</a>
                                                </h5>
                                                <p class="course-instructor">{{ $course->instructor->user->name ?? 'Unknown Instructor' }}</p>
                                                <div class="course-rating d-flex align-items-center">
                                                    <div class="rating-stars">
                                                        <!-- هنا ستبقى كود التقييم الخاص بك -->
                                                        @switch($course->reviews_avg_rating)
                                                            @case(0.5)
                                                                <i class="fas fa-star-half"></i>
                                                                @break
                                                            @case(1)
                                                                <i class="fas fa-star"></i>
                                                                @break
                                                            @case(1.5)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half"></i>
                                                                @break
                                                            @case(2)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                @break
                                                            @case(2.5)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half"></i>
                                                                @break
                                                            @case(3)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                @break
                                                            @case(3.5)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half"></i>
                                                                @break
                                                            @case(4)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                @break
                                                            @case(4.5)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star-half"></i>
                                                                @break
                                                            @case(5)
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                @break
                                                            @default
                                                                <i class="fas fa-star"></i>
                                                        @endswitch
                                                    </div>
                                                    <span class="ml-2">({{ $rate->reviews_avg_rate  ?? 'No Ratings' }})</span>
                                                </div>
                                                <div class="course-price mt-2">
                                                    <span>{{ $course->price }} EGP</span>
                                                </div>
                                                <a href="{{ route('course_details', $course->id) }}" class="btn btn-primary mt-3 w-100">View Course</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                @else
                    <p>No courses found.</p>
                @endif
                <br>
                <h3>Categories</h3>
                @if($subjects->count())
                    <div class="container">
                        <div class="categories-grid">

                            @foreach($subjects as $subject)
                                <div class="category-card">
                                    <a href="{{route('courses',$subject->id)}}">
                                        <img src="{{ asset('public/images/' . $subject->image) }}" alt="{{ $subject->name }}">                    <div class="category-info">
                                            <h3 style="color:white; font-size: 2.2rem">{{$subject->name}}</h3>
                                        </div>
                                    </a>
                                </div>

                            @endforeach
                        </div>
                    </div>

                @else
                    <p>No courses found.</p>
                @endif
                <br>
                <h3>Instructors</h3>
                @if($users->count())
                    <ul>
                        @foreach( $users as  $user)
                            <div class="result-item">
                                <h3><a href="{{ route('course-instructor',$user->id) }}">{{  $user->name }}</a></h3>
                                <p class="result-description">Instructor</p>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <p>No courses found.</p>
                @endif
                <br>
                <h3>FAQs</h3><br>
                @if($faqs->count())
                    <div style="visibility: hidden; position: absolute; width: 0px; height: 0px;">
                        <svg xmlns="http://www.w3.org/2000/svg">
                            <symbol viewBox="0 0 24 24" id="expand-more">
                                <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/><path d="M0 0h24v24H0z" fill="none"/>
                            </symbol>
                            <symbol viewBox="0 0 24 24" id="close">
                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/>
                            </symbol>
                        </svg>
                    </div>
                    @foreach($faqs as $faq)
                        <details close>
                            <summary>
                                {{$faq->question}}
                                <svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
                                <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
                            </summary>
                            <p>{{$faq->answer}}</p>
                        </details>
                    @endforeach

                @else
                    <p>No courses found.</p>
                @endif
                @endif
            </div>
        </div>
    </main>
@endsection
