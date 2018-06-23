<?php

namespace App\Services\Communal\Gazprom;

use App\Mail\Contact;
use App\Services\Communal\Contracts\MailManager;
use App\Services\Communal\Gazprom\GazpromMail;
use Illuminate\Support\Facades\Mail;

class GazpromManager extends MailManager
{
	public function make()
	{
		return new GazpromMail();
	}	
}