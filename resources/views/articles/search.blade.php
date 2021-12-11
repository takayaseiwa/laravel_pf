@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-search"></i> HERO検索</h3>
                </div>
                <form method="GET" action="{{ route('article.search') }}">
                    @csrf
                    <div class="card-body col-md-9 mx-auto">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="searchWord">フリーワード</label>
                                <input type="text" class="form-control" name="searchWord" value="{{ $searchWord, old('searchWord') }}" autofocus>                            </div>
                            <div class="form-group mb-4">
                                <p>カテゴリー</p>
                                <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                                    <option value="">未選択</option>
                                    @foreach($categories as $id => $name)
                                        <option value="{{ $id }}">
                                            {{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-fix justify-content-center" style="text-align:center;">
                            <button class="btn btn-primary text-white col-md-3 py-2 mx-1 mb-4">検索する</button>
                        </div>
                    </div>
                </form>
                @if(!empty($products))
                    <p>全{{ $products->count() }}件</p>
                    <div class="row">
                        @foreach($products as $product)
                        <div class="row_index">
                            <img class="book-image" src="{{asset('storage/images/'.$product->image)}}">
                            <div class="card-body">
                                <p class="card-text">{{ $product->title }}</p>
                                <p class="card-text post-category">{{ $product->category->name }}</p>
                                <div class="justify-content-between align-items-center">
                                    <div class="btn-Link">
                                        <a class="btn btn-success review-show" href="{{ route('articles.show',$product) }}">詳細を見る</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                    {{ $products->appends(request()->input())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
