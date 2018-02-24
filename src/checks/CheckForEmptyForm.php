<?php

namespace Petebowen\Formguard\Checks;

class CheckForEmptyForm
{

  protected $input;
	protected $score = 0;

	public function __construct($input = [])
	{
    $this->input = $input;
	}

	public function score()
  {

    if (empty($this->input)) {
        
      $this->score ++;
    }

    return $this->score;
  }
}