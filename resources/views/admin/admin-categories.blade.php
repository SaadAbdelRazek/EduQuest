@extends('admin.layouts.dash')
@section('Categories')
    active
@endsection
@section('activity-title')
    Categories
@endsection
@section('content')
    @php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp
    <div class="container">

        <h1 class="table-title">Categories</h1>

        <div class="button-container">
            <a  href="{{ route('category_add') }}" class="btn create-btn"><i class="fas fa-plus"></i> Add Category</a>
        </div>


            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('category_edit', $category->id) }}" class="btn btn-info">Edit</a>
                            <form method="GET" class="btn btn-danger" action="{{ route('category_delete', $category->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
