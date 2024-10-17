@extends('admin.layouts.dash')
@section('AdVideo')
active
@endsection
@section('activity-title')
AdVideo
@endsection
@section('content')
@php
// Define the variable to hide the div in the layout
$hideSpecialDiv = true;
@endphp

<div class="d-block justify-content-center">

    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Video</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $adVideoes as $adVideo )
            <tr>
                <td>{{ $adVideo->id }}</td>
                <td>
                    <video width="600" controls>
                        <source src="{{ asset($adVideo->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </td>
                <td>
                    <div class="d-flex ">
                        <form method="POST" action="{{route('adVideo.destroy',$adVideo->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex flex-row mt-5">
        <div>
            <a href="{{route('adVideo.create')}}" class="btn btn-danger ">Add New Video</a>
        </div>
    </div>

</div>

@endsection