@extends('admin.layouts.dash')
@section('instructor-questions')
    active
@endsection
@section('activity-title')
    Instructor Questions
@endsection
@section('content')
@php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp

    <div class="container">
        <h1 class="table-title">Instructor Questions Management</h1>

        <!-- Create Button -->
        <div class="button-container">
            {{-- <a href="{{ route('faqs.create') }}" class="btn create-btn"><i class="fas fa-plus"></i> Create New FAQ</a> --}}
        </div>
        <!-- Create Button -->
        <div class="button-container">
            <a href="{{ route('instructor-questions.create') }}" class="btn create-btn"><i class="fas fa-plus"></i> Create New Question</a>
        </div>
        <!-- Data Table -->
        <table class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>choices</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->question_title }}</td>
                    <td>
                        {{
                        $data->choice1.'   , '.$data->choice2.'   , '.$data->choice3;

                        }}</td>
                    {{-- <td>{{ $faq->question }}</td>
                    <td>{{ $faq->answer }}</td> --}}
                    <td>
                        <a href="{{ route('instructor-questions.edit', $data->id) }}" class="btn edit-btn">Edit</a>
                        <form action="{{route('instructor-questions.destroy',$data->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
