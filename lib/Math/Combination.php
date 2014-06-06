<?php namespace Math;

class Combination
{
    /** @var int */
    protected $countdown;


    /**
     * get amount of combinations of $r in $n
     * @param $n
     * @param $r
     * @return float
     */
    public function nCr($n, $r)
    {
        // C(n,r) = n! / (r! * (n-r)! )
        return $this->fact($n) / ($this->fact($r) * $this->fact($n - $r));
    }

    /**
     * get amount of permutations of $r in $n
     * @param $n
     * @param $r
     * @return float
     */
    public function nPr($n, $r)
    {
        // P(n,r) = n! / (n-r)!
        return $this->fact($n) / $this->fact($n - $r);
    }

    /**
     * return n!
     * @param $n
     * @return int
     */
    public function fact($n)
    {
        $fac = 1;  // 0! = 1! = 1
        for ($i = 2; $i <= $n; $i++)
            $fac *= $i;

        return $fac;
    }

    /**
     * find nth lexicographic permutation of $pool
     * A lexicographic permutation is an alphabetically ordered list of permutations
     *
     * @param string $pool
     * @param int $index
     * @return string
     */
    public function findLexicographicPermutationAtIndex($pool, $index)
    {
        $this->countdown = $index;
        $pool = array_unique(str_split($pool));
        sort($pool);
        return $this->traversePermutations($pool);
    }

    protected function traversePermutations(array $pool, array $taken = array())
    {
        $left = array_diff($pool, $taken);
        $takenNow = $taken;
        foreach ($left as $val)
        {
            $takenNow[] = $val;
            echo PHP_EOL.implode('', $takenNow);
            if (count($left) == 1)
            {
                if ($this->countdown-- == 0)
                    return implode('', $takenNow);
            }
            else
            {
                $result = $this->traversePermutations($left, $takenNow);
                if (! empty($result))
                    return $result;
            }
        }
    }
}
