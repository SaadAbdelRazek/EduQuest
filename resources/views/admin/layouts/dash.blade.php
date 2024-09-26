<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <li><a href="#" class="@yield('Courses')"><i class="fas fa-book"></i> Courses</a></li>
                <li><a href="#" class="@yield('Users')"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="{{route('faqs.index')}}" class="@yield('faqs')"><i class="fas fa-user-tie"></i> FAQs</a></li>
                <li><a href="#"><i class="fas fa-chart-line"></i> Reports</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navbar -->
            <div class="top-navbar">
                <h1>Admin Dashboard</h1>
                <div class="profile">
                    <span>Welcome, Admin</span>
                    <img src="profile.jpg" alt="Profile Picture">
                </div>
            </div>

            <!-- Dashboard Overview -->
            <div class="dashboard-overview">
                <div class="overview-box purple">
                    <h3>Courses</h3>
                    <p>150</p>
                </div>
                <div class="overview-box orange">
                    <h3>Students</h3>
                    <p>1200</p>
                </div>
                <div class="overview-box skyblue">
                    <h3>Instructors</h3>
                    <p>30</p>
                </div>
                <div class="overview-box purple">
                    <h3>Reports</h3>
                    <p>45</p>
                </div>
            </div>
            <div class="recent-activity">
                <h2>@yield('activity-title')</h2>
            @yield('content')
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>
