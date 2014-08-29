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
     * compare all parameters by their characters
     * @return bool
     */
    public function compare()
    {
        $first = null;
        foreach (func_get_args() as $str)
        {
            if (empty($first))
                $first = $this->sortCharacters($str);
            elseif ($this->sortCharacters($str) != $first)
                return false;
        }
        return true;
    }
}
