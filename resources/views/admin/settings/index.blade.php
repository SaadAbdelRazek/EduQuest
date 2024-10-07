@extends('admin.layouts.dash')

@section('settings')
    active
@endsection
@section('activity-title')
    Settings
@endsection
@section('content')
@php
    // Define the variable to hide the div in the layout
    $hideSpecialDiv = true;
@endphp
<body>

    <!-- Main Wrapper -->
    <div id="container" class="container">

            <!-- Add Contact Info Button -->
            <h1 class="table-title">Contact Information</h1>
            <div class="content-header" style="margin-top: 20px; text-align: right;">
                <a href="{{ route('settings.create') }}" class="btn btn-success" style="background-color: #28a745;  padding: 10px 20px;  margin-bottom:10px;">Add Contact Info</a>
            </div>
            <!-- Contact Information Management Section -->

                    <table class="styled-table" >
                        <thead >
                            <tr>
                                <th style="padding: 12px 15px;">Address</th>
                                <th style="padding: 12px 15px;">Phone</th>
                                <th style="padding: 12px 15px;">Email</th>
                                <th style="padding: 12px 15px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr>
                                    <td>{{ $setting->address }}</td>
                                    <td>{{ $setting->phone }}</td>
                                    <td>{{ $setting->email }}</td>
                                    <td>
                                        <a href="{{ route('settings.edit', $setting) }}" class="btn btn-info" style="  ">Edit</a>
                                        <form action="{{ route('settings.destroy', $setting) }}" method="POST" style="display:inline; ">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit" style="">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



    </div>

</body>
@endsection
