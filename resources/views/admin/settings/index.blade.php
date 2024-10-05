@extends('admin.layouts.app')

@section('content')
<body id="welcome">

    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="main-content">

            <!-- Contact Information Management Section -->
            <section id="contact-info">
                <div class="content-header">
                    <h1>Contact Information</h1>
                    <a href="{{ route('settings.create') }}" class="btn btn-primary">Add Contact Info</a>
                </div>

                <!-- Table for Contact Information -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ $setting->address }}</td>
                                    <td>{{ $setting->phone }}</td>
                                    <td>{{ $setting->email }}</td>
                                    <td>
                                        <a href="{{ route('settings.edit', $setting) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('settings.destroy', $setting) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- You can add additional sections here if needed -->

        </div>
    </div>

</body>
@endsection
