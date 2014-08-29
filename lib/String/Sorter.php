<?php namespace String;

/**
 * This class is responsible for sorting strings
 */
class Sorter
{
    /**
     * @param string $string
     * @return string
     */
    public function sortCharacters($string)
    {
        $chars = str_split($string);
        sort($chars);
        return implode('', $chars);
    }

    /**
     * compare 2 strings by their characters
     * @param string $a
     * @param string $b
     * @return bool
     */
    public function compare($a, $b)
    {
        return $this->sortCharacters($a) == $this->sortCharacters($b);
    }
}
