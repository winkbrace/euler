<?php namespace Math; 

class Pythagoras
{
    /**
     * @param int $p
     * @return array
     */
    public function findLengthsForPerimeter($p)
    {
        $results = array();
        for ($a=1; $a<$p-2; $a++) {
            for ($b=$a+1; $b<$p-2; $b++) {
                $c = $p - $a - $b;
                if ($c < 1)
                    break;
                if ($c == sqrt(pow($a, 2) + pow($b, 2)))
                    $results[] = [$a, $b, $c];
            }
        }
        return $results;
    }
} 