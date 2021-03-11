<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class ContactController extends Controller
{
    // お問い合わせ作成
    public function create(){
        return view('contact.create');
    }

    // お問い合わせ保存
    public function store(Request $request){
        $contact=new Contact();

        $inputs=request()->validate([
            'title'=>'required|max:255',
            'body'=>'required',
            'email'=>'required'
        ]);

        $contact->create($inputs);
        Mail::to(config('mail.admin'))->send(new ContactForm($inputs));
        Mail::to($inputs['email'])->send(new ContactForm($inputs));

        return back()->with('message', 'メールを送信しました');

    }
}
