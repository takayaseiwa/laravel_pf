@extends('layouts.app')
@section('title', 'HERO更新')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-pen mr-2"></i>HERO更新</h3>
                </div>
                <form method="POST" action="{{ route('articles.update', ['id' => $article->id]) }}" enctype="multipart/form-data">
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
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="1" value="1"{{ old('category_id') == '1' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="1">特撮</label>
                                </div>                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="2" value="2"{{ old('category_id') == '2' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="2">マンガ</label>
                                </div>                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="3" value="3"{{ old('category_id') == '3' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="3">スポーツ選手</label>
                                </div>                        
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="4" value="4"{{ old('category_id') == '4' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="4">歌手</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="5" value="5"{{ old('category_id') == '5' ? 'checked' : '' }} />
                                    <label class="form-check-label" for="5">その他</label>
                                </div>                                                
                                @error('category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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