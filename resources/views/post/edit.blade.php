@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 mt-6">
        <div class="card-body">
            <h1 class="mt4">投稿編集</h1>
            {{-- エラー表示 --}}
            @if($errors->any())
            <div class="col-10 mt-6 alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    @if(empty($errors->first('image')))
                    <li>画像ファイルがあれば、再度、選択してください</li>
                    @endif
                </ul>
            </div>
            @endif

            {{-- メッセージ表示 --}}
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            {{-- フォーム --}}
            <form method="post" action="{{route('post.update', $post)}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">件名</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
                </div>

                <div class="form-group">
                    <div>
                        @if($post->image)
                        <img src="{{asset('storage/images/'.$post->image)}}" style="height:300px;">
                        @endif
                    </div>
                    <label for="image">画像 </label>
                    <div class="col-md-6">
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <button type=”submit” class="btn btn-success">送信する </button>
            </form>
        </div>
    </div>
</div>
@endsection