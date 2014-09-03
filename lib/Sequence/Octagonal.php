<?php namespace Sequence;

use Util\Integer;

class Octagonal extends Sequence
{
    /**
     * @param int $x
     * @return int
     */
    public function getNumberAt($x)
    {
        // n(3n−2)
        return $x * (3*$x - 2);
    }

    /**
     * @param int $n
     * @return int
     */
    public function getIndexOf($n)
    {
        // y = 3x^2 -2x
        // 0 = 3x^2 -2x -y => a=3 b=-2 c=-y => D = b^2 - 4ac = 4 + 12y
        // x = (-b +/- sqrt(D)) / 2a = (2 + sqrt(4 + 12y)) / 6
        return (2 + sqrt(4 + 12*$n)) / 6;
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isOctagonal($n)
    {
        return Integer::isInteger($this->getIndexOf($n));
    }
}