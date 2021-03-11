<div class="list-group"> 
    <a href="{{route('home')}}" 
     class="{{url()->current()==route('home')? 'list-group-item active': 'list-group-item'}}">
     <i class="fas fa-home pr-2"></i><span>一覧表示</span>
    </a>
    <a href="{{route('post.create')}}" 
     class="{{url()->current()==route('post.create')? 'list-group-item active': 'list-group-item'}}">
     <i class="fas fa-pen-nib pr-2"></i><span>新規投稿</span>
    </a>
    <a href="{{route('home.mypost', auth()->user()->id)}}" 
    class="{{url()->current()==route('home.mypost', auth()->user()->id)? 'list-group-item active': 'list-group-item'}}">
    <i class="fas fa-pen-nib pr-2"></i><span>自分の投稿</span>
   </a>
   <a href="{{route('home.mycomment', auth()->user()->id)}}" 
        class="{{url()->current()==route('home.mycomment', auth()->user()->id)? 'list-group-item active': 'list-group-item'}}">
        <i class="fas fa-pen-nib pr-2"></i><span>コメントした投稿</span>
    </a>
</div>