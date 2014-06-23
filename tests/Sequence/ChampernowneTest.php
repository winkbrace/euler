<?php namespace Sequence; 

class ChampernowneTest extends \PHPUnit_Framework_TestCase
{
    /** @var Champernowne */
    protected $champ;

    public function setUp()
    {
        $this->champ = new Champernowne();
    }

    public function testGetDigitAtPositionSingleDigit()
    {
        $this->assertEquals(5, $this->champ->getDigitAtPosition(5));
        $this->assertEquals(9, $this->champ->getDigitAtPosition(9));
    }

    public function testGetDigitAtPositionDoubleDigit()
    {
        $this->assertEquals(1, $this->champ->getDigitAtPosition(10));
        $this->assertEquals(0, $this->champ->getDigitAtPosition(11));
        $this->assertEquals(1, $this->champ->getDigitAtPosition(14));
        $this->assertEquals(2, $this->champ->getDigitAtPosition(15));
    }

    public function testGetDigitAtPositionTripleDigit()
    {
        // triple digits start after 9 + 90*2 = 189
        $seq = $this->champ->createSequenceTo(350);
        //var_dump(substr($seq, 189-1, 20));

        $this->assertEquals($seq[189-1], $this->champ->getDigitAtPosition(189)); // this is actually 2 digits: 99
        $this->assertEquals($seq[190-1], $this->champ->getDigitAtPosition(190));
        $this->assertEquals($seq[330-1], $this->champ->getDigitAtPosition(330));
        $this->assertEquals($seq[331-1], $this->champ->getDigitAtPosition(331));
    }
}
 