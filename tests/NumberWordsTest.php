<?php namespace Math; 

use String\NumberWords;

class NumberWordsTest extends \PHPUnit_Framework_TestCase
{
    public function testConvertSingleDigit()
    {
        $n = new NumberWords();
        $this->assertEquals('three', $n->convert(3));
        $this->assertEquals('nine', $n->convert(9));
    }

    public function testConvertDoubleDigit()
    {
        $n = new NumberWords();
        $this->assertEquals('thirty-four', $n->convert(34));
        $this->assertEquals('eighty-two', $n->convert(82));
        $this->assertEquals('thirty', $n->convert(30));
    }

    public function testConvertTeen()
    {
        $n = new NumberWords();
        $this->assertEquals('eighteen', $n->convert(18));
        $this->assertEquals('ten', $n->convert(10));
    }

    public function testConvertTripleDigits()
    {
        $n = new NumberWords();
        $this->assertEquals('three hundred and ten', $n->convert(310));
        $this->assertEquals('two hundred', $n->convert(200));
    }
}
