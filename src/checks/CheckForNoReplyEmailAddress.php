<?php

namespace Petebowen\Formguard\Checks;

class CheckForNoReplyEmailAddress
{

	protected $input;
	protected $score = 0;
	protected $emailFields = ['email'];

	public function __construct($input = [])
	{
		$this->input = $input;
	}

	public function score()
	{
		foreach ($this->emailFields as $field) {
			
			if (! array_key_exists($field, $this->input)) {
				
				continue;
			}
				
				
			foreach ($this->formsOfNoReply() as $needle) {
				
				$pos = strpos(strtolower($this->input[$field]), $needle);
				
				if ($pos !== false) {
					
					$this->score ++;
					
				}
			}
		}

		return $this->score;
	}

	private function formsOfNoReply()
	{
		return [
			'no-reply',
			'noreply',
		];
	}
}