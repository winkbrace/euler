<?php namespace Math;

use String\Rotation;

class Prime
{
    /** @var int[] */
    protected $primes = [];
    /** @var array */
    protected $flippedPrimes = [];
    /** @var int */
    protected $maxInFile;

    /** @var \Math\Prime[] */
    protected static $instances = [];


    /**
     * @param string $amount
     */
    protected function __construct($amount = '100k')
    {
        $this->readPrimes($amount);
    }

    /**
     * It is handy to have only 1 Prime instance, so the file with first 100k primes will only be read once.
     * @param string $amount size of array of primes to load
     * @return \Math\Prime
     */
    public static function getInstance($amount = '100k')
    {
        if (empty(static::$instances[$amount]))
            static::$instances[$amount] = new static($amount);

        return static::$instances[$amount];
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isPrime($n)
    {
        if ($n < 2)
            return false;

        if ($n > $this->maxInFile)
            return $this->calculateIsPrime($n);

        return isset($this->flippedPrimes[$n]);
    }

    /**
     * Example: The number 197 is called a circular prime because all rotations of the digits:
     * 197, 971, and 719, are themselves prime.
     * @param int $n
     * @return bool
     */
    public function isCircularPrime($n)
    {
        // circular prime is only possible if all digits are 1, 3, 7 or 9
        if ($n > 5 && $n != str_replace(array(2,4,5,6,8,0), '', $n))
            return false;

        foreach (Rotation::getAllRotations($n) as $x)
        {
            if (! $this->isPrime($x))
                return false;
        }

        return true;
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isTruncatable($n)
    {
        $str = (string) $n;
        while ($str = substr($str, 1))
        {
            if (! $this->isPrime($str))
                return false;
        }
        $str = (string) $n;
        while ($str = substr($str, 0, -1))
        {
            if (! $this->isPrime($str))
                return false;
        }
        return true;
    }

    /**
     * we only have to check all prime numbers to see if a number is a prime number
     * when we find one, we add it to the array
     * @param int $n
     * @return bool
     */
    protected function calculateIsPrime($n)
    {
        $root = ceil(sqrt($n));
        $count = count($this->primes);
        foreach ($this->primes as $p)
        {
            if ($p > $root)
            {
                if (! isset($this->flippedPrimes[$n]))
                {
                    $this->primes[] = $n;
                    $this->flippedPrimes[$n] = ++$count;
                }
                return true;
            }

            if ($n % $p == 0)
                return false;
        }
    }

    /**
     * @param int $n
     * @return int
     */
    public function getNthPrime($n)
    {
        return $this->primes[$n - 1];
    }

    /**
     * @return int[]
     */
    public function getPrimes()
    {
        return $this->primes;
    }

    /**
     * @param int $n
     * @return int[]
     */
    public function getPrimesTo($n)
    {
        if ($n > $this->maxInFile)
            return $this->primes;

        $primes = array();

        foreach ($this->primes as $p)
        {
            if ($p > $n)
                break;

            $primes[] = $p;
        }

        return $primes;
    }

    /**
     * get all factors of $n that are a prime number
     * @param int $n
     * @return int[]
     */
    public function getPrimeFactorsOf($n)
    {
        $f = new Factor();
        $p = new Product();
        $factors = array();

        $primes = $this->getPrimesTo(ceil(sqrt($n)));
        foreach ($primes as $prime)
        {
            if ($f->isFactor($prime, $n))
                $factors[] = (int) $prime;
        }
        // now check if any found factors product results in another prime factor
        // example: 645 -> sqrt() = 25 -> found factors = 3, 5 -> 3*5 = 15 -> 645 / 15 = 43 -> 43 is prime factor
        // this looks a complicated way, but now we only need to check all primes up to sqrt($n) instead of $n/2
        // which is a HUGE speed boost (600 secs -> 19 secs for problem 47)
        foreach ($p->getAllProducts($factors) as $x)
        {
            if ($x > $n / $factors[0]) // no need to check numbers greater than n divided by smallest factor
                break;

            if ($f->isFactor($x, $n) && $this->isPrime($n / $x))
            {
                $factors[] = $n / $x;
                break;
            }

            // search for factors that need to be multiplied with a multitude of a small factor
            // example: 134043 -> 2, 3, 11, 677 -> 2*3*3*11 * 677 = 134043
            foreach ($factors as $factor)
            {
                $y = $x * $factor;
                while ($n % $y == 0)
                {
                    if ($this->isPrime($n / $y))
                        $factors[] = $n / $y;

                    $y *= $factor;
                }
            }
        }

        return array_unique($factors);
    }

    /**
     * @return int
     */
    public function getMaxInFile()
    {
        return $this->maxInFile;
    }

    /**
     * @param string $amount
     */
    protected function readPrimes($amount)
    {
        $i = 0;
        $lines = file(realpath(__DIR__ . '/../../resources/first_'.$amount.'_primes.txt'));
        foreach ($lines as $line)
        {
            foreach (array_filter(explode(' ', $line)) as $prime)
            {
                $prime = trim($prime);
                if (! empty($prime))
                {
                    $this->primes[$i] = $prime;
                    $this->flippedPrimes[$prime] = $i;
                    $i++;
                }
            }
        }
        $this->maxInFile = $this->primes[$i-1];
    }
}
