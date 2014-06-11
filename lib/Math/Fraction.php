<?php namespace Math;

class Fraction
{
    protected $afterDot = false;

    /**
     * Note: this method needs a lot of numbers after the dot. It tests samples of size 20.
     * @param string $n
     * @return string
     */
    public function getRecurringCycle($n)
    {
        $n = substr($n, strpos($n, '.')+1);
        $length = strlen($n);
        $start = $this->getCycleStartPosition($n);
        for ($i = $start+1; $i<$length; $i++)
        {
            if (substr($n, $i, 20) == substr($n, $start, 20))
                return substr($n, $start, ($i - $start));
        }
    }

    /**
     * @param string $n
     * @return int
     */
    protected function getCycleStartPosition($n)
    {
        $length = strlen($n);
        for ($i=0; $i<$length; $i++)
        {
            for ($j=$i+1; $j<$length; $j++)
            {
                if (substr($n, $i, 20) == substr($n, $j, 20))
                    return $i;
            }
        }
    }

    /**
     * @param int $numerator
     * @param int $divisor
     * @param int $precision
     * @return string
     */
    public function getFraction($numerator, $divisor, $precision)
    {
        $n = gmp_init($numerator);
        $d = gmp_init($divisor);

        // get the part before the dot
        list($q, $n) = gmp_div_qr($n, $d);
        $output = gmp_strval($q) . '.';
        $startPos = strlen($output) - 1;

        // then go up the powers of 10 until we are at the part after the dot. From there start counting
        // to the specified precision
        for ($i=0; $i<$precision + $startPos; $i++)
        {
            list($q, $r) = gmp_div_qr($n, $d);
            $n = gmp_mul($r, gmp_init(10));

            if ($i >= $startPos)
                $output .= gmp_strval($q);
        }

        return $output;
    }

    /**
     * @param int $numerator
     * @param int $divisor
     * @return array(n, d)
     */
    public function simplify($numerator, $divisor)
    {
        $n = gmp_init($numerator);
        $d = gmp_init($divisor);

        $one = gmp_init('1');
        $gcd = gmp_gcd($n, $d);
        while (gmp_cmp($gcd, $one) == 1)  // while gcd > 1
        {
            $n = gmp_div($n, $gcd);
            $d = gmp_div($d, $gcd);
            $gcd = gmp_gcd($n, $d);
        }

        return array(gmp_strval($n), gmp_strval($d));
    }
}