@php
    $categories = \App\Category::orderBy('title')->get();
@endphp
<h5 class="d-flex justify-content-center mt-5">Категории</h5>
<div class="d-flex justify-content-center mt-3">
    <a href="/" class="btn btn-primary me-5">Сбросить фильтр</a>
    @foreach($categories as $category)
        <a href="/?category={{ $category->id }}" class="btn btn-secondary me-5">{{ $category->title }}</a>
    @endforeach
</div>
