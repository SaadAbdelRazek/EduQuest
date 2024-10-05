@extends('website.layouts.app')
@section('content')
<div>
    <div>
        @foreach($categories as $category)
            <div>
                <div>
                    <img src="{{ asset('public/images/' . $category->image) }}" alt="{{ $category->name }}">
                    <div>
                        <h2><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></h2>
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
