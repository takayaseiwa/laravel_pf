@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6">
                        <div class="card mb-5">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="font-weight-bold">
                                    <i class="fas fa-user-edit mr-2"></i>
                                </div>
                                @if(Auth::id() == $article->user->id)
                                    <div class="d-flex justify-content-around">
                                        <a href="{{ route('articles.edit', ['id' => $article->id]) }}" class="btn btn-secondary rounded-pill">
                                            <i class="far fa-edit mr-1"></i>編集
                                        </a>
                                        <form method="" action="{{ route('articles.delete', ['id' => $article->id]) }}">
                                        <button type="submit" class="btn btn-danger rounded-pill">
                                            <i class="far fa-trash-alt"></i>削除
                                        </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                @if(!empty($review->image))
                                    <img class="book-image" src="{{ $article->image }}">
                                    </img>
                                @else
                                    <img class="book-image" src="{{ asset('images/book.png') }}">
                                    </img>
                                @endif
                                <div class="row">
                                    <p class="col-md-4 text-md-right">名前</p>
                                    <p class="col-md-6">名前</p>
                                </div>
                                <div class="row">
                                    <p class="col-md-4 text-md-right">カテゴリー</p>
                                    <p class="col-md-6">カテゴリー</p>
                                </div>
                                <form>
                                    <div class="row">
                                        <a href="{{ route('articles.show', ['article' => $article]) }}" class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 mx-auto d-flex justify-content-center">
                {{ $articles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
