<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->only('title'), [
            'title' => 'required|string'
        ]);

        if ($validator->fails()) return back()->withErrors($validator);

        Category::create($validator->validated());

        return back()->with('message', 'Категория успешно создана');
    }

    public function edit(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make($request->only('title'), [
            'title' => 'required|string'
        ]);

        if ($validator->fails()) return back()->withErrors($validator);

        $category = Category::findOrFail($id);

        $category->update($validator->validated());

        return back()->with('message', 'Категория успешно обновлена');
    }

    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        Category::findOrFail($id)->delete();
        return back()->with('message', 'Категория успешно удалена');
    }
}
