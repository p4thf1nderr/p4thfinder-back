<?php

namespace App\Services\Communal\Gazprom;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class GazpromMail
{
	public function write($gas, $address = '') 
	{
		$address = env('ADDRESS');
		//dd($text, $type, $address);
		Mail::to(env('MAIL_GAZPROM'))->send(new Contact($gas, $address));
	}
}