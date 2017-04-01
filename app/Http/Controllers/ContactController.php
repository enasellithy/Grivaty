<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
//use Mail;
//use App\Mail\WelcomeToLaracasts;
use Auth;
use App\Mail;

class ContactController extends Controller
{
    public function form()
    {
        return view('home');
    }

    public function formpost(Request $request)
    {
        $this->Validate($request,[ 
            'name' => 'required',
            'email'  => 'required',
            'message' => 'required',
            'phone' => 'required'
            ]);
        $mail = new Mail();
        $mail->name = $request['name'];
        $mail->email = $request['email'];
        $mail->message = $request['message'];
        $mail->phone = $request['phone'];
        $mail->save();
        Session::flash('success','Message Send');
        return redirect()->back();
    }
    
}
