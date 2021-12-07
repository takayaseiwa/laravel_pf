@extends('layouts.app')
@section('title', 'HERO投稿')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-crown mr-2"></i>HERO投稿</h3>
                </div>
                <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body col-md-8 mx-auto">
                        <div class="form-group row">
                            <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                        </div>                            
                        <div class="form-group mb-4">
                            <label>名前<span class="text-danger">(※)</span></label>
                            <input class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="名前" autofocus />
                            <small class="form-text text-muted">50文字以内で入力してください。</small>
                            @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                            @enderror                     
                        </div>
                        <div class="form-group mb-4">
                            <p>カテゴリー<span class="text-danger">(※)</span></p>
                            <select id="category_id" name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $category->id }}" {{old('category_id')==$category->id ? 'selected' : ''}}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label>推しポイント<span class="text-danger">(※)</span></label>
                            <textarea class="form-control" placeholder="推しポイント" id="summary" rows="6" name="summary"></textarea>
                            <small class="form-text text-muted">150文字以上で入力してください。</small>
                            @error('summary')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>画像<span class="text-danger">(※)</span></label>
                            <div class="form-group mb-4">
                                <input id="file" type="file" name="image">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror       
                            </div>                
                        </div>                        
                        <button class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5" type="submit">
                            投稿する
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4' href="{{ route('index')}}">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection