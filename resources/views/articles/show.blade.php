@extends('layouts.app')
@section('title', 'HERO詳細')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-file-code mr-2"></i>HERO詳細</h3>
                </div>
                    <div class="card-body col-md-8 mx-auto">
                        <div class="form-group mb-4">
                            <label>{{ $article->title }}</label>
                        </div>
                        <div class="form-group mb-4">
                            <p>{{ $article->category->name }}</p>
                        </div>
                        <div class="form-group mb-4">
                            <label>{{ $article->summary }}</label>
                        </div>
                        <div class="form-group mb-4">
                        <img class="book-image" src="{{asset('storage/images/'.$article->image)}}">
                        </div>
                        @if(Auth::id() == $article->user->id) 
                        <a href="{{ route('articles.edit', ['id' => $article->id]) }}" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            編集する
                        </a> 
                        <form method="" action="{{ route('articles.delete', ['id' => $article->id]) }}">
                        <button type="submit" class="btn btn-danger text-white col-4 py-2 mb-4" id="delete-btn">
                            削除する
                        </button>                                             
                        @endif
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4' href="{{ route('index')}}">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection