<?php

namespace Petebowen\Formguard\Checks;

class CheckForTextInPhoneNumberFields
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
                
            if (!empty($this->input[$field])) {
                
                $totalLength = strlen($this->input[$field]);
                $numbersLength = strlen(preg_replace('/[^0-9]/', '', $this->input[$field]));
            
                if ($numbersLength < $totalLength / 2) {//they've padded the form with junk
                    
                    $this->score ++;
                }
            }
        }
        
        return $this->score;
    }
}