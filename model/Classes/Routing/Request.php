<?php

namespace App\Routing;

class Request implements \App\Routing\IRequest
{
    public function __construct()
    {
        $this->bootstrapSelf();   
    }

    public function bootstrapSelf()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{$this->toCamelCase($key)} = $value;
        }
    }

    private function toCamelCase(string $str)
    {
        $result = strtolower($str);
        $matches = [];

        preg_match_all('/_[a-z]/', $result, $matches);

        foreach ($matches[0] as $match) {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        
        return $result;
    }

    public function getBody()
    {
        if ($this->requestMethod == 'GET') {
            return ;
        }

        if ($this->requestMethod == 'POST') {
            $body = [];
            
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

            return $body;
        }
    }
}