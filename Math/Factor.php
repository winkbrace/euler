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
} 