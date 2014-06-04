<?php namespace String; 

class NumberWords
{
    protected $word;

    /**
     * convert number to written out words
     * @param int $n
     * @return string
     */
    public function convert($n)
    {
        if (strlen($n) == 1)
            return $this->convertDigit($n);

        $teens = $this->convertTeens(substr($n, -2));
        if (strlen($n) == 2)
            return $teens;

        if (strlen($n) == 3)
        {
            $str = $this->convertDigit(substr($n, 0, 1)) . ' hundred';
            if (! empty($teens))
                $str .= ' and ' . $teens;
            return $str;
        }
    }

    /**
     * @param int $digit
     * @return string
     */
    protected function convertDigit($digit)
    {
        switch ($digit)
        {
            case 0: return '';
            case 1: return 'one';
            case 2: return 'two';
            case 3: return 'three';
            case 4: return 'four';
            case 5: return 'five';
            case 6: return 'six';
            case 7: return 'seven';
            case 8: return 'eight';
            case 9: return 'nine';
        }
    }

    /**
     * convert last 2 digits of number
     * @param string $number
     * @return string
     */
    protected function convertTeens($number)
    {
        if ($number == '00')
        {
            return '';
        }
        elseif ($number[0] == 1)
        {
            return $this->convertTeen($number);
        }
        else
        {
            $str = $this->convertTens($number[0]);
            if ($number[1] > 0)
                $str .= '-' . $this->convertDigit($number[1]);

            return $str;
        }
    }

    /**
     * convert numbers between 10 and 19
     * @param $number
     * @return string
     */
    protected function convertTeen($number)
    {
        switch ($number)
        {
            case 10: return 'ten';
            case 11: return 'eleven';
            case 12: return 'twelve';
            case 13: return 'thirteen';
            case 14: return 'fourteen';
            case 15: return 'fifteen';
            case 16: return 'sixteen';
            case 17: return 'seventeen';
            case 18: return 'eighteen';
            case 19: return 'nineteen';
        }
    }

    /**
     * convert tens from 20 to 90 (20, 30, etc.)
     * @param $digit
     * @return string
     */
    protected function convertTens($digit)
    {
        switch ($digit)
        {
            case 2: return 'twenty';
            case 3: return 'thirty';
            case 4: return 'forty';
            case 5: return 'fifty';
            case 6: return 'sixty';
            case 7: return 'seventy';
            case 8: return 'eighty';
            case 9: return 'ninety';
        }
    }
}