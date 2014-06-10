<?php namespace Util; 

class BitsTest extends \PHPUnit_Framework_TestCase
{
    public function testGetOnPositions()
    {
        // 19 = 10011
        $positions = Bits::getOnPositions(19);
        $expected = array(0, 3, 4);
        $this->assertEquals($expected, $positions);

        // 2 = 10
        $positions = Bits::getOnPositions(2);
        $expected = array(0);
        $this->assertEquals($expected, $positions);

        $positions = Bits::getOnPositions(0b111001);
        $expected = array(0, 1, 2, 5);
        $this->assertEquals($expected, $positions);
    }
}