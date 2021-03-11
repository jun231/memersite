<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // コメント保存
    public function store(Request $request){
        $inputs=request()->validate([
            'body'=>'required|max:255'
        ]);

        $comment=Comment::create([
            'body'=>$inputs['body'],
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->post_id
        ]);

        $comment->save();

        return back();

    }
}
