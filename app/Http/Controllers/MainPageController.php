<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(Request $request)
    {
        $news = News::query();

        if ($request->has('category')) $news->where('category_id', $request->get('category'));

        $news->orderBy('created_at', 'desc');

        return view('welcome', [
            'news' => $news->get()
        ]);
    }
}
