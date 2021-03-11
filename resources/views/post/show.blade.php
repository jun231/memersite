@extends('layouts.app')
@section('content')

<div class="card mb-4">
    {{-- タイトル部分 --}}
    <div class="card-header">
            <div class="text-muted small"> 
                @if($post->user->name??'')
                {{$post->user->name}} 
                @else
                匿名
                @endif
            </div>
        <h4>{{ $post->title }}</h4>
        
        <span class="ml-auto">
            <a href="{{route('post.edit', $post)}}">
                <button class="btn btn-primary">編集</button>
            </a>
        </span>

        <span class="ml-2">
            <form method="post" action="{{route('post.destroy', $post)}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onClick="return confirm('本当に削除しますか？');">削除</button>
            </form>
        </span>

    </div>
    {{-- 投稿本文 --}}
    <div class="card-body">
        <div>
            @if($post->image)
            <img src="{{asset('storage/images/'.$post->image)}}" style="width:500px;">
            @endif
        </div>
        <p class="card-text">
            {!!$post->body!!}
        </p>
    </div>
    <div class="card-footer">
        <span class="mr-2 float-right">
            投稿日時 {{ $post->created_at->diffForHumans() }}
        </span>
    </div>
</div>

<hr>

{{-- コメント --}}
@if($post->comments)
@foreach($post->comments as $comment)
<div class="card mb-4">
    
    <div class="card-header">
        <div class="text-muted small"> 
                @if($comment->user->name??'')
                {{$comment->user->name}} 
                @else
                匿名
                @endif
        </div>
    </div>
    <div class="card-body">
        {{$comment->body}}
    </div>
    <div class="card-footer">
        <span class="mr-2 float-right">
            投稿日時 {{ $comment->created_at->diffForHumans() }}
        </span>
    </div>
</div>
@endforeach
@endif

<div class="card mb-4">
    <form method="post" action="{{route('comment.store')}}">
    @csrf
        <input type="hidden" name='post_id' value="{{$post->id}}">
        <div class="form-group">
            <textarea name="body" class="form-control" id="body" cols="30" rows="5" 
            placeholder="コメントを入力する">{{old('body')}}</textarea>
        </div>
        <div class="form-group">
        <button class="btn btn-success float-right mb-3 mr-3">コメントする</button>
        </div>
    </form>
</div> 

@endsection