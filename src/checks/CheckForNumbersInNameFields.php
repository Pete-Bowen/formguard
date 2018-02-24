<?php

namespace Petebowen\Formguard\Checks;

class CheckForNumbersInNameFields
{

    protected $input;
    protected $score = 0;
    protected $nameFields = [
        'first_name',
        'last_name',
    ];

    public function __construct($input = [])
    {
        $this->input = $input;
    }

    public function score()
    {
    	foreach ($this->nameFields as $field) {

            if (! array_key_exists($field, $this->input)) {
                
                continue;
            }
            
            if (preg_match_all("/[0-9]/", $this->input[$field]) > 1) {
                $this->score ++;
            }
        }

        return $this->score;
    }
}