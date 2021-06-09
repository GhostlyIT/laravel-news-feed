<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->only(['title', 'text', 'category_id']), [
            'title' => 'required|max:255|string',
            'text' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        if ($validator->fails()) return back()->withErrors($validator);

        News::create($validator->validated());

        return back()->with('message', 'Новость успешно создана');
    }

    public function edit(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->only(['title', 'text', 'category_id']), [
            'title' => 'required|max:255|string',
            'text' => 'required|string',
            'category_id' => 'required|integer'
        ]);

        if ($validator->fails()) return back()->withErrors($validator);

        $news = News::findOrFail($id);
        $news->update($validator->validated());

        return back()->with('message', 'Новость успешно обновлена');
    }

    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        News::findOrFail($id)->delete();
        return back()->with('message', 'Новость успешно удалена');
    }

    public function show(int $id)
    {
        $news = News::find($id);

        if ($news === NULL) abort(404);

        return view('news', [
            'news' => $news,
            'category' => $news->category
        ]);
    }
}
