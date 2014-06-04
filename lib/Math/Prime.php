<?php namespace Math; 

class Prime
{
    const MAX_IN_FILE = 611953;

    /** @var int[] */
    protected $primes = array();

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
        $lines = file(realpath(__DIR__ . '/../resources/first_50k_primes.txt'));
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