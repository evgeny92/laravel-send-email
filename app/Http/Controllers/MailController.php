<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MailRequest;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send(MailRequest $request)
    {
        // Data to display in the email
        //
        $data = [
            'subject' => $request->subject,
            'name'    => $request->name,
            'comment' => $request->comment
        ];

        // 'email.content' => Email template located in views
        //
        Mail::send('email.content', $data, function ($message) use ($request) {
            $message->from('no-reply@example.com', 'No reply'); // Sender
            $message->to($request->email)->subject('Comment received'); // Receiver
        });

        return 'Your message has been sent successfully';
    }
}
