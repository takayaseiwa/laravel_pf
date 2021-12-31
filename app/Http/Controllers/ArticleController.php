<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DBからデータを取得してorderByで並び替える
        $articles = Article::with('user')->orderBy('created_at','desc')->paginate(6);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        $categories = $category->getLists();
        return view('articles.create',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article;
        $article->fill($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            //バケットのmyprefixフォルダへアップロードする
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            //アップロードした画像のパスを取得
            $article->image = Storage::disk('s3')->url($path);
        }

        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $comments = $article->comments;
        return view('articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $category = new Category;
        $categories = $category->getLists();
        return view('articles.edit', compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        //投稿者以外の更新を防ぐ
        if($article->user_id !== Auth::id()){
            return redirect()->route('index');
        }
        $article->fill($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            //バケットのmyprefixフォルダへアップロードする
            $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
            //アップロードした画像のパスを取得
            $article->image = Storage::disk('s3')->url($path);
        }

        $article->user_id = $request->user()->id;
        $article->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        //投稿者以外の削除を防ぐ
        if($article->user_id !== Auth::id()){
            return redirect()->route('index');
        }
        $article->delete();
        return redirect()->route('index');
    }
}
