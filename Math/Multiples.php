<?php namespace Math; 

class Multiples
{
    /**
     * get multiples of $n from 0 up to and NOT including $max
     *
     * @param int $n
     * @param int $max
     * @return array
     */
    public function getMultiplesBelow($n, $max)
    {
        $multiples = array();
        for ($i = $n; $i < $max; $i += $n)
            $multiples[] = $i;

        return $multiples;
    }
} 