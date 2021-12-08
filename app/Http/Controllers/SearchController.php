<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class SearchController extends Controller
{
    public function show()
    {
        $category = new Category;
        $categories = $category->getLists();
        return view('articles.search', compact('article','categories'));
    }
}
