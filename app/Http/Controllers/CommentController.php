<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        //フォームから送られたコメントをDBに格納する
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::id();
        $comment->save();

        return back();
    }

    public function destroy(Request $request, Comment $comment)
    {
        $article = Article::find($request->article_id);
        $comment->delete();
        return redirect(route('articles.show', ['article' => $article]));
    }
}
