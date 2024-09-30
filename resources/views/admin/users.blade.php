@extends('admin.layouts.dash')
@section('users')
    active
@endsection
@section('activity-title')
@if (session('message'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif
    users
@endsection

@section('content')

@php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp



    <div class="container">
        <h1 class="table-title">current users</h1>

        <!-- Create Button -->
        <div class="button-container">
            {{-- <a href="{{ route('faqs.create') }}" class="btn create-btn"><i class="fas fa-plus"></i> Create New FAQ</a> --}}
        </div>
        <!-- Create Button -->
        {{-- <div class="button-container">
            <a href="{{ route('faqs.create') }}" class="btn create-btn"><i class="fas fa-plus"></i> Create New FAQ</a>
        </div> --}}
        <!-- Data Table -->
        <table class="styled-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        @if ($data->is_instructor==1 && $data->is_admin==1)

                        admin , instructor
                        @elseif ($data->is_instructor==0 && $data->is_admin==0)
                        student
                        @elseif ($data->is_instructor==0 && $data->is_admin==1)
                        admin
                        @elseif ($data->is_instructor==1 && $data->is_admin==0)
                        instructor , student
                        @else
                        student

                        @endif

                    </td>
                    <td>
                        <a href="" class="btn edit-btn">more</a>
                        <form action="{{ route('users.destroy', $data->id) }}" onsubmit="return confirmDelete()" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">remove</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function confirmDelete() {
        return confirm('Are you sure you want to remove this user?');
    }
    </script>
@endsection
