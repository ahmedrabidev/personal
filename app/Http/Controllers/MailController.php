<?php

namespace App\Http\Controllers;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

    public function sendEmail() {

        $email = "rabidev2020@gmail.com";
        $title = "This is Title Of Message";
        $text = "Welcome  Ahmed Rabi , Now You Are User In Our Website , welcome with u our website";
        Mail::send(array('html' => 'mail.mail'), array('text' => $text,'title'=>$title), function($message) use ($email, $title)
        {
            $message->to($email)->subject($title);
        });
    }

}
