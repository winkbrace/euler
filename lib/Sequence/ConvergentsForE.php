<?php namespace Sequence;

/**
 * Class ConvergentsForE
 *
 * This class is responsible for generating the convergents sequence for the constant e
 * e = [2; 1,2,1, 1,4,1, 1,6,1 , ... , 1,2k,1, ...].
 * so f(1) = 2, f(2) = 2 + 1/1 = 3, f(3) = 2 + (2/3) = 8/3
 * but we will return s(1) = 0, s(2) = 1, s(3) = 2, s(4) = 1, etc..
 */
class ConvergentsForE extends Sequence
{

    public function getNumberAt($x)
    {
        if ($x <= 1)
            return null;

        $x--;
        if ($x % 3 != 2)
            return 1;
        else
            return (int) ceil($x/3) * 2;
    }

    public function getIndexOf($n)
    {
        throw new \Exception('It is not possible to reverse this sequence');
    }
}