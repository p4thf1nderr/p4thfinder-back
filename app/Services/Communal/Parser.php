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
					//dd(substr($value, 0, 3));
				if (substr($value, 0, 3) == 'GAS') {
								$gas = substr($value, 4);
				}			
		}

		return $gas;
	}
}