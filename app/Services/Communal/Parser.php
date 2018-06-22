<?php

namespace App\Services\Communal;

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

		$cold = null;

		$hot = null;

		$gas = null;

		foreach ($counters as $counter => $value) {
				if (substr($value, 0, 2) == 'GAS') {
								$gas = $value, 3)
				}			
		}

		$rest = substr($counter, 0, 2);    // возвращает "bcdef"
	}
}