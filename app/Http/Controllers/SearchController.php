<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');

        $query = Article::query();
        
        //フリーワード検索
        if (isset($searchWord)) {
            $query->where('title', 'like', '%' . self::escapeLike($searchWord) . '%')
                ->orWhere('summary', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリー検索
        if (isset($categoryId)) {
            $query->where('category_id' , $categoryId);
        }

        $products = $query->orderBy('title' , 'asc')->paginate(9);

        $category = new Category;
        $categories = $category->getLists();

        return view('articles.search', compact('article','categories','searchWord','categoryId'));
    }

    public static function escapeLike($str){
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

}
