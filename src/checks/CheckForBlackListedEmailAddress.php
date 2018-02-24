<?php

namespace Petebowen\Formguard\Checks;

class CheckForBlackListedEmailAddress
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
	                
			foreach ($this->blackListedEmailAddresses() as $needle)  {
			          
				$pos = strpos(strtolower($this->input[$field]), $needle);
			        
		      	if ($pos !== false) {
		       		
		       		$this->score ++;
		       		//might break or return on first hit
		      	}
	    	}
   		}

		return $this->score;
	}


	private function blackListedEmailAddresses()
	{
		return [
			'.mkt@gmail.com',
		];
	}
}