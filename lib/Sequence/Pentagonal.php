<?php namespace Sequence;

use Util\Integer;

/**
 * Pn=n(3n−1)/2
 * 1, 5, 12, 22, 35, 51, 70, 92, 117, 145, ...
 */
class Pentagonal extends Sequence
{
    /**
     * @param int $x
     * @return int
     */
    public function getNumberAt($x)
    {
        return $x * ((3 * $x) - 1) / 2;
    }

    public function getIndexOf($n)
    {
        // y = (3x^2 - x) / 2 = 1.5x^2 - 0.5x
        // 0 = 1.5x^2 - 0.5x - y
        // a = 1.5, b = -0.5, c=-y
        // D = b^2 - 4ac = 0.25 - 4*1.5*-y = 0.25 + 6y = 6y + 0.25
        // x = (-b +/- sqrt(D)) / 2a
        // x = (0.5 +/- sqrt(6y + 0.25)) / 3
        return (0.5 + sqrt((6 * $n) + 0.25)) / 3;
    }

    public function isPentagonal($n)
    {
        $i = $this->getIndexOf($n);
        return Integer::isInteger($i);
    }
}