<?php

namespace Petebowen\Formguard\Checks;

class CheckForHoneyTrap
{

	protected $input;
	protected $score = 0;
	protected $honeyTrap = ['text1', 'text2'];

	public function __construct($input = [])
	{
		$this->input = $input;
	}

	public function score()
	{
		foreach ($this->honeyTrap as $field) {

			if (! array_key_exists($field, $this->input)) {
				
				continue;
			}
			
				
			if ($this->input[$field] != '') {
					
				$this->score ++;
			}
			
		}
  
		return $this->score;
	}
}