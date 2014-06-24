<?php namespace Sequence; 

class Hexagonal extends Sequence
{
    public function getNumberAt($x)
    {
        // n(2n−1)
        return $x * (2*$x - 1);
    }

    public function getIndexOf($n)
    {
        // TODO: Implement getIndexOf() method.
    }

    public function createSequenceTo($n)
    {
        // TODO: Implement createSequenceTo() method.
    }

    public function createSequenceOfLength($n)
    {
        // TODO: Implement createSequenceOfLength() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }
}