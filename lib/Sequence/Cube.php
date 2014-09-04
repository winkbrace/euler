<?php namespace Sequence;

use Util\Integer;

class Cube extends Sequence
{

    public function getNumberAt($x)
    {
        return pow($x, 3);
    }

    public function getIndexOf($n)
    {
        return pow($n, 1/3);
    }

    public function isCube($n)
    {
        return Integer::isInteger($this->getIndexOf($n));
    }
}