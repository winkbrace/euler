<?php namespace Math;

class Root
{
    /**
     * @param int $n
     * @return string
     */
    public function getContinuedFraction($n)
    {
        list($root, $rem) = gmp_sqrtrem($n);
        if (gmp_strval($rem) == 0)
            return null;

        // remember the first fraction. As soon as we encounter it again, the cycle is complete
        // a / sqrt(n) - b
        $a = 1;
        $b = gmp_intval($root);
        $firstFraction = [$a, $b];

        $cycle = [];
        do {
            list($base, $a, $b) = $this->getNextContinuedFraction($n, $a, $b);
            $cycle[] = $base;
        } while ([$a, $b] != $firstFraction);

        return '[' . gmp_strval($root) . ';(' . implode(',', $cycle) . ')]';
    }

    /**
     * example: n=23, a=1, b=-4
     *    a
     * ------
     * √n - b
     *
     *   1     1(√23+4)       √23-3                             7
     * ----- = -------- = 1 + ------ => so next iteration: 1, ------  =>  return [1, 7, 3]
     * √23-4      7             7                             √23-3
     *
     * @param int $n the number to sqrt()
     * @param int $a the numerator
     * @param int $b the number to subtract from sqrt(n) in the denominator
     * @return int[] ($base, $nextA, $nextB)
     */
    private function getNextContinuedFraction($n, $a, $b)
    {
        // num = a * (√n + b)
        // den = n - b^2
        $den = $n - pow($b, 2);

        // then simplify a and den (a will always become 1, so we can simply divide by a)
        $den /= $a;

        // then extract the whole number
        $base = (int) floor((sqrt($n) + $b) / $den);
        $nextA = (int) $den;
        $nextB = (int) ($base * $den) - $b;

        // then return the whole number and the next a and b
        return [$base, $nextA, $nextB];
    }
}