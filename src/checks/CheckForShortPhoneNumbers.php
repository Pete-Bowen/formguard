<?php

namespace Petebowen\Formguard\Checks;

class CheckForShortPhoneNumbers
{
	protected $input;
	protected $score = 0;
	protected $phoneFields = [
		'mobile',
		'phone',
	];

	public function __construct($input = [])
	{
		$this->input = $input;
	}

	public function score()
	{

		foreach ($this->phoneFields as $field) {

			if (! array_key_exists($field, $this->input)) {
				
				continue;
			}
			
				
			if (empty($this->input[$field])) { 

				continue;

			}
				
			$numbersLength = strlen(preg_replace('/[^0-9]/', '', $this->input[$field]));
			
			if ($numbersLength < 7) {
			
					$this->score ++;
			
			}
			
			
		}
		
		return $this->score;
	}
}