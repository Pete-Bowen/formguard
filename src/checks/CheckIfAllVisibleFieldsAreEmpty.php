<?php

namespace Petebowen\Formguard\Checks;

class CheckIfAllVisibleFieldsAreEmpty
{
    protected $input;
    protected $score = 0;
    protected $visibleFields = [
            'first_name',
            'last_name',
            'email',
            'phone',
            'mobile',
            'town',
            'address',
            'country',
            'custom_1',
            'custom_2',
            'custom_3',
            'custom_4',
            'custom_5'
        ];
    
    public function __construct($input = [])
    {
        $this->input = $input;
    }

    public function score()
    {
    
        $count = 0;//number of fields we've got
        $empty = 0;//number that are empty
        foreach ($this->visibleFields as $field) {
            
            if (! array_key_exists($field, $this->input)) {
                
                continue;
            }
            
            $count ++;
                
            if (empty($this->input[$field])) {
            
                $empty ++;
            
            }
            
        }

        if ($empty == $count) {//all the visible fields are empty
            $this->score ++;
        }

        return $this->score;
    }
}