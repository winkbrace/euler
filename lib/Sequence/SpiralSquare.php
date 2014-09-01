<?php namespace Sequence;

class SpiralSquare extends Sequence
{
    /**
     * n = ax - (a-1)^2 + 2
     * a = 2 * ceil(x/4)
     * @param int $x
     * @return int $n
     */
    public function getNumberAt($x)
    {
        if ($x == 0)
            return 1;

        $a = (int) ceil($x / 4) * 2;
        return $a*$x - pow($a-1, 2) + 2;
    }

    /**
     * @param int $n
     * @return int $x
     */
    public function getIndexOf($n)
    {
        // n = -(a-1)^2 + ax + 2
        // n + (a-1)^2 - 2 = ax
        // x = (n + (a-1)^2 - 2) / a
        $a = $this->sqrtDownToOdd($n) + 1;
        return (int) (($n + pow($a-1, 2) - 2) / $a);
    }

    private function sqrtDownToOdd($n)
    {
        $n = (int) floor(sqrt($n-1));
        if ($this->isEven($n))
            $n--;
        return $n;
    }

    private function isEven($n)
    {
        return ! ($n & 1);
    }
}