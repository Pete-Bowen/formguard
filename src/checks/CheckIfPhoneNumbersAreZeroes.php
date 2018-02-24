<?php

namespace Petebowen\Formguard\Checks;

class CheckIfPhoneNumbersAreZeroes
{
    protected $input;
    protected $score = 0;
    protected $phoneNumberFields = [
        'mobile',
        'phone',
    ];

    public function __construct($input = [])
    {
        $this->input = $input;
    }
    public function score()
    {
        
        foreach ($this->phoneNumberFields as $field) {
            
            if (! array_key_exists($field, $this->input)) {
                
                continue;
            }
            
            if (empty($this->input[$field])) {

                continue;
            }
                
            if (trim($this->input[$field]) == '000-000-0000') {
            
                $this->score ++;
            }
            
        }

        return $this->score;
    }
}