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
        return view('articles.search', compact('categories','searchWord','categoryId'));
    }

    public function search(Request $request)
    {
        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord');
        $categoryId = $request->input('categoryId');

        $query = Article::query();
        
        //HERO名が入力された場合、articlesテーブルから一致するHEROを$queryに代入
        if (isset($searchWord)) {
            $query->where('title', 'like', '%' . self::escapeLike($searchWord) . '%')
                ->orWhere('summary', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが入力された場合、categoriesテーブルから一致するHEROを$queryに代入
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }
        //$queryをcategory_idの昇順に並び替えて$productsに代入
        $products = $query->orderBy('title', 'asc')->paginate(9);

        $category = new Category;
        $categories = $category->getLists();

        return view('articles.search', compact('products','categories','searchWord','categoryId'));
    }

    public static function escapeLike($str){
        //「\\」「%」「_」などの記号を文字としてエスケープさせる
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

}
