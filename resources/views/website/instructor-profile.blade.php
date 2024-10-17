@extends('website.layouts.app')


@section('content')

    <style>
        .containerr {
            padding: 40px;
            background-color: #ffffff;
            /* Light Gray */
            text-align: center;

        }





        .profile-picture img {
            width: 30%;
            /* يضمن أن الصورة تملأ العرض بالكامل */
            height: 400px;
            /* يمكنك تعديل هذا حسب ما يناسبك */
            object-fit: cover;
            /* يضمن أن الصورة تكون متناسبة بشكل صحيح وتغطي الحيز */
            border-radius: 10px;
            /* للحواف الدائرية */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* إضافة تأثير الظل */
        }


        .profile-details {
    /* display: flex; */
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.details {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.profile-picture {
    flex: 1;
    width: 100%;
    padding: 20px;
    text-align: left;
}

.profile-picture img {
    width: 90%;
    height: 400px;
    object-fit: cover;
    border-radius: 10px;
    /* border: 2px solid #6c757d; */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.profile-info {
    flex: 1; /* يجعل العرض أكثر اتساعًا للنص */
    padding: 20px;
    text-align: left;
    border-radius: 10px; /* زوايا مدورة للمحتوى */
}

.profile-info h3 {
    font-size: 1.75em; /* تكبير حجم العنوان لجعله بارزًا */
    margin-bottom: 12px; /* مسافة أكبر تحت العنوان */
    color: #333; /* لون داكن لتحسين الوضوح */
    font-weight: bold;
}

.profile-info p {
    margin-bottom: 20px; /* زيادة المسافة بين الفقرات لزيادة الوضوح */
    font-size: 1.1em;
    line-height: 1.6; /* تحسين المسافة بين الأسطر لجعل النص أسهل في القراءة */
    color: #555; /* لون فاتح لتحسين التباين */
}

.about-teacher, .courses-taught {
    margin-top: 30px; /* مسافة أكبر بين الأقسام لتوضيح الفواصل */
    padding: 20px;
    border-radius: 10px;
    background-color: #fff; /* خلفية بيضاء للمحتوى */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* ظل خفيف للمحتوى */
}

.about-teacher h3, .courses-taught h3 {
    font-size: 1.4em;
    margin-bottom: 10px;
    color: #333;
    font-weight: bold;
}

.courses-taught ul {
    list-style: none;
    padding: 0;
}

.courses-taught ul li {
    font-size: 1.1em;
    margin-bottom: 10px; /* مسافة بين كل عنصر في القائمة */
    color: #555;
    
}

.courses-taught p {
    font-size: 1em;
    color: #777;
}


    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Instructor Profile</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">instructor profile</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                        <img src="{{asset('img/hero/prof.png')}}" style="width: 220px; max-height:180px ; margin-top:150px; margin-left:120px;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show"
            style="padding:10px; position: fixed; background-color:rgb(41, 142, 55); color:white; border-radius:5px;"
            role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" style="background-color: unset; cursor: pointer; margin-left:20px;"
                data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show"
            style="padding:10px; position: fixed; background-color:rgb(239, 96, 96); color:white; border-radius:5px;"
            role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" style="background-color: unset; cursor: pointer; margin-left:20px;"
                data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif
    <div class="containerr">
        <div class="profile-details">
            <div class="profile-details">
                <div class="details">
                    <div class="profile-picture">
                        @if ($course_instructor->profile_photo_path)
                            <img src="{{ asset('storage/' . $course_instructor->profile_photo_path) }}" alt="Instructor Picture">
                        @else
                            <img src="{{ asset('img/icon/default_prof_img.jpg') }}" alt="Instructor Picture">
                        @endif
                    </div>
                    <div class="profile-info">
                        <h3>I'm {{ $course_instructor->name }}</h3>
                        <p>{{ $instructor->specialization }}</p>
                        <p>Have a {{ $instructor->experience_years }} Years of Experience</p>
                        <p>Email: <a style="color: peru" href="mailto:{{ $course_instructor->email }}">{{ $course_instructor->email }}</a> </p>
                        <p>Phone: <a style="color:peru" href="tel:{{ $instructor->phone }}">{{ $instructor->phone }}</a> </p>
                        <div class="about-teacher">
                            <h3>About Instructor</h3>
                            <p>{{ $instructor->description }}</p>
                        </div>

                        <div class="courses-taught">
                            <h3>Courses Taught</h3>
                            @if ($courses->count() > 0)
                                <ul>
                                    @foreach ($uniqueCourses as $course)
                                        <li>{{ $course->title }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>No courses found for this instructor.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>





        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="/css/reviews.css">

        <section class="student-reviews">
            @auth
                {{-- عرض جميع المراجعات الخاصة بالدورة --}}
                {{-- <h3 @yield('h_2')>Reviews</h3> --}}
                @if ($instructor->user_id != auth()->user()->id)
                    <h3 @yield('h_2')>Rate the Course</h3>
                    <form action="{{ route('sub_review', $course->id) }}" method="POST" class="review-form">
                        @csrf
                        <input type="hidden" name="instructor_id" value="{{ $instructor->id }}">
                        <div class="slider-rating">
                            <input type="range" id="rate-slider" name="rate" min="1" max="5" step="0.5"
                                value="3" required>
                            <span id="rating-value">3</span> / 5 <span class="stars"><i class="fas fa-star"></i></span>
                        </div>
                        <textarea name="comment" placeholder="Leave a comment..." rows="4" required></textarea>
                        <button type="submit" class="submit-review">Submit Review</button>
                    </form>
                @endif
                @if ($course->reviews->isEmpty())
                    <h3>No reviews available</h3>
                @else
                    @if ($instructor->user_id != auth()->user()->id)
                        <h2 @yield('h_1')>All Reviews for this instructor</h2>
                    @else
                        <h2 @yield('h_1')>All Reviews about you</h2>
                    @endif
                    <div class="reviews">
                        @foreach ($course->reviews as $review)
                            <div class="review" style="position: relative;">
                                <p style="float:right; cursor: pointer; display: inline;"
                                    onclick="toggleEditDeleteForm({{ $review->id }})">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </p>
                                <div class="review-header">
                                    @if ($review->user)
                                        @if ($review->user->profile_photo_path)
                                            <img src="{{ asset('storage/' . $review->user->profile_photo_path) }}"
                                                alt="User Image" class="user-image">
                                        @else
                                            <img src="{{ asset('img/icon/default_prof_img.jpg') }}" alt="User Image"
                                                class="user-image">
                                        @endif
                                        <div class="review-details">
                                            <p class="user-name">{{ $review->user->name }}</p>
                                            <div class="stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($review->rate))
                                                        <i class="fas fa-star"></i>
                                                    @elseif ($i == ceil($review->rate) && fmod($review->rate, 1) == 0.5)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="review_date">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                    @else
                                        <img src="{{ asset('/img/icon/default_prof_img.jpg') }}" alt="User Image"
                                            class="user-image">
                                        <div class="review-details">
                                            <p class="user-name">Unknown User</p>
                                            <div class="stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= floor($review->rate))
                                                        <i class="fas fa-star"></i>
                                                    @elseif ($i == ceil($review->rate) && fmod($review->rate, 1) == 0.5)
                                                        <i class="fas fa-star-half-alt"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <span class="review_date">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endif
                                </div>

                                <div id="review-content-{{ $review->id }}">
                                    <p class="comment">{{ $review->comment }}</p>
                                </div>

                                <div style="position: relative;">
                                    @auth
                                        {{-- عرض خيارات التعديل والحذف فقط إذا كان المستخدم هو صاحب التعليق --}}
                                        @if ($review->user_id == auth()->user()->id)
                                            <div id="edit-delete-form-{{ $review->id }}"
                                                style="display: none; position: absolute; top: -80px; right: 0; background: white; border: 1px solid #ccc; padding: 5px; z-index: 10;">
                                                <form action="{{ route('delete_review', $review->id) }}" method="POST"
                                                    onsubmit="return confirmDelete()">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        style="color: red; background-color: unset; border: none; cursor: pointer;">Delete</button>
                                                </form>

                                                <button
                                                    style="background-color: unset; border: none; cursor: pointer; color: blue;"
                                                    onclick="editReview({{ $review->id }})">Edit</button>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                            </div>

                            <div id="edit-review-form-{{ $review->id }}" style="display: none;">
                                <form action="{{ route('update_review', $review->id) }}" method="POST"
                                    onsubmit="return confirmUpdate({{ $review->id }})">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="comment" rows="3">{{ $review->comment }}</textarea>
                                    <button type="submit">Save</button>
                                    <button type="button" onclick="cancelEdit({{ $review->id }})">Cancel</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- عرض نموذج التقييم فقط للمستخدمين الذين ليسوا المدرب --}}

            @endauth
        </section>




        <script>
            function toggleEditDeleteForm(reviewId) {
                const form = document.getElementById(edit - delete - form - $ {
                    reviewId
                });
                form.style.display = form.style.display === 'none' ? 'block' : 'none';
            }

            function confirmDelete() {
                return confirm('Are you sure you want to delete this review?');
            }

            function editReview(reviewId) {
                // إخفاء نص التعليق وإظهار نموذج التعديل
                document.getElementById(review - content - $ {
                    reviewId
                }).style.display = 'none';
                document.getElementById(edit - review - form - $ {
                    reviewId
                }).style.display = 'block';
            }

            function confirmUpdate(reviewId) {
                return confirm('Are you sure you want to update this review?');
            }

            function cancelEdit(reviewId) {
                // إعادة إظهار نص التعليق وإخفاء نموذج التعديل
                document.getElementById(review - content - $ {
                    reviewId
                }).style.display = 'block';
                document.getElementById(edit - review - form - $ {
                    reviewId
                }).style.display = 'none';
            }
        </script>

        <script>
            const slider = document.getElementById('rate-slider');
            const ratingValue = document.getElementById('rating-value');

            slider.addEventListener('input', function() {
                ratingValue.textContent = slider.value;
            });
        </script>

    </div>



@endsection
