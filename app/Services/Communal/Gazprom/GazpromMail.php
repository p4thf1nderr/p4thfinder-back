<?php

namespace App\Services\Communal\Gazprom;


use App\Mail\GazpromContact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class GazpromMail
{
	public function write($gas, $address = '') 
	{
		$address = env('ADDRESS');
		Mail::to(env('MAIL_GAZPROM'))->send(new GazpromContact($gas, $address));
	}
}