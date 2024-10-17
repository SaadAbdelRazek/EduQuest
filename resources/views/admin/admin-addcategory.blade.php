@extends('admin.layouts.dash')
@section('categories')
    active
@endsection
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
            <label for="name">category name</label>
            <input type="text" id="name" name="name" class="form-control"  required>
        </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="file-upload" class="custom-file-upload">
                <i class="fas fa-upload"></i> Upload Image
            </label>
<<<<<<< HEAD
            <input id="file-upload" type="file" accept="image/*" name="image" />
=======
            <input id="file-upload" name="image" type="file" accept="image/*" />
>>>>>>> 20366e91557f8d62361d666e76c22a46e7b0f4af
        </div>

        <!-- حاوية لعرض الصورة المختارة -->


            <div id="image-preview" style="margin-top: 10px; width:200px;">
                <img id="preview-img" src="" alt="Preview" style="max-width: 100%; display: none;">
            </div>



        <div class="form-actions">
            <button type="submit" class="submit-btn">Add</button>
            <button type="reset" id="reset-btn" class="reset-btn">reset</button>
        </div>



          </form>
        </div>
      </div>
    </div>
@endsection
