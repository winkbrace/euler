<?php namespace Math; 

class Fibonacci
{
    /** @var array */
    protected $sequence;
    /** @var int */
    protected $index;

    public function __construct()
    {
        $this->sequence = array(1 => gmp_init(1), 2 => gmp_init(1));
        $this->index = 2;
    }

    /**
     * @return string
     */
    public function next()
    {
        $sum = $this->getSumOfLastTwoDigits();
        $this->setNextValue($sum);

        return gmp_strval($sum);
    }

    /**
     * @param int|resource $max
     * @return array
     */
    public function createSequenceTo($max)
    {
        $sum = $this->getSumOfLastTwoDigits();
        $max = is_resource($max) ? $max : gmp_init($max);
        while (gmp_cmp($sum, $max) == -1)
        {
            $this->setNextValue($sum);
            $sum = $this->getSumOfLastTwoDigits();
        }

        return $this->sequence;
    }

    /**
     * @param resource $sum
     */
    protected function setNextValue($sum)
    {
        $this->sequence[++$this->index] = $sum;
    }

    /**
     * @return resource
     */
    protected function getSumOfLastTwoDigits()
    {
        return gmp_add($this->sequence[$this->index - 1], $this->sequence[$this->index]);
    }

    /**
     * @return array
     */
    public function getSequence()
    {
        $seq = array();
        foreach ($this->sequence as $n)
            $seq[] = gmp_strval($n);

        return $seq;
    }

    /**
     * @return int
     */
    public function getLastIndex()
    {
        return $this->index;
    }
}