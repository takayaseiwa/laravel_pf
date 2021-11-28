@extends('layouts.app')

@section('content')
<div class="album bg-light">
    <div class="container">
            <<div class="row top_row">
                @foreach ($articles as $article)
                    <div>
                        <img class="book-image" src="{{ Storage::url($article->image) }}" width="100px">
                        <div class="card-body">
                                    <div class="row">
                                    <img src="{{ asset('storage/' .$article->image)}}">
                                    </div>
                                    <div class="row">
                                        <p class="col-md-4 text-md-right">名前</p>
                                        <p class="col-md-6">{{ $article->title }}</p>
                                    </div>
                                    <div class="row">
                                        <p class="col-md-4 text-md-right">カテゴリー</p>
                                        <p class="col-md-6">{{ $article->category->name }}</p>
                                    </div>
                                    <form>
                                        <div class="row">
                                            <a href="http://blog.livedoor.jp/kinisoku/" class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                        </div>
                                    </form>
                                </div>
                    </div>
                @endforeach
            <</div>
    </div>
</div>
<div class="col-md-4 mx-auto d-flex justify-content-center">
{{ $articles->links('pagination::bootstrap-4') }}
</div>
@endsection
