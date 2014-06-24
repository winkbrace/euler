<?php namespace Math;

use String\Rotation;

class Prime
{
    const MAX_IN_FILE = 1299827;

    /** @var int[] */
    protected $primes = array();
    /** @var array */
    protected $flippedPrimes = array();

    /** @var \Math\Prime */
    protected static $instance;


    protected function __construct()
    {
        $this->readFirst100kPrimes();
    }

    /**
     * It is handy to have only 1 Prime instance, so the file with first 100k primes will only be read once.
     * @return \Math\Prime
     */
    public static function getInstance()
    {
        if (empty(static::$instance))
            static::$instance = new static();

        return static::$instance;
    }

    /**
     * @param int $n
     * @return bool
     */
    public function isPrime($n)
    {
        if ($n < 2)
            return false;

        if ($n > static::MAX_IN_FILE)
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
                $this->primes[] = $n;
                $this->flippedPrimes[$n] = ++$count;
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
        if ($n > static::MAX_IN_FILE)
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
        $factors = array();

        $primes = $this->getPrimesTo(ceil(sqrt($n)));
        foreach ($primes as $prime)
        {
            if ($f->isFactor($prime, $n))
                $factors[] = $prime;
        }

        return $factors;
    }

    protected function readFirst100kPrimes()
    {
        $i = 0;
        $lines = file(realpath(__DIR__ . '/../../resources/first_100k_primes.txt'));
        foreach ($lines as $line)
        {
            foreach (str_split($line, 8) as $prime)
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
    }
}
