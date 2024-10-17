@extends('admin.layouts.dash')
@section('Developers')
active
@endsection
@section('activity-title')
Developers
@endsection
@section('content')
    @php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp

    <table class="styled-table">
        <thead >
            <tr >
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Role</th>
                <th>Links</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($developers as $developer)
            <tr>
                <td>{{ $developer->id }}</td>
                <td>
                    <div class="cat-icon">
                        <img style="width: 80px;" src="{{asset($developer->image)}}" alt="">
                    </div>
                </td>
                <td>{{ $developer->name }}</td>
                <td>{{ $developer->role }}</td>
                <td>
                    <div>
                        <a class="m-1" href="{{$developer->facebook}}"><i class="fab fa-facebook" style="color: white"></i></a>
                        <a class="m-1" href="{{$developer->linkedin}}"><i class="fab fa-linkedin" style="color: white"></i></a>
                        <a class="m-1" href="mailto:{{$developer->twitter}}"><i class="fas fa-envelope" style="color: white"></i></a>
                        <a class="m-1" href="{{$developer->github}}"><i class="fab fa-github" style="color: white"></i></a>
                    </div>
                </td>
                <td >
                    <div class="d-flex ">
                        <div >
                            <a href="{{route('developer.edit',$developer->id)}}"
                                class="btn edit-btn"><i class="fas fa-edit"></i></a>
                        </div>
                        <form action="{{route('developer.destroy',$developer->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        <a href="{{route('developer.create')}}" class="btn btn-success mt-5">Add Developer</a>
    </div>

@endsection
