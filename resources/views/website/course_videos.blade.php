<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="/css/reviews.css">
<link rel="stylesheet" href="{{asset('css/course_videos.css')}}">
@extends('website.layouts.app')
@section('content')

<div class="navbar-bg"></div>
<br><br><br><br><br>
<div class="course-title">
    <h2>{{$course->title}}</h2>
</div>
<!-- Main Container -->
<div class="container">
    <!-- Main Video Area -->
    <div class="video-container">
        <!-- Video Player -->
        <video id="course-video" controls preload="auto">
            <source id="video-source" data-id="{{ $firstVideo->id }}" src="{{ asset('storage/' . $firstVideo->path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Course Title and Instructor -->
        <div class="course-details">
            <h1>{{$course->title}}</h1>
            <div class="instructor-details">
                <img src="{{asset('storage/'.$instructor->profile_photo_path)}}" alt="Instructor Image">
                <div class="instructor-info">
                    <h4>Instructor: {{$instructor->name}}</h4>
                </div>
            </div>
            <!-- Progress Bar -->
            <p><strong>Course Progress : </strong></p>
           @if($progress)
                <div class="progress-bar" style="width: {{$progress}}%">
                    <div class="progress"></div>
                </div>
                <p><strong>{{number_format($progress, 2)  }}%</strong></p>
               @if($progress==100 && $course->price != 0)
                   <a href="{{route('certificate',$course->id)}}" class="submit-comment"> Get Certificate</a>
               @endif
            @else
               <p>No Progress Yet</p>
           @endif
        </div>
        @if (session('success'))
        <div class="alert alert-warning alert-dismissible fade show" style="padding:10px; width:35%; background-color:rgb(41, 142, 55); color:white; border-radius:5px;" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" style="background-color: unset; cursor: pointer; margin-left:20px;" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" style="padding:10px; width:35%; background-color:rgb(239, 96, 96); color:white; border-radius:5px;" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" style="background-color: unset; cursor: pointer; margin-left:20px;" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif


        <!-- Comments Section -->
        <div class="comments">
            <h2>Reviews and Comments</h2>
            <form action="{{ route('sub_review', $course->id) }}" method="POST" class="review-form">
                @csrf
                <input type="hidden" name="instructor_id" value="{{ $course->instructor_id }}">
                <div class="slider-rating">
                    <input type="range" id="rate-slider" name="rate" min="1" max="5" step="0.5"
                        value="3" required>
                    <span id="rating-value">3</span> / 5 <span class="stars">&#9733;</span>
                </div>
                <div class="comment-box">
                <textarea name="comment" placeholder="Leave a comment..." rows="4" required></textarea>
                <button type="submit" class="submit-comment">Submit Review</button>
                </div>
            </form>



        <div class="comment-list">
            @if ($course->reviews->isEmpty())
                <h3>No reviews available</h3>
            @else
                @foreach ($course->reviews as $review)
                    <div id="review-{{ $review->id }}" class="comment" style="position: relative;">
                        <p style="float:right; cursor: pointer; display: inline;"
                            onclick="toggleEditDeleteForm({{ $review->id }})">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </p>
                        <div class="review-header">
                            @if ($review->user)
        <!-- Check if user has a profile picture -->
        @if ($review->user->profile_photo_path)
            <img src="{{ asset('storage/' . $review->user->profile_photo_path) }}" alt="User Image" class="user-image">
        @else
            <img src="{{ asset('/img/icon/default_prof_img.jpg') }}" alt="Default User Image" class="user-image">
        @endif

        <div class="review-details">
            <p class="user-name">
                {{ $review->user->name }}
            </p>
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
            <span class="review_date">
                {{ $review->created_at->diffForHumans() }}
            </span>
        </div>
    @else
        <!-- Default user image and unknown name if no user is associated with the review -->
        <img src="{{ asset('/img/icon/default_prof_img.jpg') }}" alt="Default User Image" class="user-image">
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

                        <div class="review-content-{{ $review->id }}" >
                            <p >{{ $review->comment }}</p>
                        </div>

                        @auth
                            @if ($review->user_id == Auth::user()->id)
                                <div id="edit-delete-form-{{ $review->id }}"
                                     style="display: none; position: absolute; top: -80px; right: 0; background: white; border: 1px solid #ccc; padding: 5px; z-index: 10;">
                                    <button style="color: red; background-color: unset; border: none; cursor: pointer;"
                                            onclick="deleteReview({{ $review->id }})">Delete</button>
                                    <button style="background-color: unset; border: none; cursor: pointer; color: blue;"
                                            onclick="editReview({{ $review->id }})">Edit</button>
                                </div>
                            @endif
                        @endauth
                    </div>

                    <div id="edit-review-form-{{ $review->id }}" style="display: none;">
                        <textarea id="comment-text-{{ $review->id }}" name="comment" rows="3">{{ $review->comment }}</textarea>
                        <button onclick="updateReview({{ $review->id }})">Save</button>
                        <button type="button" onclick="cancelEdit({{ $review->id }})">Cancel</button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function toggleEditDeleteForm(reviewId) {
                const form = document.getElementById(`edit-delete-form-${reviewId}`);
                form.style.display = form.style.display === 'none' ? 'block' : 'none';
            }

            // function confirmDelete() {
            //     return confirm('Are you sure you want to delete this review?');
            // }

            function editReview(reviewId) {
                document.getElementById(`review-content-${reviewId}`).style.display = 'none';
                document.getElementById(`edit-review-form-${reviewId}`).style.display = 'block';
            }

            function confirmUpdate(reviewId) {
                return confirm('Are you sure you want to update this review?');
            }

            function cancelEdit(reviewId) {
                document.getElementById(`review-content-${reviewId}`).style.display = 'block';
                document.getElementById(`edit-review-form-${reviewId}`).style.display = 'none';
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

    <div class="sidebar">
        <div class="sidebar-logo">
            <p style="color: white">
                <strong>{{$course->title}}</strong>
            </p>
        </div>
        <ul>
            @php
            $sectionCounter=1;
            @endphp
            @foreach($sections as $section)
            <li class="section">
                <div class="section-header">
                    <span><i class="fas fa-folder"></i> Section {{$loop->iteration}}: {{$section->title}}</span>
                    <span>+</span>
                </div>
                <div class="section-content">
                    @if(isset($videos[$section->id]) && count($videos[$section->id]) > 0)
                        @foreach($videos[$section->id] as $video)
                           <a data-video-url="{{ asset('storage/' . $video->path) }}" data-video-id="{{ $video->id }}" class="video-link" style="color: white">Video {{ $loop->iteration }} </a>
                        @endforeach
                    @endif
                        @foreach($quizzes as $quiz)
                            @if($quiz->section_no==$sectionCounter)
                             <a href="{{route('quiz',$quiz->id)}}">Quiz {{$loop->iteration}}</a>
                            @endif
                        @endforeach
                </div>
            </li>
                @php
                $sectionCounter++;
                @endphp
            @endforeach

        </ul>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // script.js
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
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
            const videoSrc = '';
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


    // Course Progress
    var videoPlayer = document.getElementById('course-video');

    videoPlayer.addEventListener('ended', function() {
        // Mark the video as completed by sending an AJAX request
        // Add CSRF token for all Axios requests
        console.log('Video ended, sending data to the server...');

        let url = window.location.pathname;
        let videoId = url.substring(url.lastIndexOf('/') + 1);

        axios.post('{{route('course_progress',$course->id)}}', {
            course_id: '{{ $course->id }}',
            video_id: videoId,
        }).then(function(response) {
            alert('Video marked as completed');
        }).catch(function(error) {
            console.error('Error marking video:', error);
        });
    });






    document.querySelectorAll('.video-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();  // لمنع التحديث الكامل للصفحة

            var videoUrl = this.getAttribute('data-video-url'); // الحصول على رابط الفيديو من data attribute
            var videoId = this.getAttribute('data-video-id');   // الحصول على ID الفيديو

            // تحديث الفيديو المعروض
            var videoPlayer = document.getElementById('course-video');
            var videoSource = document.getElementById('video-source');
            videoSource.src = videoUrl;           // تغيير الـ URL للفيديو
            videoSource.setAttribute('data-id', videoId);  // تعيين الـ data-id لمعرفة الفيديو الحالي

            videoPlayer.load();  // إعادة تحميل الفيديو لعرض الفيديو الجديد

            // تحديث الـ URL في شريط العناوين دون إعادة تحميل الصفحة
            window.history.pushState({}, '', '/course_videos/{{$course->id}}/' + videoId);
        });
    });





</script>
{{----------------------------submit no refresh------------------------------------------}}
<script>
    function generateStars(rate) {
        let stars = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= Math.floor(rate)) {
                stars += '<i class="fas fa-star"></i>';
            } else if (i === Math.ceil(rate) && (rate % 1) === 0.5) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            } else {
                stars += '<i class="far fa-star"></i>';
            }
        }
        return stars;
    }

    $(document).ready(function() {
        // Handle review submission
        $('.review-form').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            let formData = $(this).serialize(); // Serialize the form data
            let actionUrl = $(this).attr('action'); // Get the form action URL

            $.ajax({
                type: 'POST',
                url: actionUrl,
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // Add the new review to the comment list dynamically
                        $('.comment-list').prepend(`
                        <div class="comment">
                       <p style="float:right; cursor: pointer; display: inline;"
           onclick="toggleEditDeleteForm(${response.review.id})">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </p>
                            <div class="review-header">
                                <!-- Display user profile photo -->
                                <img src="${response.review.user_image}" alt="User Image" class="user-image" />

                                <div class="review-details">
                                    <p class="user-name">${response.review.user}</p>
                                    <div class="stars">${generateStars(response.review.rate)}</div>
                                    <span class="review_date">${response.review.created_at}</span>
                                </div>

                                <!-- Three-dot menu for edit and delete -->


                                <div id="edit-delete-form-{{ $review->id }}"
                                     style="display: none; position: absolute; top: -80px; right: 0; background: white; border: 1px solid #ccc; padding: 5px; z-index: 10;">
                                    <button style="color: red; background-color: unset; border: none; cursor: pointer;"
                                            onclick="deleteReview({{ $review->id }})">Delete</button>
                                    <button style="background-color: unset; border: none; cursor: pointer; color: blue;"
                                            onclick="editReview({{ $review->id }})">Edit</button>
                                </div>
                            </div>

                            <div class="review-content">
                                <p>${response.review.comment}</p>
                            </div>
                        </div>
                    `);
                        // Clear the form after submission
                        $('.review-form')[0].reset();
                    }
                },
                error: function() {
                    alert('Failed to submit review.');
                }
            });
        });
    });
    
</script>

    <script>
        // Delete review via AJAX
        function deleteReview(reviewId) {
            if (!confirm('Are you sure you want to delete this review?')) {
                return;
            }

            $.ajax({
                url: '/delete-review/' + reviewId, // Assuming this is the correct route
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                success: function(response) {
                    if (response.success) {
                        // Remove the comment from the view
                        $('#review-' + reviewId).remove();
                        alert('Review deleted successfully.');
                    } else {
                        alert('There was an error deleting the review.');
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('An error occurred while trying to delete the review.');
                }
            });
        }


        // Edit review (show edit form)
        function editReview(reviewId) {
            $(`#review-${reviewId}`).hide();
            $(`#edit-review-form-${reviewId}`).show();
        }

        // Cancel edit (hide edit form)
        function cancelEdit(reviewId) {
            $(`#edit-review-form-${reviewId}`).hide();
            $(`#review-${reviewId}`).show();
        }

        // Update review via AJAX
        function updateReview(reviewId) {
            const updatedComment = $(`#comment-text-${reviewId}`).val();

            $.ajax({
                url: `/update-review/${reviewId}`,
                type: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}',
                    comment: updatedComment
                },
                success: function(response) {
                    if (response.success) {
                        $(`#review-${reviewId} .review-content-${reviewId}`).html(`<p>${updatedComment}</p>`);
                        $(`#edit-review-form-${reviewId}`).hide();
                        $(`#review-${reviewId}`).show();
                        alert(response.message);
                    } else {
                        alert('Error updating review.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred.');
                }
            });
        }
    </script>
@endsection
