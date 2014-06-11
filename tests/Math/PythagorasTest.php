<?php namespace Math; 

class PythagorasTest extends \PHPUnit_Framework_TestCase
{
    public function testFindLengthsForPerimeter()
    {
        $p = new Pythagoras();
        $actual = $p->findLengthsForPerimeter(120);
        $expected = array(
            [20, 48, 52],
            [24, 45, 51],
            [30, 40, 50],
        );
        $this->assertEquals($expected, $actual);
    }

    public function test345()
    {
        $p = new Pythagoras();
        $this->assertEquals([[3, 4, 5]], $p->findLengthsForPerimeter(12));
    }
}
 