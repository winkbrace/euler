<?php namespace String;

class AlphabetTest extends \PHPUnit_Framework_TestCase
{
    public function testGetWordValue()
    {
        $a = new Alphabet();
        $this->assertEquals(3, $a->getWordValue('aaa'));
        $this->assertEquals(53, $a->getWordValue('COLIN'));
    }

}
