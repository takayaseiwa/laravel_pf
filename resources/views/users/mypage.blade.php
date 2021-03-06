@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>マイページ</h3>
                </div>
                <div class="card-body col-md-8 mx-auto">
                    <div class="card-body">
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">名前</p>
                            <p class="col-md-6">{{ $auth->name }}</p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">メールアドレス</p>
                            <p class="col-md-6">
                                {{ $auth->email }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            @unless(Auth::id() == 1)
                            <a class='btn btn-secondary text-white col-md-3 py-2 mx-1 mb-2' href="{{ route('users.edit', Auth::user()) }}">編集する</a>
                            @endunless
                        </div>
                        <div class="d-flex justify-content-center">
                            <a class='btn btn-secondary text-white col-md-3 py-2 mx-1 mb-2' href="{{ route('index') }}">戻る</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
