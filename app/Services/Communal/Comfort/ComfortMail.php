<?php

namespace App\Services\Communal\Comfort;

use App\Mail\ComfortContact;
use Illuminate\Support\Facades\Mail;

class ComfortMail
{
	public function write($data, $address = '') 
	{

		$hot = null;
		$cold = null;
		$address = env('ADDRESS');

		foreach ($data as $value) {
			if ($value->type == "HOT") {
				$hot = $value->text;
			} elseif ($value->type == "COL") {
				$cold = $value->text;
			}
		}
		//dd($text, $type, $address);
		Mail::to(env('MAIL_COMFORT'))->send(new ComfortContact($cold, $hot, $address));
	}
}