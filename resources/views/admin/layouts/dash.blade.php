<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
                    <li><a href="{{ route('dashboard') }}" class="@yield('dashboard')"><i
                                class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li><a href="{{ route('pending-courses') }}" class="@yield('Courses')"><i class="fas fa-book"></i>
                            Courses</a></li>
                    <li><a href="{{ route('users.index') }}" class="@yield('users')"><i class="fas fa-users"></i>
                            Users</a></li>
                    <li><a href="{{ route('categories_table') }}" class="@yield('categories')"><i
                                class="fas fa-user-tie"></i> Categories</a></li>
                    <li><a href="{{ route('faqs.index') }}" class="@yield('faqs')"><i class="fas fa-user-tie"></i>
                            FAQs</a></li>
                    <li><a href="{{ route('settings.index') }}" class="@yield('settings')"><i
                                class="fas fa-user-tie"></i> Settings</a></li>
                    {{-- <li><a href="/contacts" class="@yield('contacts')"><i class="fas fa-user-tie"></i> Contacts</a></li> --}}

                    <li><a href="{{ route('instructor-questions.index') }}" class="@yield('instructor-questions')"><i
                                class="fas fa-user-tie"></i> Instructor Questions</a></li>
                    {{-- <li><a href="#"><i class="fas fa-chart-line"></i> Reports</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li> --}}
                </ul>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Top Navbar -->
                <div class="top-navbar">
                    <h1>{{ $user_data->name }} Dashboard</h1>
                    <div class="profile">
                        <span>Welcome, {{ $user_data->name }}</span>
                        {{-- <img src="profile.jpg" alt="Profile Picture"> --}}
                    </div>
                </div>
                @if (!isset($hideSpecialDiv) || !$hideSpecialDiv)
                    <!-- Dashboard Overview -->
                    <div class="dashboard-overview">
                        <div class="overview-box purple">
                            <h3>Categories</h3>
                            <p>{{$categories_count}}</p>
                        </div>
                        <div class="overview-box purple">
                            <h3>Courses</h3>
                            <p>{{$courses_count}}</p>
                        </div>
                        <div class="overview-box orange">
                            <h3>Students</h3>
                            <p>{{ $users->where('is_instructor', 0)->count() }}</p>
                        </div>
                        <div class="overview-box skyblue">
                            <h3>Instructors</h3>
                            <p>{{ $users->where('is_instructor', 1)->count() }}</p>
                        </div>

                        <div class="overview-box purple">
                            <h3>Enrollments</h3>
                            <p>{{$enrollments_count}}</p>
                        </div>
                        <div class="overview-box purple">
                            <h3>feedbacks</h3>
                            <p>{{$feedbacks_count}}</p>
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
                                <div class="bar" style="height: {{ $count > 0 ? $count * 20 : 20 }}px;">

                                    <span class="bar-label">{{ $date }}... </span>
                                    <span class="bar-label" style="color: orange"> {{ $count }} user</span>
                                </div>
                            @endforeach

                        </div>
                        <div class="charts">
                            <div class="chart-container">
                                <canvas id="studentPerformanceChart"></canvas>
                                <h2>Student Performance</h2>
                            </div>
                            <div class="chart-container">
                                <canvas id="courseCompletionChart"></canvas>
                                <h2>Course Completion Rate</h2>
                            </div>
                        </div>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            const ctx2 = document.getElementById('courseCompletionChart').getContext('2d');
                            const courseCompletionChart = new Chart(ctx2, {
                                type: 'pie',
                                data: {
                                    labels: ['Instructor', 'student'],
                                    datasets: [{
                                        label: 'Course Completion Rate',
                                        data: [{{$users->where('is_instructor', 0)->count()}}, {{$users->where('is_instructor', 1)->count()}}],
                                        backgroundColor: ['#6200EA', '#ff9f67'],
                                        borderColor: ['#6200EA', '#ff9f67'],
                                        borderWidth: 1,
                                    }]
                                },
                                options: {
                                    responsive: true,
                                }
                            });


                            //    2

                            const ctx1 = document.getElementById('studentPerformanceChart').getContext('2d');
                            const studentPerformanceChart = new Chart(ctx1, {
                                type: 'bar',
                                data: {
                                    labels: ['John', 'Jane', 'Tom', 'Lucy', 'Mike'],
                                    datasets: [{
                                        label: 'Scores',
                                        data: [85, 90, 78, 92, 88],
                                        backgroundColor: '#6200EA',
                                        borderColor: '#6200EA',
                                        borderWidth: 1,
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        @endif
                        <div class="recent-activity">
                            <h2>@yield('activity-title')</h2>
                            @yield('content')
                        </div>
            </div>


        </div>

        <!-- Main Content -->
        

        <style>
            .charts {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 20px;
                margin: 40px 0;
            }

            .chart-container {
                flex: 1;
                background-color: #f9f9f9;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
            }

            .chart-container canvas {
                width: 100%;
                max-width: 500px;
                height: 300px;
                margin-bottom: 15px;
                /* مسافة بين الرسم والنص */
            }

            .chart-container h4 {
                font-size: 18px;
                font-weight: bold;
                margin: 0;
                color: #333;
            }

            @media (max-width: 768px) {
                .charts {
                    flex-direction: column;
                    gap: 30px;
                }
            }
        </style>





    </x-app-layout>
</body>

</html>
