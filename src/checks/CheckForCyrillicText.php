<?php

namespace Petebowen\Formguard\Checks;

class CheckForCyrillicText
{

  protected $input;
	protected $score = 0;

	public function __construct($input = [])
	{
    	$this->input = $input;
	}

	public function score()
  	{
    	foreach ($this->input as $value) {
      		
      	if (preg_match('/[А-Яа-яЁё]/u', $value)) {
        	$this->score ++;
      	}
    	}

    	return $this->score;
  	}
}