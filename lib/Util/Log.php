<?php namespace Util; 

class Log
{
    public function __construct()
    {
        $this->emptyLine();
        $this->log('start script');
    }

    public function log($msg)
    {
        echo date('Y-m-d H:i:s').' - '.$msg.PHP_EOL;
    }

    public function solution($answer)
    {
        $this->emptyLine();
        $this->log("The solution is: $answer");
    }

    protected function emptyLine()
    {
        echo PHP_EOL;
    }
} 