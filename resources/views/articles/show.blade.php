@extends('layouts.app')
@section('title', 'HERO詳細')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-check-square mr-1"></i>HERO詳細</h3>
                </div>
                    <div class="card-body col-md-8 mx-auto">
                        <div class="row">
                            <p class="col-md-4 text-md-right">名前</p>
                            <p class="col-md-6">{{ $article->title }}</p>
                        </div>
                        <div class="row">
                            <p class="col-md-4 text-md-right">カテゴリー</p>
                            <p class="col-md-6">{{ $article->category->name }}</p>
                        </div>
                        <div class="row">
                            <p class="col-md-4 text-md-right">推しポイント</p>
                            <p class="col-md-6">{{ $article->summary }}</p>
                        </div>
                        <div class="row">
                            <img class="d-block mx-auto img-fluid w-50" src="{{ $article->image }}">
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a class='btn btn-secondary text-white col-md-3 py-2 mx-1 mb-4' href="{{ route('index')}}">戻る</a>
                            @if(Auth::id() == $article->user->id) 
                            <a href="{{ route('articles.edit', ['id' => $article->id]) }}" class="btn btn-success text-white col-md-3 py-2 mx-1 mb-4">
                                編集する
                            </a> 
                            <div class="col-md-3 p-0 row mx-1">
                                <form method="" action="{{ route('articles.delete', ['id' => $article->id]) }}">
                                    <button type="submit" class="btn btn-danger text-white col-12 py-2 mb-4" id="delete-btn">
                                        削除する
                                    </button>                                             
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="show-comment mt-5">
        <p class="h3 text-center my-3"><i class="far fa-comments mr-1"></i>コメント（ @php echo $comments->count()@endphp 件）</p>
        @if ($comments->count())
            <div class="comment-items">
                @foreach ($article->comments as $comment)
                    <dl class="row p-3 bg-white my-4 mx-3 align-items-center">
                        <dt>{{ $comment->user->name }}</dt>
                        <dd class="ml-4 mb-0">{{ $comment->comment }}</dd>
                        @if(Auth::id() === $comment->user->id)
                        <form name="deleteform" method="POST" action="{{ route('comment.destroy', $comment->id) }}" class="ml-auto">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <button type="submit" class="ml-auto delete-comment" onClick="return CheckComment()"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        @endif
                    </dl>
                @endforeach
            </div>
            @else
            <div class="text-center mt-4">
                <p class="mb-4">コメントはありません。</p>
            </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <form method="POST" action="{{ route('comment.store', ['article' => $article])}}">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <div class="form-group w-75 mx-auto  mb-4">
                        <label for="comment">コメント<span class="text-danger">(※)</span></label>
                        <textarea name="comment" id="comment" cols="30" rows="10" class="form-control @error('comment') is-invalid @enderror">{{ old('comment') }}</textarea>
                        <p>150字以内で入力してください</p>
                        @error('comment')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection