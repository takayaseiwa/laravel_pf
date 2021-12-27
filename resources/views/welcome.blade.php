@extends('layouts.app')

@section('content')
<header class="header">
    <div class="jumbotron">
        <div class="container-fluid mb-3" style="background-color:rgba(255,255,255,0.8);">
            <div class="container">
                <div class="d-md-flex align-items-center">
                    <div class="pt-3 col-md-8">
                        <h1>YOUR-HERO</h1>
                        <p class="text-muted">あなたにとってのHEROは誰ですか？</p>
                        <p class="text-muted">自分に影響を与えたHEROを共有しよう！</p>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-5">
                    <a href="{{ route('login.guest') }}" class="btn btn-success btn-block btn-lg mb-3 font-weight-bold p-3"
                        role="button" aria-pressed="true">
                        ゲストログイン
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-block btn-lg font-weight-bold p-3" role="button"
                        aria-pressed="true"><i class="fas fa-sign-in-alt mr-1"></i>ログイン
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-block btn-lg font-weight-bold p-3" role="button"
                        aria-pressed="true"><i class="fas fa-user-edit mr-1"></i>会員登録
                    </a>
                </div>
            </div>
        </div>
    </div>
    <main>
        <section class="py-5 bg-lightblue">
            <div class="container feature my-5">
                <h2 class="h1 font-weight-lighter text-center pb-5">About</h2>
                <div class="row mb-4">
                    <div class="col-md-7 mb-4 mb-md-0">
                        <img src="{{ asset('img/Powerful-pana.png')}}" alt=""  border="0" class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <h3 class="pb-3 d-flex align-items-center"><span class="display-4">01</span>HERO投稿</h3>
                        <p>あなたのお気に入りのHEROを投稿しよう！詳細・編集・削除はいつでも行えます</p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-7 mb-4 mb-md-0 order-md-2">
                        <img src="{{ asset('img/Superhero-amico.png')}}" alt="" border="0" class="img-fluid">
                    </div>
                    <div class="col-md-5 order-md-1">
                        <h3 class="pb-3 d-flex align-items-center"><span class="display-4">02</span>HERO検索</h3>
                        <p>フリーワードやカテゴリーを選択することにより、登録されたHEROを検索できます！ 新たなHEROが見つかるかも！
                        </p>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-7 mb-4 mb-md-0">
                        <img src="{{ asset('img/Superhero-pana.png')}}" alt=""  border="0" class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <h3 class="pb-3 d-flex align-items-center"><span class="display-4">03</span>コメント機能</h3>
                        <p>気になったHEROにはどんどんコメントしていきましょう！仲間の輪が広がるともっと楽しいですよ！</p>
                    </div>
                </div>
                <div class="container">
                    <h3 class="text-center mb-3">あなたも、自分にとってのHEROを共有してみませんか？</h3>
                    <div class="row mt-2">
                        <div class="col-md-5">
                            <a href="{{ route('login.guest') }}" class="btn btn-success btn-block btn-lg mb-3 font-weight-bold p-3"
                                role="button" aria-pressed="true">
                                ゲストログイン
                            </a>
                        </div>
                    <div class="col-md-3">
                        <a href="{{ route('login') }}" class="btn btn-secondary btn-block btn-lg font-weight-bold p-3" role="button"
                            aria-pressed="true"><i class="fas fa-sign-in-alt mr-1"></i>ログイン
                        </a>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-block btn-lg font-weight-bold p-3" role="button"
                            aria-pressed="true"><i class="fas fa-user-edit mr-1"></i>会員登録
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</header>


@endsection
