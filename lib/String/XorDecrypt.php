<?php namespace String;

/**
 * Class XorDecrypt
 *
 * copied from hacker.org project
 * This class is responsible for xor-decrypting strings
 */
class XorDecrypt
{

    /**
     * xor decrypt hexadecimal string with decimal key
     * @param string $string
     * @param number $key (must be byte, so between 0 and 255)
     * @param int $base (10 = dec, 16 = hex, 2 = bin)
     * @return string
     */
    public function decrypt($string, $key, $base = 10)
    {
        $bs = $this->convertToBinary($string, $base);
        $bk = gmp_init($key); // create gmp resource for key

        $decrypted = '';
        for ($i=0; $i<strlen($bs); $i+=8)
        {
            $byte = substr($bs, $i, 8);
            $bb = gmp_init($byte, 2); // create gmp resource for this byte
            $result = gmp_xor($bb, $bk);
            $ascii = gmp_strval($result, 10);
            $decrypted .= chr($ascii);
        }

        return $decrypted;
    }

    /**
     * @param string $string
     * @param int $base
     * @throws \InvalidArgumentException
     * @return string
     */
    private function convertToBinary($string, $base)
    {
        switch ($base)
        {
            case 10: return decbin($string);
            case 16: return $this->hexbin($string);
            case 2: return $string;
            default: throw new \InvalidArgumentException('Invalid number base provided: '.$base);
        }
    }

    /**
     * perform sanity check on result string to not accept weird characters in a result
     * @param string $string
     * @return boolean
     */
    public function sanity_check($string)
    {
        foreach (str_split($string) as $c)
        {
            $ascii = ord($c);
            if ($ascii > 122 or $ascii < 32)
                return false;
        }
        return true;
    }

    public function hexbin($hex)
    {
        $bin = '';
        $hex = array_reverse(str_split($hex));
        foreach($hex as $n)
        {
            $n = hexdec($n);
            for($i = 1; $i <= 8; $i <<= 1)
            {
                $bin .= ($i & $n) ? '1' : '0';
            }
        }
        return ltrim(strrev($bin));
    }

}