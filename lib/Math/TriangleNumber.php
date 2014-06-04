<?php namespace Math;

/**
 * 1 => 1   = 1 * 1     => 1 = 1 + 1 / 2        => f(x) = x * (x + 1) / 2 = 0.5 * (x^2 + x) = 0.5x^2 + 0.5x
 * 2 => 3   = 2 * 1.5   => 1.5 = (2 + 1) / 2
 * 3 => 6   = 3 * 2     => 2 = (3 + 1) / 2
 * 4 => 10  = 4 * 2.5
 * 5 => 15  = 5 * 3
 * 6 => 21  = 6 * 3.5
 * 7 => 28  = 7 * 4
 * 8 => 36  = 8 * 4.5
 */
class TriangleNumber
{
    public function getNumberAt($x)
    {
        return ($x * ($x + 1) / 2);
    }
} 