@extends('layouts.app')
@section('title', 'Manager | Редактировать категорию')

@section('content')
    <div class="text-center">
        <h3> {{ isset($category) ? 'Редактировать категорию' : 'Создать категорию' }}</h3>

        @if (\Session::has('message'))
            <div class="alert alert-success">
                <p class="mb-0">{!! \Session::get('message') !!}</p>
            </div>
        @endif
    </div>

    @include('manager.parts.menu')

    <hr>

    <form action="{{ isset($category) ? route('category.edit', $category->id) : route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="mb-3">Название категории</label>
            <input type="text" class="form-control" name="title" placeholder="Название категории" value="{{ isset($category) ? $category->title : '' }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mt-3">
            <button type="submit" class="btn btn-success">{{ isset($category) ? 'Сохранить' : 'Добавить'}}</button>
        </div>
    </form>
@endsection
