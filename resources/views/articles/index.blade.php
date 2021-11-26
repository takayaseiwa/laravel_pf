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
                                    <i class="fas fa-user-edit mr-2">{{$article->user->name}}</i>
                                </div>
                            </div>
                            <div class="card-body">
                                <img src="{{ asset('storage/' .$article->image)}}">
                                <!-- @if(!empty($review->image))
                                    <img class="book-image" src="{{ $article->image }}">
                                    </img>
                                @else
                                    <img class="book-image" src="{{ asset('images/book.png') }}">
                                    </img>
                                @endif -->
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
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 mx-auto d-flex justify-content-center">
                {{ $articles->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
