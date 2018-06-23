<?php

namespace App\Services\Communal;

use App\Mail\Message;

class Parser
{
	private $data;

	function __construct($data)
	{
		$this->data = $data;
	}


	public function parse()
	{
		$counters = explode(', ', $this->data);

		$messages = [];

		foreach ($counters as $counter => $value) {
					$text = substr($value, 4);
					$type = substr($value, 0, 3);
					$messages[] = new Message($text, $type);
				}			

		return $messages;
	}
}