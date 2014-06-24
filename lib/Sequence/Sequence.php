<?php namespace Sequence; 

abstract class Sequence
{
    /** @var int[] */
    protected $sequence = array();
    /** @var int */
    protected $index = 0;


    abstract public function getNumberAt($x);

    abstract public function getIndexOf($n);


    public function createSequenceOfLength($n)
    {
        for ($i=1; $i<=$n; $i++)
            $this->sequence[$i] = $this->next();

        return $this->sequence;
    }

    public function createSequenceTo($n)
    {
        while (($value = $this->next()) <= $n)
            $this->sequence[$this->index] = $value;

        return $this->sequence;
    }

    public function next()
    {
        return $this->getNumberAt(++$this->index);
    }

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