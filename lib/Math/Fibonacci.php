<?php namespace Math; 

class Fibonacci
{
    /** @var int[] */
    protected $sequence;
    /** @var int */
    protected $index;

    public function __construct()
    {
        $this->sequence = array(1, 2);
        $this->index = 1;
    }

    public function createSequenceTo($max)
    {
        $sum = 3;
        while ($sum < $max)
        {
            $this->setNextValue($sum);
            $sum = $this->getSumOfLastTwoDigits();
        }

        return $this->sequence;
    }

    protected function setNextValue($sum)
    {
        $this->sequence[++$this->index] = $sum;
    }

    protected function getSumOfLastTwoDigits()
    {
        return $this->sequence[$this->index - 1] + $this->sequence[$this->index];
    }

    /**
     * @return array
     */
    public function getSequence()
    {
        return $this->sequence;
    }

}