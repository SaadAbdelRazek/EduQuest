@extends('admin.layouts.dash')

@section('edit_setting')
    active
@endsection
@section('activity-title')
edit setting
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

            <!-- Edit Contact Info Section -->
            <section id="edit-contact-info">
                <div class="content-header">
                    <h1>Edit Contact Info</h1>
                </div>
                <form action="{{ route('settings.update', $setting) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $setting->address }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $setting->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $setting->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </section>

        </div>
    </div>

</body>
@endsection
