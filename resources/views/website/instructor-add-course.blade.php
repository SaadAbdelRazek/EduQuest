@extends('website.layouts.instructor-dash')
@section('add-course')
    active
@endsection
@section('content')
<!-- Main Content -->
<div class="main-content">
    <center>
        <header>
            <h1>Add New Course</h1>
        </header>
    </center>

    <div class="container">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="course-title">Course Title</label>
                <input type="text" id="course-title" name="course-title" placeholder="Enter course title">
            </div>
            <div class="form-group">
                <label for="course-description">Course Description</label>
                <textarea id="course-description" name="course-description" rows="5" placeholder="Enter course description"></textarea>
            </div>
            <div class="form-group">
                <label for="course-category">Category</label>
                <select id="course-category" name="course-category">
                    <option value="technology">Technology</option>
                    <option value="business">Business</option>
                    <option value="art">Art</option>
                </select>
            </div>
            <div class="form-group">
                <label for="course-image">Course Image</label>
                <input type="file" id="course-image" name="course-image">
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Add Course</button>
            </div>
        </form>
    </div>
</div>
@endsection
