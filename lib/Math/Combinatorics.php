<?php namespace Math;

class Combinatorics
{
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
     * @param array|string $pool
     * @param int $r combination group size. If null all sizes will be created
     * @return int[]
     */
    public function createCombinations($pool, $r = null)
    {
        if (is_string($pool))
            $pool = str_split($pool);

        $combinations = array();

        for ($i=1; $i<=count($pool); $i++)
        {
            if (empty($r) || $r == $i)
            {
                foreach ($this->createCombinationsOfSize($pool, $i) as $combo)
                    $combinations[] = $combo;
            }
        }

        return $combinations;
    }

    protected function createCombinationsOfOne(array $pool)
    {
        $combinations = array();

        foreach ($pool as $x)
            $combinations[] = array($x);

        return $combinations;
    }

    /**
     * @param array $pool
     * @param int $r
     * @return array
     */
    protected function createCombinationsOfSize(array $pool, $r)
    {
        if (count($pool) < $r)
            return array();

        if ($r == 1)
            return $this->createCombinationsOfOne($pool);

        $combinations = array();

        $x = array_shift($pool);
        foreach ($this->createCombinationsOfSize($pool, $r-1) as $combo)
        {
            array_unshift($combo, $x);
            $combinations[] = $combo;
        }

        foreach ($this->createCombinationsOfSize($pool, $r) as $c)
            $combinations[] = $c;

        return $combinations;
    }

    /**
     * find nth lexicographic permutation of $pool
     * A lexicographic permutation is an alphabetically ordered list of permutations
     *
     * @param string|array $pool
     * @param int $index
     * @return string
     */
    public function findLexicographicPermutationAtIndex($pool, $index)
    {
        /*
         * Let's enumerate the permutations starting with index 0. Then were going to find the permutation with
         * index 999999. The permutation with index 0 is 0123456789. We shall also enumerate the digits
         * "available for use" in the same way, i.e. starting with index 0. At the beginning, those digits will
         * be 0123456789 (in that order). We now write 999999 = 2 * 9! + 274239. The quotient 2 gives the index
         * (in 0123456789) of the first digit: 2. Remove that digit from the available digits: 013456789.
         * Next, we write 274239 = 6 * 8! + 32319. The quotient 6 again gives the index (now in 013456789) of
         * the second digit: 7. Remove that digit from the available digits: 01345689. Continue in this way,
         * dividing by n!, until (including) n=0. The quotients will be (from the beginning):
         * 2, 6, 6, 2, 5, 1, 2, 1, 1 and 0, giving the digits 2, 7, 8, 3, 9, 1, 5, 4, 6 and 0.
         * The searched for permutation is: 2783915460
         */

        if (is_string($pool))
            $pool = str_split($pool);
        sort($pool);

        $goal = $index - 1;
        $result = '';

        for ($i=count($pool)-1; $i>=0; $i--) // we loop over the lengths
        {
            $fact = $this->fact($i);
            $q = (int) ($goal / $fact);
            $taken = array_splice($pool, $q, 1);  // remove the item at index == quotient from the pool
            $result .= $taken[0];

            $goal = $goal % $fact;
        }

        return $result;
    }

    /**
     * In a permutation the order matters
     * @param string|array $pool
     * @return array
     */
    public function createPermutations($pool)
    {
        if (is_string($pool))
            $pool = str_split($pool);
        sort($pool);

        $this->permutations = array();
        $this->gatherPermutations($pool);
        sort($this->permutations);

        return $this->permutations;
    }

    /**
     * This is not ideal, because the permutations are not created in sequence.
     * Therefore the result needs to be ordered after gathering.
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
