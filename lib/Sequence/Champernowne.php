<?php namespace Sequence; 

class Champernowne
{
    /** @var string */
    protected $sequence;
    /** @var int */
    protected $iteration;

    public function __construct()
    {
        $this->sequence = '';
        $this->iteration = 0;
    }

    /**
     * return sequence of specified length WITHOUT leading "0."
     * @param int $length
     * @return string
     */
    public function createSequenceTo($length)
    {
        while (strlen($this->sequence) <= $length + 1)
            $this->next();

        return substr($this->sequence, 0, $length);
    }

    protected function next()
    {
        $this->sequence .= ++$this->iteration;
    }

    /**
     * @return string
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    public function getDigitAtPosition($n)
    {
        if ($n <= 9)
            return $n;

        $numberLength = 1;
        while ($this->getLastPositionOfNDigits($numberLength) < $n)
            $numberLength++;

        // the string length left
        $left = $n - $this->getLastPositionOfNDigits($numberLength-1) - 1;
        // the first number of the $left string
        $start = pow(10, $numberLength-1);
        // get the number at position n
        $nr = (string) ($start + floor($left / $numberLength));
        // get the position in the number
        $strpos = $left % $numberLength;

//        if ($n >= 190)  // 11e = de 0 van 10
//            vd($n, $left, $numberLength, $start, $nr, $strpos, $nr[$strpos]);

        return $nr[$strpos];
    }

    protected function getLastPositionOfNDigits($n)
    {
        // f(1) = 1 * 9  = $n * (9 * pow(10, $n-1)) = 1 * 9 * 1
        // f(2) = 2 * 90 = $n * (9 * pow(10, $n-1)) = 2 * 9 * 10
        // s(n) = f(1) + .. f(n)
        $sum = 0;
        for ($i=1; $i<=$n; $i++)
            $sum += ($i * 9 * pow(10, $i-1));
        return $sum;
    }
}