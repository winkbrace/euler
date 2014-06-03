<?php namespace Math; 

class Fibonacci
{
    protected $sequence = array(1, 2);
    protected $index = 1;

    public function createSequenceBelow($max)
    {
        $sum = 0;
        while ($sum < $max)
            $sum = $this->setNextValue();

        return $this->sequence;
    }

    protected function setNextValue()
    {
        $sum = $this->getSumOfLastTwoDigits();
        $this->sequence[] = $sum;
        $this->index++;

        return $sum;
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