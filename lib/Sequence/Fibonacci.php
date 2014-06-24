<?php namespace Sequence;

use Util\Integer;

class Fibonacci extends Sequence
{
    /** @var resource */
    protected $rootFive;
    /** @var resource */
    protected $posPhi;
    /** @var resource */
    protected $negPhi;

    public function __construct()
    {
        $this->sequence = array(1 => gmp_init(1), 2 => gmp_init(1));
        $this->index = 2;

        $this->rootFive = gmp_sqrt(gmp_init(5));
        $this->posPhi = (1 + sqrt(5)) / 2;
        $this->negPhi = (1 - sqrt(5)) / 2;
    }

    /**
     * @return string
     */
    public function next()
    {
        $sum = $this->getSumOfLastTwoDigits();
        $this->setNextValue($sum);

        return gmp_strval($sum);
    }

    /**
     * @param int|resource $max
     * @return array
     */
    public function createSequenceTo($max)
    {
        $sum = $this->getSumOfLastTwoDigits();
        $max = is_resource($max) ? $max : gmp_init($max);
        while (gmp_cmp($sum, $max) == -1)
        {
            $this->setNextValue($sum);
            $sum = $this->getSumOfLastTwoDigits();
        }

        return $this->sequence;
    }

    /**
     * @param resource $sum
     */
    protected function setNextValue($sum)
    {
        $this->sequence[++$this->index] = $sum;
    }

    /**
     * @return resource
     */
    protected function getSumOfLastTwoDigits()
    {
        return gmp_add($this->sequence[$this->index - 1], $this->sequence[$this->index]);
    }

    /**
     * @return array
     */
    public function getSequence()
    {
        $seq = array();
        foreach ($this->sequence as $n)
            $seq[] = gmp_strval($n);

        return $seq;
    }

    public function getNumberAt($x)
    {
        // y(x) = (Phi^x - (phi)^x)/Sqrt(5)
        // Phi=(1+Sqrt[5])/2  and  phi=(1-Sqrt[5])/2 = -1 / Phi

        return (pow($this->posPhi, $x) - pow($this->negPhi, $x)) / sqrt(5);
    }

    public function getIndexOf($n)
    {
        // actually it is (5x^2 +/- 4), but for positive integers probably always +

        // a = $n * sqrt(5)
        // b = 5 * pow($n, 2) + 4)
        // x = (a + sqrt(b)) / 2
//        $y = gmp_init($n);
//        $a = gmp_mul($y, $this->rootFive);
//        $b = gmp_add(gmp_mul(gmp_init(5), gmp_pow($y, 2)), gmp_init(4));
//        $x = gmp_div_q(gmp_add($a, gmp_sqrt($b)), gmp_init(2));
//        $x = gmp_strval($x);
        // wtf... there is no gmp_log() :'(

        $x = (($n * sqrt(5)) + sqrt(5 * pow($n, 2) + 4)) / 2;

        return round(log($x, $this->posPhi), 2); // I have to round because float precision
    }

    public function createSequenceOfLength($n)
    {
        // TODO: Implement createSequenceOfLength() method.
    }

    public function isFibonacci($n)
    {
        $i = $this->getIndexOf($n);
        return Integer::isInteger($i);
    }
}