<?php namespace String;

use Util\Arrays;

class Alphabet
{
    /** @var array */
    protected $alphabet;

    public function __construct()
    {
        $this->initAlphabet();
    }

    /**
     * @param string $word
     * @return int
     */
    public function getWordValue($word)
    {
        $a = array_flip($this->alphabet);

        $value = 0;

        $letters = str_split(strtolower($word));
        foreach ($letters as $letter)
            $value += $a[$letter];

        return $value;
    }

    protected function initAlphabet()
    {
        $this->alphabet = range('a', 'z');

        // move all keys 1 up so 1 = a and 26 = z
        Arrays::incrementKeys($this->alphabet);
    }
}
