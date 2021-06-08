<?php

namespace App\Http\Controllers\Manager;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        return view('manager.categories', [
            'categories' => Category::all()
        ]);
    }

    public function createCategoryPage()
    {
        return view('manager.create-category');
    }

    public function edit(int $id)
    {
        return view('manager.create-category', [
            'category' => Category::findOrFail($id)
        ]);
    }
}
