<?php

namespace App\Mail;


class Message
{
	
	function __construct($text, $type)
	{
		$this->text    = $text;
		$this->type    = $type;
	}
}