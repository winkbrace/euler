<?php namespace Math; 

class MultiplesTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $m = new Multiples();
        $this->assertInstanceOf('\\Math\\Multiples', $m);
    }

    public function testGetMultiples()
    {
        $m = new Multiples();
        $actual = $m->getMultiplesTo(5, 30);
        $expected = array(5, 10, 15, 20, 25, 30);
        $this->assertEquals($expected, $actual);
    }
}
