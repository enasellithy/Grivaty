<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mailget()
    {
        return view('mail');
    }

    public function mailpost(Request $request)
    {
        $all = $request->all();
        Mail::queue('emails.mailtemplate',compact('all'),function($message) use ($all){
        		$message->from($all['sender_name'])
        		        ->to($all['recipient_email'])
        		        ->subject($all['subject']);
        	});
    }
}
