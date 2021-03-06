<?php namespace Sequence;

class Collatz
{
    /** @var int[] */
    protected $sequence = array();

    public function createSequence($start)
    {
        $this->sequence = array();

        $n = $start;
        while ($n > 1)
        {
            $this->sequence[] = $n;
            $n = $this->next($n);
        }
        $this->sequence[] = 1;

        return $this->sequence;
    }

    /**
     * @param int $n
     * @return int
     */
    public function next($n)
    {
        if ($n % 2 == 0)
            return $n / 2;
        else
            return (3 * $n) + 1;
    }

    /**
     * @return int[]
     */
    public function getSequence()
    {
        return $this->sequence;
    }
} 