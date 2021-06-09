@extends('layouts.app')
@section('title', 'Laravel News Feed')

@section('content')
    <div class="text-center">
        <h3>Laravel News Feed</h3>
    </div>

    <div class="d-flex justify-content-center mt-3">
        <a href="/" class="btn btn-primary me-5">На главную</a>
    </div>

    <hr>

    <div class="d-flex justify-content-center flex-column">
        <div class="text-center">
            <h3>{{ $news->title }}</h3>
            <small>{{ $category->title }}</small>
        </div>
        <p>{{ $news->text }}</p>
    </div>

@endsection
