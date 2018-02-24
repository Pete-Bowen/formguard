<?php

namespace Petebowen\Formguard\Checks;

class CheckForUnexpectedLinks
{
    protected $input;
    protected $score = 0;
    protected $noLinkFields = [
            'first_name',
            'last_name',
            'mobile',
            'phone',
        ];
    
    public function __construct($input = [])
    {
        $this->input = $input;
    }

    public function score()
    {

        foreach ($this->noLinkFields as $field) {
            

            if (! array_key_exists($field, $this->input)) {
                
                continue;
            }


            $pos = stripos($this->input[$field], 'http');
            
            if ($pos === false) {//lets test for the shorter form just www
                $pos = stripos($this->input[$field], 'www');
            }

            if ($pos === false) {//lets test for the markdown format
                $pos = stripos($this->input[$field], '[url]');
            }

            if ($pos === false) {//lets test for the <a href=
                $pos = stripos($this->input[$field], '<a href=');
            }
            

            if ($pos !== false) {
                $this->score ++;
            }
            
        }
        
        return $this->score;
    }
}