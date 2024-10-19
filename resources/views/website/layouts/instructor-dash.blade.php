<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Instructor Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/instructor-dashboard-style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
    .sidebar .photo {
                text-align: center;
                z-index: 2;
                max-height: 120px;
                border-bottom: 1px solid #808080;
            }

            .sidebar .photo img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                cursor: pointer;
                transition-duration: .5s;


            }

            .sidebar .photo img:hover {
                opacity: 70%;
                /* scale: 1.1; */
                z-index: -1;
            }
    /* Responsive Design for Sidebar */
    @media screen and (max-width: 992px) {
        .sidebar {
            width: 100%;
            min-height: auto;
            padding: 15px;
            position: relative;
            top: 0;
            left: 0;
            display: block;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 1.25em;
        }

        .photo img {
            max-width: 120px;
            margin: 0 auto;
        }

        .sidebar ul li a {
            text-align: center;
            padding: 12px;
        }
    }

    @media screen and (max-width: 768px) {
        .sidebar {
            width: 100%;
            padding: 10px;
        }

        .sidebar h2 {
            font-size: 1.1em;
        }

        .photo img {
            max-width: 100px;
        }

        .sidebar ul li a {
            font-size: 0.9em;
            padding: 10px;
        }
    }

    @media screen and (max-width: 576px) {
        .sidebar {
            width: 100%;
            padding: 5px;
        }

        .sidebar h2 {
            font-size: 1em;
        }

        .photo img {
            max-width: 80px;
        }

        .sidebar ul li a {
            font-size: 0.85em;
            padding: 8px;
        }
    }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="photo" id="photo">
        <a href="{{ route('myProfile', $user_data->id) }}">
            @if ($user_data->profile_photo_path)
                <img src="{{ asset('storage/' . $user_data->profile_photo_path) }}" alt="{{ $user_data->name }}"
                     data-bs-toggle="tooltip" data-bs-placement="bottom" title="view your profile">
            @else
                <img src="{{ asset('img/icon/default_prof_img.jpg') }}" alt="{{ $user_data->name }}"
                     data-bs-toggle="tooltip" data-bs-placement="bottom" title="view your profile">
            @endif
        </a>
        <div class="in-photo">
            <span></span>
            <p></p>
        </div>
    </div>
    <h2>Instructor Dashboard</h2>
    <ul>
        <li><a href="{{route('instructor-dashboard')}}" class="@yield('dashboard')">Dashboard</a></li>
        <li><a href="{{route('instructor-courses')}}" class="@yield('courses')">My Courses</a></li>
        <li><a href="{{route('instructor_add_course')}}" class="@yield('add-course')">Add Course</a></li>
        <li><a href="{{route('instructor-students')}}" class="@yield('students')">Students</a></li>
        <li><a href="{{route('instructor_dashboard_info')}}" class="@yield('info')">Additional information</a></li>
        <li><a href="{{route('myProfile')}}">Return to website</a></li>
    </ul>
</div>

@yield('content')



@yield('custom-js')

</body>
</html>
