@extends('layouts.app')

@section('content')
<div class="album bg-light">
    <div class="container">
            <<div class="row top_row">
                @foreach ($articles as $article)
                    <div>
                        <img class="book-image" src="{{asset('storage/images/'.$article->image)}}">
                        <div class="card-body">
                                    <p class="card-text">名前</p>
                                    <p class="card-text">{{ $article->title }}</p>
                                    <p class="card-text">カテゴリー</p>
                                    <p class="card-text">{{ $article->category->name }}</p>
                                    <div class="justify-content-between align-items-center">
                                        <div class="btn-Link">
                                            <a href="http://blog.livedoor.jp/kinisoku/" class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                        </div>
                                    </div>
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
