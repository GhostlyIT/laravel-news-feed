@extends('layouts.app')
@section('title', 'Manager | новости')

@section('content')
    <div class="text-center">
        <h3>News Feed Manager</h3>
        <p>Новости</p>
    </div>
    @if (\Session::has('message'))
        <div class="alert alert-success">
            <p class="mb-0">{!! \Session::get('message') !!}</p>
        </div>
    @endif

    @include('manager.parts.menu')

    <div class="d-flex justify-content-center mt-5">
        <a href="{{ route('manager.create.news') }}" class="btn btn-primary">Добавить новость</a>
    </div>

    <hr>

    @if (count($news) > 0)
        <div class="d-flex flex-column align-items-center">
            @foreach ($news as $newsElement)
                <div class="d-flex justify-content-between mb-3" style="width: 30%">
                    <span>{{ $newsElement->title }}</span>
                    <div class="d-flex me-5">
                        <a href="{{ route('manager.edit.news', $newsElement->id) }}" class="btn btn-primary me-2">Редактировать</a>
                        <form action="{{ route('news.delete', $newsElement->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
