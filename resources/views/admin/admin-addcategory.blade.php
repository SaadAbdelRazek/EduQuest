@extends('admin.layouts.dash')

@section('content')
@php
        // Define the variable to hide the div in the layout
        $hideSpecialDiv = true;
    @endphp
    <div class="container">
      <div class="left__container">
        <div class="form__container">
          <h2>Add_category</h2>
          <form action="{{ route('category_data') }}" method="POST" enctype= multipart/form-data>
          @csrf
          <div class="form-group">
            <label for="question">category name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter category name" required>
        </div>
          <div class="form-group">
            <label for="question">Description</label>
            <input type="text" id="description" name="description" class="form-control" placeholder="Enter category description" required>
        </div>
          <div class="form-group">
            <label for="question">image</label>
            <input type="file"  id="image" name="image" class="" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>



          </form>
        </div>
      </div>
    </div>
@endsection
