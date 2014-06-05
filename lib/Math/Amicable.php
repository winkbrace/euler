<?php namespace Math;

/**
 * Amicable
 *
 * Let d(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).
 * If d(a) = b and d(b) = a, where a ≠ b, then a and b are an amicable pair and each of a and b are called amicable numbers.
 *
 * For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 and 110;
 * therefore d(220) = 284. The proper divisors of 284 are 1, 2, 4, 71 and 142; so d(284) = 220.
 */
class Amicable
{
    /** @var \Math\Factor */
    protected $factor;


    public function __construct()
    {
        $this->factor = new Factor();
    }

    public function getAmicableNumbersTo($n)
    {
        $amicables = array();

        for ($i=2; $i<=$n; $i++)
        {
            if (in_array($i, $amicables))
                continue;

            if ($p = $this->getAmicablePartner($i))
            {
                echo "$i is amicable with $p".PHP_EOL;

                $amicables[] = $i;
                if ($p <= $n)
                    $amicables[] = $p;
            }

            if ($i % 50 == 0)
                echo "tested up to $i.".PHP_EOL;
        }

        return $amicables;
    }

    /**
     * d(a) = b and d(b) = a, where a ≠ b
     *
     * @param $a
     * @return int|false
     */
    public function getAmicablePartner($a)
    {
        // determine sum of divisors of a
        $b = array_sum($this->factor->getDivisors($a));
        if ($a == $b)
            return false;

        // then check if sum of divisors of b equals a
        $db = array_sum($this->factor->getDivisors($b));
        if ($db != $a)
            return false;

        return $b;
    }
}
