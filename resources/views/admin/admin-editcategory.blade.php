@extends('admin.layouts.dash')
@section('edit_category')
    active
@endsection
@section('activity-title')
    edit category
@endsection
@section('content')

    <div class="container">
          <h2>Update_category</h2>
          <form action="{{ route('category_update', $categories->id) }}" method="POST">
          @csrf
            <label>category name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $categories->name }}">
            <label>Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $categories->description }}">
            <label>image</label>
            <input type="file" id="image" name="image" class="form-control" value="{{ $categories->image }}">
            <br>
            <br>
            <button type="submit" class="submit-btn">Update</button>
          </form>
    </div>

    @endsection
