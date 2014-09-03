<?php namespace Sequence;

use Util\Integer;

class Heptagonal extends Sequence
{
    /**
     * @param int $x
     * @return int
     */
    public function getNumberAt($x)
    {
        // n(5n−3)/2
        return ($x * ((5 * $x) - 3)) / 2;
    }

    /**
     * @param int $n
     * @return int
     */
    public function getIndexOf($n)
    {
        // n(5n−3)/2
        // y = 2.5x^2 - 1.5x
        // 0 = 2.5x^2 - 1.5x - y
        // a = 2.5, b = -1.5, c = -y
        // D = b^2 - 4ac = 2.25 + 10y
        // x = (-b +/- sqrt(D)) / 2a
        // x = (1.5 +/- sqrt(2.25 + 10y)) / 5
        // x = 0.3 + 0.2*sqrt(2.25 + 10y)
        return 0.3 + (0.2 * sqrt(2.25 + 10*$n));
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isHeptagonal($n)
    {
        return Integer::isInteger($this->getIndexOf($n));
    }
}