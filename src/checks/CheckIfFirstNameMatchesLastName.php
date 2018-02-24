<?php

namespace Petebowen\Formguard\Checks;

class CheckIfFirstNameMatchesLastName
{
    protected $input;
    protected $score = 0;
    protected $firstNameField = 'first_name';
    protected $lastNameField = 'last_name';
    
    public function __construct($input = [])
    {
        $this->input = $input;
    }

    public function score()
    {

        if (! array_key_exists($this->firstNameField, $this->input)) {
                
               return $this->score;
            }

        if (! array_key_exists($this->lastNameField, $this->input)) {
                
               return $this->score;
            }


        if ($this->input[$this->firstNameField] == $this->input[$this->lastNameField]) {
            
            $this->score ++;
        }

        return $this->score;
    }
}