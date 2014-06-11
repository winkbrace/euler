<?php namespace Util; 

class Log
{
    public function log($msg)
    {
        echo date('Y-m-d H:i:s').' - '.$msg.PHP_EOL;
    }

    public function start($msg = null)
    {
        $this->emptyLine();
        $msg = $msg ?: 'start script';
        $this->log($msg);
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