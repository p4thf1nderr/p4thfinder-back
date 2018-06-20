<?php

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;


class Servcie
{
    public function send($message)
    {
        Mail::to(env('MAIL_RECIPIENT'))->send(new Contact($name, $email, $text));
    }
}


