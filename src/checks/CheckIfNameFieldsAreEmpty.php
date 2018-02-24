<?php

namespace Petebowen\Formguard\Checks;

class CheckIfNameFieldsAreEmpty
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
        
        $count = 0;//number of fields we've got
        $empty = 0;//number that are empty
        foreach ($this->nameFields as $field) {
            
            if (! array_key_exists($field, $this->input)) {
                
                continue;
            }

            $count ++;

            if (empty($this->input[$field])) {
            
                $empty ++;
            }
        }

        if ($empty == $count) {//all the name fields are empty
            
            $this->score ++;
        }

        return $this->score;
    }
}