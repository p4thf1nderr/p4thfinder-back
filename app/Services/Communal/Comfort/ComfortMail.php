<?php

namespace App\Services\Communal\Comfort;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ComfortMail
{
	public function write($text, $type, $address = '') 
	{
		//dd($text, $type, $address);
		Mail::to(env('MAIL_COMFORT'))->send(new Contact($text, $type, $address));
	}
}