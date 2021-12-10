<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $category = new Category;
        $categories = $category->getLists();
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');
        return view('articles.search', compact('article','categories','searchWord','categoryId'));
    }

    public function search(Request $request)
    {
        dd($request->search);
    }

}
