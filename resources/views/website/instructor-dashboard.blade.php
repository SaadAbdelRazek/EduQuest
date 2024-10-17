
@extends('website.layouts.instructor-dash')
@section('dashboard')
    active
@endsection
@section('content')
<div class="main-content">


    <div class="container" style=" margin-left: 50px">

        <center>
            <header>
                <h1>Performance Analysis</h1>
            </header>
        </center>
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
                    <h3><i class="fas fa-solid fa-dollar-sign"></i> total enrollments</h3>
                    <p>{{$total_enrolls}}$</p>
                </div>
                <div class="metric">
                    <h3><i class="fas fa-regular fa-comment-dots"></i> Feedback Rating</h3>
                    @if ($rating)

                    <p>{{$rating}}/5</p>
                    @else
                    <p>un rated</p>
                    @endif
                </div>
            </div>

            <div class="charts">
                <div class="chart-container">
                    <h2>Student Performance</h2>
                    <canvas id="studentPerformanceChart"></canvas>
                </div>
                <div class="chart-container">
                    <h2>Course Completion Rate</h2>
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



const ctx2 = document.getElementById('courseCompletionChart').getContext('2d');
const courseCompletionChart = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ['Not Completed', 'Completed'],
        datasets: [{
            label: 'Course Completion Rate',
            data: [70, 30],
            backgroundColor: ['#5d0189','#28a745' ],
            borderColor: [ '#5d0189', '#28a745'],
            borderWidth: 1,
        }]
    },
    options: {
        responsive: true,
    }
});
</script>
    {{-- @section('custom-js') --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        {{-- <script src="{{asset('js/dash-analysis.js')}}"></script> --}}
    {{-- @endsection --}}
@endsection
