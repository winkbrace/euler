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
        if ($needle <= 0)
            throw new \InvalidArgumentException("$needle must be at least 1");

        return gmp_strval(gmp_div_r("$haystack", "$needle")) == '0';
    }

    /**
     * @param int $n
     * @return int[]
     */
    public function getFactors($n)
    {
        $factors = array(1);
        for ($i = 2; $i <= ceil($n / 2); $i++)
        {
            if ($this->isFactor($i, $n))
                $factors[] = $i;
        }
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