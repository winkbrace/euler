<?php namespace Util; 

class Bits
{
    /**
     * find the binary ones in a given number
     * @param int $n
     * @return array
     */
    public static function getOnPositions($n)
    {
        $positions = array();
        // move from highest power of 2 to 0 to get the positions ordered from left to right
        $max = (int) floor(log($n, 2));
        for ($i=$max; $i>=0; $i--)
        {
            $p = pow(2, $i);
            if ($n & $p)
                $positions[] = $max - $i;
        }

        return $positions;
    }
} 