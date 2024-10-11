@extends('website.layouts.app')
@section('content')
    <div class="container">
      <div class="left__container">
        <div class="form__container">
          <h2>Add_category</h2>
          <form action="{{ route('category_data') }}" method="POST" enctype= multipart/form-data>
          @csrf
            <label>category name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter category name" required>
            <label>Description</label>
            <input type="text" id="description" name="description" class="form-control" placeholder="Enter category description" required>
            <label>image</label>
            <input type="file" id="image" name="image" class="form-control" required>
            <br>
            <br>
            <button type="submit" class="submit-btn">Add</button>
          </form>
        </div>
      </div>
    </div>
@endsection
