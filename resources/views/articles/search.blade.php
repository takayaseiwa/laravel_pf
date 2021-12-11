@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-search"></i> HERO検索</h3>
                </div>
                <form method="POST" action="{{ route('article.search') }}">
                    @csrf
                    <div class="card-body col-md-9 mx-auto">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="searchWord">フリーワード</label>
                                <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">                            </div>
                            <div class="form-group mb-4">
                                <p>カテゴリー</p>
                                <select name="categoryId" class="form-control">
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
            </div>
        </div>
    </div>
</div>
@endsection
