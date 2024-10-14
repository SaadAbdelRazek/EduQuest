@extends('admin.layouts.dash')

@section('create_setting')
    active
@endsection
@section('activity-title')
create setting
@endsection
@section('content')
@php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp

<body id="welcome">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="main-content">

            <!-- Add Contact Info Section -->
            <section id="add-contact-info">
                <div class="content-header">
                    <h1>Add Contact Info</h1>
                </div>
                <form action="{{ route('settings.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </section>

        </div>
    </div>

</body>
@endsection
