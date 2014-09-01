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
        $this->reset();
        for ($i=1; $i<=$n; $i++)
            $this->sequence[$i] = $this->next();

        return $this->sequence;
    }

    public function createSequenceTo($n)
    {
        $this->reset();
        while (($value = $this->next()) <= $n)
            $this->sequence[$this->index] = $value;

        return $this->sequence;
    }

    public function next()
    {
        return $this->getNumberAt(++$this->index);
    }

    public function reset()
    {
        $this->index = 0;
        $this->sequence = array();
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