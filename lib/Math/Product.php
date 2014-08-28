<?php namespace Math;

class Product
{
    /**
     * @param int[] $numbers
     * @param int $combinationSize optional parameter to have only the products of combinations of a certain amount of numbers
     * @return int[]
     */
    public function getAllProducts(array $numbers, $combinationSize = null)
    {
        $c = new Combinatorics();
        $products = array();

        for ($r=2; $r<=count($numbers); $r++) // start at 2 to avoid getting the original numbers back
        {
            if (empty($combinationSize) || $r == $combinationSize)
            {
                foreach ($c->createCombinations($numbers, $r) as $combo)
                    $products[array_product($combo)] = 1;
            }
        }

        ksort($products);

        return array_keys($products);
    }
}