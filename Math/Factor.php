<?php namespace Math; 

class Factor
{
    /**
     * @param int $needle
     * @param int $haystack
     * @throws \InvalidArgumentException
     * @return bool
     */
    public function isFactor($needle, $haystack)
    {
        return $haystack % $needle == 0;
    }

    /**
     * @param int $n
     * @return int[]
     */
    public function getFactors($n)
    {
        if ($n == 1)
            return array(1);

        $factors = array(1 => 1, $n => 1);

        // all factors are a multiple of a prime factor. This greatly reduces the amount
        // of numbers to check
        $root = floor(sqrt($n));
        foreach ($this->getPrimeFactors($n) as $p)
        {
            $i = 1;
            $product = $p * $i;
            while ($product <= $root)
            {
                if ($n % $product == 0)
                {
                    $factors[$product] = 1;
                    $factors[$n / $product] = 1;
                }
                $product = $p * ++$i;
            }
        }

        $factors = array_keys($factors);
        sort($factors);
        return $factors;
    }

    /**
     * @param int $n
     * @return int[]
     */
    public function getPrimeFactors($n)
    {
        $p = new Prime();
        return $p->getPrimeFactorsOf($n);
    }

    /**
     * Get the smallest number that can be divided by all numbers in given range
     * @param int $from
     * @param int $to
     * @return int[]
     */
    public function getSmallestMultipleOfRange($from, $to)
    {
        $step = $this->getSmallestFactorStepOfRange($from, $to);
        $max = array_product(range($from, $to));
        $n = 0;
        while ($n <= $max)
        {
            $n += $step;
            for ($j=$from; $j<=$to; $j++)
            {
                if (! $this->isFactor($j, $n))
                    continue(2);
            }

            return $n;
        }

        return 0; // not found
    }

    /**
     * The product of the primary keys in a range is the smallest possible divisor for all numbers in that range.
     * @param int $from
     * @param int $to
     * @return int[]
     */
    public function getSmallestFactorStepOfRange($from, $to)
    {
        $p = new Prime();
        $primes = $p->getPrimesTo($to);
        $primes = array_filter($primes, function($x) use ($from) { return $x > $from; });
        return array_product($primes);
    }
} 