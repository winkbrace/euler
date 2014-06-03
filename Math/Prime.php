<?php namespace Math; 

class Prime
{
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

        return in_array($n, $this->getPrimes());
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
     * @return int[]
     */
    public function getPrimesTo($n)
    {
        if ($n > 611953)
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
        $factors = array();

        $primes = $this->getPrimesTo(ceil(sqrt($n)));
        foreach ($primes as $prime)
        {
            if ($this->isFactor($prime, $n))
                $factors[] = $prime;
        }

        return $factors;
    }

    /**
     * @param int $x
     * @param int $n
     * @return bool
     */
    public function isFactor($x, $n)
    {
        return gmp_strval(gmp_div_r("$n", "$x")) == '0';
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