<?php namespace Sequence; 

abstract class Sequence
{
    /** @var int[] */
    protected $sequence = array();
    /** @var int */
    protected $index = 0;

    abstract public function getNumberAt($x);

    abstract public function getIndexOf($n);

    abstract public function createSequenceTo($n);

    abstract public function createSequenceOfLength($n);

    abstract public function next();

    /**
     * @return int[]
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * @return int
     */
    public function getLastIndex()
    {
        return $this->index;
    }
} 