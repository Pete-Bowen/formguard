<?php

namespace Petebowen\Formguard\Checks;

class CheckForSpamWords
{
    protected $input;
    protected $score = 0;
    
    public function __construct($input = [])
    {
        $this->input = $input;
    }

    public function score()
    {
        foreach ($this->input as $value) {
            
            foreach ($this->spamWords() as $word) {
                
                $pos = strripos($value, $word);

                if ($pos !== false) {
                    
                    $this->score ++;
                
                }
            }
        }

        return $this->score;
    }

    private function spamWords()
    {
        return ['canada','goose','ugg','boots','uggs','north','face','parka','blog','weblog','nike','nfl','jerseys','vitton','mulberry','lauren','louboutin','miu miu', '000-000-0000', 'increase online leads','generic','drugs','ppc','seo','google','fuck','pussy','cum','sex','penis','penile','oral','blow job','cheap auto insurance','mail.ru', 'bang','viagra'];
    }
}