<?php
//not sure if this was actually being used??
namespace Petebowen\Formguard\Checks;

class CheckForTooManyLinksInMessageFields
{
    protected $input;
    protected $score = 0;
    protected $messageFields = [
            'message',
            'enquiry_detail',
            'comment',
            'custom_5',
            ];
    
    public function __construct($input = [])
    {
        $this->input = $input;
    }

    public function score()
    {
        
        foreach ($this->messageFields as $field) {
            
            if (! array_key_exists($field, $this->input)) {
                
                continue;
            }
            
            $content = strtolower($this->input[$field]);
        
            $content = str_replace('https', 'http', $content);

            $this->score += substr_count(strtolower($content), 'www');
            $this->score += substr_count(strtolower($content), 'http');
            
            $this->score -= substr_count(strtolower($content), 'http://www');
        }
        
        return $this->score;
    }
}