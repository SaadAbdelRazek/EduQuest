@extends('website.layouts.app')
@section('content')
    <h1>{{ $category->name }}</h1>
    <ul>
        @foreach($courses as $course)
            <li>{{ $course->image }}</li>
            <li>{{ $course->title }}</li>
            <li>{{ $course->description }}</li>
        @endforeach
    </ul>
@endsection
