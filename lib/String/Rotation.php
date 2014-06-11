<?php namespace String; 

class Rotation
{
    public static function getAllRotations($n)
    {
        $rotations = array();
        for ($i=0; $i<strlen($n); $i++)
            $rotations[] = substr($n, $i) . substr($n, 0, $i);

        return $rotations;
    }
} 