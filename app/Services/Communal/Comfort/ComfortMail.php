<?php

namespace App\Services\Communal\Comfort;

use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class ComfortMail
{
	public function write($data, $address = '') 
	{

		$hot = null;
		$cold = null;

		foreach ($data as $value) {
			if ($value->type == "HOT") {
				$hot = $value->text;
			} elseif ($value->type == "COL") {
				$cold = $value->text;
			}
		}
		//dd($text, $type, $address);
		Mail::to(env('MAIL_COMFORT'))->send(new Contact($cold, $hot, $type, $address));
	}
}