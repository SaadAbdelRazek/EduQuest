<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
</head>
<body>
<x-app-layout>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>EduAdmin</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="{{route('dashboard')}}" class="@yield('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{route('pending-courses')}}" class="@yield('Courses')"><i class="fas fa-book"></i> Courses</a></li>
                <li><a href="{{route('users.index')}}" class="@yield('users')"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="{{route('categories_table')}}" class="@yield('categories')"><i class="fas fa-user-tie"></i> Categories</a></li>
                <li><a href="{{route('faqs.index')}}" class="@yield('faqs')"><i class="fas fa-user-tie"></i> FAQs</a></li>
                <li><a href="/contacts" class="@yield('faqs')"><i class="fas fa-user-tie"></i> Contacts</a></li>
                <li><a href="/settings" class="@yield('faqs')"><i class="fas fa-user-tie"></i> Settings</a></li>

                <li><a href="{{route('instructor-questions.index')}}" class="@yield('instructor-questions')"><i class="fas fa-user-tie"></i> Instructor Questions</a></li>
                {{-- <li><a href="#"><i class="fas fa-chart-line"></i> Reports</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li> --}}
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navbar -->
            <div class="top-navbar">
                <h1>{{$user_data->name}} Dashboard</h1>
                <div class="profile">
                    <span>Welcome, {{$user_data->name}}</span>
                    {{-- <img src="profile.jpg" alt="Profile Picture"> --}}
                </div>
            </div>
            @if (!isset($hideSpecialDiv) || !$hideSpecialDiv)
            <!-- Dashboard Overview -->
            <div class="dashboard-overview">
                <div class="overview-box purple">
                    <h3>Courses</h3>
                    <p>150</p>
                </div>
                <div class="overview-box orange">
                    <h3>Students</h3>
                    <p>{{$users->where('is_instructor',0)->count()}}</p>
                </div>
                <div class="overview-box skyblue">
                    <h3>Instructors</h3>
                    <p>{{$users->where('is_instructor',1)->count()}}</p>
                </div>
                <div class="overview-box purple">
                    <h3>Reports</h3>
                    <p>45</p>
                </div>
            </div>



            <style>



                /* تنسيق العنوان */
                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                /* الحاوية الرئيسية التي تضم الأعمدة */
                .chart-container {
                    display: flex;
                    justify-content: space-around;
                    align-items: flex-end;
                    width: 100%;
                    height: 400px;
                    background-color: #fff;
                    padding: 20px;
                    border: 1px solid #ccc;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                }

                /* الأعمدة التي تمثل كل يوم */
                .bar {
                    width: 18%;
                    background-color: #4d119b;
                    text-align: center;
                    color: white;
                    display: flex;
                    justify-content: center;
                    align-items: flex-end;
                    border-radius: 5px 5px 0 0;
                }

                /* النصوص الموجودة أسفل الأعمدة */
                .bar-label {
                    text-align: center;
                    margin-top: 50px;
                }
                .bar:hover {
        background-color: #6e1adc;
    }



                /* تغيير ارتفاع الأعمدة بناءً على عدد المستخدمين (التمثيل يدوي هنا) */

            </style>
             <div class="container">
                <h2>Login Statistics - Last 5 Days</h2>

                <!-- المخطط الذي يحتوي على الأعمدة -->
                <div class="chart-container">
                    @foreach ($userCounts as $date => $count)
                <div class="bar" style="height: {{ ($count > 0) ? ($count * 20) : 20 }}px;">

                        <span class="bar-label">{{ $date }}...  </span>
                        <span class="bar-label" style="color: orange"> {{ $count }} user</span>
                </div>
            @endforeach

            </div>
            @endif
            <div class="recent-activity">
                <h2>@yield('activity-title')</h2>
            @yield('content')
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>
