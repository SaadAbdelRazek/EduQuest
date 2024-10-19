
@extends('website.layouts.instructor-dash')
@section('dashboard')
    active
@endsection
@section('content')
<style>
    /* Responsive Design */
    @media (max-width: 992px) {
        .container {
            margin-left: 20px; /* Reduce margin for larger tablets and below */
        }

        .metrics, .charts {
            flex-direction: column; /* Stack items vertically */
            align-items: center; /* Center align items */
        }

        .metric, .chart-container {
            width: 100%; /* Full width on smaller screens */
            max-width: 300px; /* Limit max width */
            margin-bottom: 20px; /* Space between items */
        }

        .metric h3, .chart-container h2 {
            font-size: 1.25em; /* Adjust header font size */
        }
    }

    @media (max-width: 768px) {
        .container {
            margin-left: 0; /* Remove left margin for small tablets */
            padding: 0 10px; /* Add horizontal padding */
        }

        .metric p {
            font-size: 1.2em; /* Increase metric paragraph font size */
        }

        header h1 {
            font-size: 1.5em; /* Adjust header font size */
        }

        .metric h3, .chart-container h2 {
            font-size: 1.15em; /* Adjust header font size */
        }
    }

    @media (max-width: 576px) {
        .metric h3, .chart-container h2 {
            font-size: 1em; /* Further reduce header font size */
        }

        .metric p {
            font-size: 1em; /* Adjust metric paragraph font size */
        }
    }

    /* Additional adjustments for very small screens */
    @media (max-width: 400px) {
        header h1 {
            font-size: 1.25em; /* Smaller header font size for very small screens */
        }

        .metric p {
            font-size: 0.9em; /* Reduce metric paragraph font size */
        }
    }

</style>
    <div class="main-content">
        <div class="container">
            @if ($instructor->academic_degree == null || $instructor->bio == null || $instructor->description == null || $instructor->phone == null || $instructor->specialization == null || $instructor->university_name == null || $instructor->experience_years == null)
                <div>
                    <p><a href="{{route('instructor_dashboard_info')}}">Click to add instructor info to increase your reach</a></p>
                </div>
            @endif

            <center>
                <header>
                    <h1>Performance Analysis</h1>
                </header>
            </center>

            <!-- Performance Metrics Section -->
            <div class="courses-container">
                <div class="metrics">
                    <div class="metric">
                        <h3><i class="fas fa-users"></i> Total Students</h3>
                        <p>{{$students_count}}</p>
                    </div>
                    <div class="metric">
                        <h3><i class="fas fa-book"></i> Total Courses</h3>
                        <p>{{$courses}}</p>
                    </div>
                    <div class="metric">
                        <h3><i class="fas fa-dollar-sign"></i> Total Enrollments</h3>
                        <p>{{$total_enrolls}}$</p>
                    </div>
                    <div class="metric">
                        <h3><i class="fas fa-comment-dots"></i> Feedback Rating</h3>
                        @if ($rating)
                            <p>{{$rating}}/5</p>
                        @else
                            <p>Unrated</p>
                        @endif
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts">
                    <div class="chart-container">
                        <h2>Enrollments/Logins</h2>
                        <canvas id="studentPerformanceChart"></canvas>
                    </div>
                    <div class="chart-container">
                        <h2>Courses Profits</h2>
                        <canvas id="courseCompletionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    const ctx1 = document.getElementById('studentPerformanceChart').getContext('2d');

// تحويل الـ userCounts و newUserCounts من PHP إلى JavaScript
const userCounts = @json($userCounts);
const newUserCounts = @json($newUserCounts);

// استخراج التواريخ والأعداد من الـ userCounts
const labels = Object.keys(userCounts); // التواريخ
const loginData = Object.values(userCounts); // الأعداد الخاصة بتسجيل الدخول
const registrationData = Object.values(newUserCounts); // الأعداد الخاصة بالتسجيلات الجديدة

const maxValue = Math.max(...loginData, ...registrationData);
const adjustedMax = maxValue + 10;

const studentPerformanceChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: labels, // وضع التواريخ كـ labels
        datasets: [{
                label: 'Number of Logins',
                data: loginData, // وضع الأعداد الخاصة بتسجيل الدخول
                backgroundColor: '#864ad8',
                borderColor: '#6200EA',
                borderWidth: 1,
                barThickness: 30, // يمكنك تعديل سماكة الأعمدة
                barBorderRadius: 3,
            },
            {
                label: 'Enrollments',
                data: registrationData, // بيانات التسجيل الجديدة
                backgroundColor: '#28a745', // لون مميز
                borderColor: '#218838', // لون الحدود
                borderWidth: 1,
                barThickness: 30, // سماكة أعمدة التسجيل الجديدة أقل
                barBorderRadius: 3,
                type: 'bar', // التأكيد على أن هذه البيانات هي بيانات Bar
            }
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true, // يبدأ من الصفر
                max: adjustedMax, // الحد الأقصى هو 20
                stepSize: 1, // التأكد من أن الأرقام صحيحة (بدون كسور)
                ticks: {
                    callback: function(value) {
                        return Number.isInteger(value) ? value : null; // عرض الأرقام الصحيحة فقط
                    }
                }
            }
        }
    }

});



const courseNames = @json($course_names); // أسماء الكورسات
    const courseProfits = @json($course_profits); // أرباح الكورسات

    // دالة لتوليد لون عشوائي بصيغة HEX
    function generateRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // توليد ألوان عشوائية لكل كورس
    const backgroundColors = Array.from({ length: courseNames.length }, generateRandomColor);
    const borderColors = Array.from({ length: courseNames.length }, generateRandomColor);

    // إعداد الرسم البياني
    const ctx2 = document.getElementById('courseCompletionChart').getContext('2d');
    const courseCompletionChart = new Chart(ctx2, {
        type: 'pie', // نوع الرسم البياني هو Pie
        data: {
            labels: courseNames, // أسماء الكورسات كـ labels
            datasets: [{
                label: 'Course Profits', // عنوان البيانات
                data: courseProfits, // بيانات الأرباح لكل كورس
                backgroundColor: backgroundColors, // ألوان الخلفية المولدة
                borderColor: borderColors, // ألوان الحدود المولدة
                borderWidth: 1, // عرض الحدود
            }]
        },
        options: {
            responsive: true, // الرسم البياني متجاوب
        }
    });
</script>
    {{-- @section('custom-js') --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        {{-- <script src="{{asset('js/dash-analysis.js')}}"></script> --}}
    {{-- @endsection --}}
@endsection
