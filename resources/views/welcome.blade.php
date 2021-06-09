@extends('layouts.app')
@section('title', 'Laravel News Feed')

@section('content')
    <div class="text-center">
        <h3>Laravel News Feed</h3>
    </div>

    @include('parts.menu')
    <hr>

    @foreach($news as $newsElement)
        <div class="d-flex flex-column mb-5">
            <a href="{{ route('news.show', $newsElement->id) }}">
                <h3>{{ $newsElement->title }}</h3>
            </a>
            <p class="mt-3">
                {{ \Illuminate\Support\Str::limit($newsElement->text) }}
            </p>
        </div>
    @endforeach
@endsection
