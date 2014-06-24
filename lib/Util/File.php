<?php namespace Util; 

class File
{
    public static function readCsv($filename)
    {
        $fh = fopen($filename, 'r');
        $array = fgetcsv($fh);
        fclose($fh);

        return $array;
    }
} 