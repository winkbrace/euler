<?php namespace Sequence; 

class Square extends Sequence
{
    public function getNumberAt($x)
    {
        return pow($x, 2);
    }

    public function getIndexOf($n)
    {
        return sqrt($n);
    }

    public function isSquare($n)
    {
        return gmp_perfect_square($n);
    }
}