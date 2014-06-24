<?php namespace Sequence;

use Util\Integer;

/**
 * 1, 6, 15, 28, 45, ...
 */
class Hexagonal extends Sequence
{
    /**
     * @param int $x
     * @return int
     */
    public function getNumberAt($x)
    {
        // n(2n−1)
        return $x * (2*$x - 1);
    }

    /**
     * @param int $n
     * @return int
     */
    public function getIndexOf($n)
    {
        // y = 2x^2 - x
        // 0 = 2x^2 - x - y
        // a = 2, b = -1, c = -y
        // D = b^2 - 4ac = 4 - 4*2*-y = 1 + 8y
        // x = (-b +/- sqrt(D)) / 2a
        // x = (1 +/- sqrt(1 + 8y)) / 4
        // x = 0.25 + 0.25*sqrt(1 + 8y)
        return 0.25 + (0.25 * sqrt(1 + (8*$n)));
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isHexagonal($n)
    {
        return Integer::isInteger($this->getIndexOf($n));
    }
}