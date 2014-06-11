<?php namespace Math;

use String\Rotation;

class Prime
{
    const MAX_IN_FILE = 611953;

    /** @var int[] */
    protected $primes = array();

    /** @var \Math\Prime */
    protected static $instance;

    /**
     * It is handy to have only 1 Prime instance, so the file with first 50k primes will only be read once.
     * @return Prime
     */
    public static function getInstance()
    {
        if (empty(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isPrime($n)
    {
        if ($n < 2)
            return false;

        if ($n > self::MAX_IN_FILE)
            return $this->calculateIsPrime($n);

        return in_array($n, $this->getPrimes());
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
     * we only have to check all prime numbers to see if a number is a prime number
     * when we find one, we add it to the array
     * @param int $n
     * @return bool
     */
    protected function calculateIsPrime($n)
    {
        $root = ceil(sqrt($n));
        foreach ($this->getPrimes() as $p)
        {
            if ($p > $root)
            {
                $this->primes[] = $n;
                return true;
            }

            if ($n % $p == 0)
                return false;
        }
    }

    /**
     * @return int[]
     */
    public function getPrimes()
    {
        return $this->primes ?: $this->readFirst50kPrimes();
    }

    /**
     * @param int $n
     * @return int
     */
    public function getNthPrime($n)
    {
        $primes = $this->getPrimes();
        return $primes[$n - 1];
    }

    /**
     * @param int $n
     * @return int[]
     */
    public function getPrimesTo($n)
    {
        if ($n > self::MAX_IN_FILE)
            return $this->getPrimes();

        $primes = array();

        foreach ($this->getPrimes() as $p)
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
        $factors = array();

        $primes = $this->getPrimesTo(ceil(sqrt($n)));
        foreach ($primes as $prime)
        {
            if ($f->isFactor($prime, $n))
                $factors[] = $prime;
        }

        return $factors;
    }

    /**
     * @return int[]
     */
    protected function readFirst50kPrimes()
    {
        $lines = file(realpath(__DIR__ . '/../../resources/first_50k_primes.txt'));
        foreach ($lines as $line)
        {
            foreach (str_split($line, 7) as $prime)
            {
                $prime = trim($prime);
                if (! empty($prime))
                    $this->primes[] = $prime;
            }
        }

        return $this->primes;
    }
}
