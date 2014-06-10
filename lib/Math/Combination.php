<?php namespace Math;

class Combination
{
    /** @var int */
    protected $countdown;
    /** @var array */
    protected $permutations;


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
        $permutations = $this->createPermutations($pool);
        return $permutations[$index - 1];
    }

    /**
     * @param string $pool
     * @return array
     */
    public function createPermutations($pool)
    {
        $pool = array_unique(str_split($pool));
        sort($pool);

        $this->permutations = array();
        $this->gatherPermutations($pool);
        sort($this->permutations);

        return $this->permutations;
    }

    /**
     * This is not ideal, because the permutations are not created in sequence. Therefore
     * the result needs to be ordered after gathering.
     * @param array $pool
     * @param array $permutations
     */
    protected function gatherPermutations(array $pool, array $permutations = array())
    {
        if (empty($pool))
            $this->permutations[] = implode('', $permutations);

        for ($i = count($pool) - 1; $i >= 0; --$i)
        {
            $newPool = $pool;
            $newPermutations = $permutations;
            list($foo) = array_splice($newPool, $i, 1);
            array_unshift($newPermutations, $foo);

            $this->gatherPermutations($newPool, $newPermutations);
        }
    }
}
