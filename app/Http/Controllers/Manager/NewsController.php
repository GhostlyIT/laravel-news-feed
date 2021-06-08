<?php

namespace App\Http\Controllers\Manager;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('manager.news', [
            'news' => News::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function createNewsPage()
    {
        return view('manager.create-news', [
            'categories' => Category::orderBy('title')->get()
        ]);
    }

    public function edit(int $id)
    {
        return view('manager.create-news', [
            'news' => News::findOrFail($id),
            'categories' => Category::orderBy('title')->get()
        ]);
    }
}
