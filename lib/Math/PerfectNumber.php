<?php namespace Math;

class PerfectNumber
{
    /** @var \Math\Factor */
    protected $factor;
    /** @var \Math\Prime */
    protected $prime;
    /** @var int[] */
    protected $divisors = array();


    public function __construct()
    {
        $this->factor = new Factor();
        $this->prime = Prime::getInstance();
    }

    /**
     * @param int $n
     * @return int[]
     */
    public function findAbundantNumbersUpTo($n)
    {
        $abundants = array();

        for ($i=12; $i<$n; $i++)
        {
            if (isset($abundants[$i]))
                continue;
            if ($this->prime->isPrime($i))
                continue;

            // all multiples of perfect and abundant numbers are abundant
            if ($this->isAbundant($i))
            {
                for ($a=$i; $a<$n; $a+=$i)
                    $abundants[$a] = 1;
            }
            elseif (array_sum($this->divisors) == $n) // is perfect
            {
                for ($a=($i+$i); $a<$n; $a+=$i)
                    $abundants[$a] = 1;
            }
        }

        $abundants = array_keys($abundants);
        sort($abundants);
        return $abundants;
    }

    /**
     * A perfect number is a number for which the sum of its proper divisors is exactly equal to the number
     * @param int $n
     * @return bool
     */
    public function isPerfect($n)
    {
        return $n == array_sum($this->findDivisors($n));
    }

    /**
     * A number n is called deficient if the sum of its proper divisors is less than n
     * @param int $n
     * @return bool
     */
    public function isDeficient($n)
    {
        return array_sum($this->findDivisors($n)) < $n;
    }

    /**
     * A number n is called abundant if the sum of its proper divisors is greater than n
     * @param int $n
     * @return bool
     */
    public function isAbundant($n)
    {
        return array_sum($this->findDivisors($n)) > $n;
    }

    /**
     * @param $n
     * @return int[]
     */
    protected function findDivisors($n)
    {
        $this->divisors = $this->factor->findDivisors($n);
        return $this->divisors;
    }

    /**
     * @return int[]
     */
    public function getLastFoundDivisors()
    {
        return $this->divisors;
    }
}
