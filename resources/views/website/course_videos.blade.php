@extends('website.layouts.app')
@section('content')

<style>

    

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        .video-player {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 30px;
    border: 2px solid #c3c3c3; /* لون أحمر طماطم */
    border-radius: 10px;
    padding: 20px;
    background: #ffffff; /* لون خلفية جميل */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.video-title {
    font-size: 2em; /* حجم أكبر للعنوان */
    margin-bottom: 15px;
    color: #ff6347; /* لون عنوان جذاب */
    text-align: center;
}

.video-description {
    margin-top: 15px;
    text-align: center;
    color: #555;
    font-size: 1.1em; /* حجم خط أكبر للوصف */
}




.video-list-container {
    background: #ffffff; /* لون خلفية فاتح */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;

}

.toggle-button {
    background: #ff6347;
    color: white;
    padding: 10px;
    text-align: center;
    cursor: pointer;
    margin-bottom: 15px;
    border-radius: 5px;
    width: 200px;
}

.toggle-icon{
    /* display:block; */
    cursor: pointer;
}




.progress-section {
    background: white; /* لون خلفية لطيف */
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.progress-bar-container {
    background: #white; /* لون خلفية شريط التقدم */
    border-radius: 5px;
    height: 30px;
    margin: 10px 0;
}

.progress-bar {
    background: #ff6347; /* لون شريط التقدم */
    height: 100%;
    border-radius: 5px;
    transition: width 0.5s; /* تأثير لطيف عند التقدم */
}

.progress-text {
    font-size: 1.1em; /* حجم خط أكبر */
}




.resources-section {
    background: white; /* لون خلفية جميل */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

.resources-section ul {
    list-style-type: none; /* إزالة النقاط من القائمة */
    padding: 0;
}

.resources-section li {
    margin: 10px 0; /* تباعد بين العناصر */
}

.resources-section a {
    color: #ff6347; /* لون الروابط */
    text-decoration: underline;
}

.resources-section a:hover {
    color: #d32f2f; /* تغيير اللون عند التحويم */
}


        .back-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .back-button:hover {
            background: #0056b3;
        }
    </style>

<main>
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Course details</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Course details</a></li>
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



    <div class="container">
        <h1>Course Videos</h1>

        <div class="video-player">
            <h2 class="video-title">Current Video Title</h2>
            <iframe width="100%" height="450" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allowfullscreen></iframe>
            <p class="video-description">In this video, you will learn about the key concepts of the course and how to apply them effectively.</p>
        </div>



        <div class="video-list-container" id="videoList">
            <h3>Video List</h3>
            <div class="toggle-button" onclick="toggleVideoList()">
                <span class="toggle-icon">+</span> <!-- الرمز الافتراضي -->
                Show List
            </div>
            <div class="video-list" id="videoListContent">
                <div class="video-item">
                    <div class="video-header" onclick="toggleDetails('video1-details')">
                        <h4>Video Title 1 (5 min)</h4>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="video-details" id="video1-details" style="display: none;">
                        <p>Description: This video covers the basics of the course.</p>
                        <a href="#" onclick="loadVideo('VIDEO_ID1', 'Video Title 1')">Watch Now</a>
                    </div>
                </div>

                <div class="video-item">
                    <div class="video-header" onclick="toggleDetails('video2-details')">
                        <h4>Video Title 1 (5 min)</h4>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="video-details" id="video2-details" style="display: none;">
                        <p>Description: This video covers the basics of the course.</p>
                        <a href="#" onclick="loadVideo('VIDEO_ID1', 'Video Title 1')">Watch Now</a>
                    </div>
                </div>

                <div class="video-item">
                    <div class="video-header" onclick="toggleDetails('video3-details')">
                        <h4>Video Title 1 (5 min)</h4>
                        <span class="toggle-icon">+</span>
                    </div>
                    <div class="video-details" id="video3-details" style="display: none;">
                        <p>Description: This video covers the basics of the course.</p>
                        <a href="#" onclick="loadVideo('VIDEO_ID1', 'Video Title 1')">Watch Now</a>
                    </div>
                </div>
                <!-- المزيد من الفيديوهات حسب الحاجة -->
            </div>
        </div>




        <div class="progress-section">
            <h2>Course Progress</h2>
            <div class="progress-bar-container">
                <div class="progress-bar" style="width: 75%;"></div> <!-- النسبة يمكن تعديلها ديناميكيًا -->
            </div>
            <div class="progress-text">Completed: 75%</div>
        </div>


        <div class="resources-section">
            <h2>Additional Resources</h2>
            <ul>
                <li><a href="resource1.pdf" target="_blank">Resource 1: PDF Guide</a></li>
                <li><a href="resource2.pdf" target="_blank">Resource 2: Cheat Sheet</a></li>
                <li><a href="resource3.pdf" target="_blank">Resource 3: Study Material</a></li>
                <!-- المزيد من الموارد حسب الحاجة -->
            </ul>
        </div>

        <button class="back-button" onclick="goBack()">Back to Course</button>
    </div>

    <script>
        function toggleVideoList() {
    const videoListContent = document.getElementById('videoListContent');
    const toggleIcon = document.querySelector('.toggle-button .toggle-icon');

    if (videoListContent.style.display === "none" || videoListContent.style.display === "") {
        videoListContent.style.display = "block";
        toggleIcon.textContent = "-"; // تغيير الرمز إلى -
    } else {
        videoListContent.style.display = "none";
        toggleIcon.textContent = "+"; // تغيير الرمز إلى +
    }
}

// الدالة الموجودة مسبقًا
function toggleDetails(detailsId) {
    const details = document.getElementById(detailsId);
    const icon = details.previousElementSibling.querySelector('.toggle-icon');
    if (details.style.display === "none") {
        details.style.display = "block";
        icon.textContent = "-"; // تغيير الرمز عند الفتح
    } else {
        details.style.display = "none";
        icon.textContent = "+"; // إعادة الرمز عند الإغلاق
    }
}






        function loadVideo(videoId, title) {
            document.querySelector('.video-title').textContent = title;
            document.querySelector('iframe').src = 'https://www.youtube.com/embed/' + videoId;
            document.querySelector('.video-description').textContent = 'Description of ' + title;
        }

        function goBack() {
            // Logic to go back to the course page
            window.location.href = 'course.html'; // Replace with your course page URL
        }
    </script>

</main>






@endsection
