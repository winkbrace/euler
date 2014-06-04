<?php namespace Math; 

class Combinations
{
    public function nCr($n, $r)
    {
        // C(n,r) = n! / (r! * (n-r)! )
        return $this->fac($n) / ($this->fac($r) * $this->fac($n - $r));
    }

    public function nPr($n, $r)
    {
        // P(n,r) = n! / (n-r)!
        return $this->fac($n) / $this->fac($n - $r);
    }

    public function factorial($n)
    {
        $fac = 1;  // 0! = 1! = 1
        for ($i = 2; $i <= $n; $i++)
            $fac *= $i;

        return $fac;
    }

    public function fac($n)
    {
        return $this->factorial($n);
    }
} 