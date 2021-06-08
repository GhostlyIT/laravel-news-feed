@extends('layouts.app')
@section('title', isset($news) ? 'Редактировать новость' : 'Создать новость')

@section('content')
    <div class="text-center">
        <h3> {{ isset($news) ? 'Редактировать новость' : 'Создать новость'}}</h3>
    </div>
    @if (\Session::has('message'))
        <div class="alert alert-success">
            <p class="mb-0">{!! \Session::get('message') !!}</p>
        </div>
    @endif

    @include('manager.parts.menu')

    <hr>

    <form action="{{ isset($news) ? route('news.edit', $news->id) : route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Название статьи</label>
            <input type="text" class="form-control" name="title" placeholder="Название статьи" value="{{ isset($news) ? $news->title : '' }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="text">Текст</label>
            <textarea type="text" class="form-control" name="text">{{ isset($news) ? $news->text : '' }}</textarea>
            @error('text')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="category_id">Категория</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($news) && $category->id === $news->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">{{ isset($news) ? 'Сохранить' : 'Добавить'}}</button>
        </div>
    </form>
@endsection
