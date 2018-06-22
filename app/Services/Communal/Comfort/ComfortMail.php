<?php

namespace App\Services\Communal\Comfort;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ComfortMail
{
	public function write($message, $type = null, $address = env('ADDRESS')) 
	{
		Mail::to(env('MAIL_COMFORT'))->send(new Contact($message, WATER, $address));
	}
}