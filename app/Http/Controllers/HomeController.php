<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // 投稿一覧表示
    public function index()
    {
        $posts=Post::orderBy('id', 'desc')->get();
        $user=auth()->user();
        return view('home', compact('posts', 'user'));
    }

    // 自分の投稿のみ表示
    public function mypost(){
        $user=auth()->user()->id;
        $post=Post::where('user_id', $user)->first();

        if($post==null){
            return redirect()->route('home')->with('message', 'まだ投稿はありません');
        }else{
            $posts=Post::orderBy('id', 'desc')->where('user_id', $user)->get();
            return view('mypost', compact('posts'));
        }
    }

    // 自分がコメントした投稿のみ表示
    public function mycomment(){
        $user=auth()->user()->id;
        $comment=Comment::where('user_id', $user)->first();
        if($comment==null){
            return redirect()->route('home')->with('message', 'まだコメントはありません');
        }else{
            $comments=Comment::orderBy('id', 'desc')->where('user_id', $user)->get();
            return view('mycomment', compact('comments'));
        }  
    }
}
