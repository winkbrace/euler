<?php namespace String; 

class CommonDigits
{
    /**
     * @param string $a
     * @param string $b
     * @return string|false
     */
    public static function getCommonDigit($a, $b)
    {
        if (strlen($a) == 1)
            return false;
        if ($a[1] == '0') // considered trivial
            return false;

        foreach (str_split($a) as $digit)
        {
            if (strpos($b, $digit) !== false)
                return $digit;
        }
        return false;
    }

    /**
     * @param string $a
     * @param string $b
     * @param string $digit
     * @return array
     */
    public static function removeCommonDigits($a, $b, $digit)
    {
        $a = $a[0] == $digit ? $a[1] : $a[0];
        $b = $b[0] == $digit ? $b[1] : $b[0];
        return array($a, $b);
    }
} 