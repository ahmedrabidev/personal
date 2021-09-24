<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\This;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
    public function sendMessage(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email'],
            'subject' => ['required', 'string', 'min:2'],
            'message' => ['required'],
        ],
        [
            'name.required'=>trans('front.name_required'),
            'name.string'=>trans('front.name_string'),
            'name.min'=>trans('front.name_min'),
            'email.required'=>trans('front.email_required'),
            'email.string' => trans('front.email_string'),
            'email.email'=>trans('front.email_email'),
            'subject.required'=>trans('front.subject_required'),
            'subject.string'=>trans('front.subject_string'),
            'subject.min'=>trans('front.subject_min'),
            'message.required' => trans('front.message_required'),
        ]);
        $inputs = $request->all();
        $receiver = "rabidev2020@gmail.com";
        $sender = $inputs['email'];
        $title = $inputs['subject'];
        $text = $inputs['message'];
        $name = $inputs['name'];
        Mail::send(array('html' => 'front.mail'), array('text' => $text,'title'=>$title,'name'=>$name,'sender'=>$sender), function($message) use ($receiver,$sender, $title)
        {
            $message->from($sender);
            $message->to($receiver)->subject($title);
        });
        return response()->json(['state'=>'success']);
    }
    public function thankuContact()
    {
        return view('front.thanku');
    }
    public function testMail()
    {
        return view('front.mail');
    }
}
