<?php

namespace App\Services\Communal\Comfort;

use App\Mail\Contact;
use App\Services\Communal\Comfort\ComfortMail;
use App\Services\Communal\Contracts\MailManager;
use Illuminate\Support\Facades\Mail;

class ComfortManager extends MailManager
{
	public function make()
	{
		return new ComfortMail();
	}	
}