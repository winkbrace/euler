<?php namespace Sequence;

use Util\Integer;

/**
 * 1 => 1   = 1 * 1     => 1 = 1 + 1 / 2        => f(x) = x * (x + 1) / 2 = 0.5 * (x^2 + x) = 0.5x^2 + 0.5x = 0.5x * (x + 1)
 * 2 => 3   = 2 * 1.5   => 1.5 = (2 + 1) / 2
 * 3 => 6   = 3 * 2     => 2 = (3 + 1) / 2
 * 4 => 10  = 4 * 2.5
 * 5 => 15  = 5 * 3
 * 6 => 21  = 6 * 3.5
 * 7 => 28  = 7 * 4
 * 8 => 36  = 8 * 4.5
 */
class TriangleNumber
{
    /**
     * @param int $x
     * @return int
     */
    public function getNumberAt($x)
    {
        return ($x * ($x + 1) / 2);
    }

    /**
     * @param int $n
     * @return int
     */
    public function getIndexOf($n)
    {
        /**
         * x(x+1) = 2n
         * x^2 + x = 2n
         * x^2 + x - 2n = 0
         *
         * Dan gebruiken we de abc-formule:
         * a = 1, b = 1, c = -2n
         *
         * D = b^2 - 4ac = 1^2 - 4 x 1 x -2n = 1 + 8n
         * x = (-b - sqrt(D)) / 2a of x = (-b + sqrt(D)) / 2a
         * x = (-1 - sqrt(1+8n)) / 2  of  x = (-1 + sqrt(1+8n)) / 2
         *
         * Oplossing:
         * x = -0.5 - 0.5sqrt(1+8n) of x = -0.5 + 0.5sqrt(1+8n)
         */
        return -0.5 + (0.5 * sqrt(1 + (8 * $n)));
    }

    public function isTriangleNumber($n)
    {
        $i = $this->getIndexOf($n);
        return Integer::isInteger($i);
    }
} 