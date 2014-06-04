<?php namespace Math; 

class CombinationsTest extends \PHPUnit_Framework_TestCase
{
    public function testFac()
    {
        $c = new Combinations();
        $this->assertEquals(24, $c->fac(4));
    }

    public function testNPr()
    {
        $c = new Combinations();
        $this->assertEquals(1320, $c->nPr(12, 3));
    }

    public function testNCr()
    {
        $c = new Combinations();
        $this->assertEquals(3060, $c->nCr(18, 4));
    }
}
