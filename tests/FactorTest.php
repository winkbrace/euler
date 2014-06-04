<?php namespace Math; 

class FactorTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Math\Factor */
    protected $factor;

    public function setUp()
    {
        $this->factor = new Factor();
    }

    public function testIsFactor()
    {
        $this->assertTrue($this->factor->isFactor(2, 8));
        $this->assertFalse($this->factor->isFactor(3, 8));
    }

    public function testGetFactors()
    {
        $this->assertEquals(array(1), $this->factor->getFactors(1));
        $this->assertEquals(array(1, 2), $this->factor->getFactors(2));
        $this->assertEquals(array(1, 3, 9), $this->factor->getFactors(9));
        $this->assertEquals(array(1, 2, 5, 10), $this->factor->getFactors(10));
        $this->assertEquals(array(1, 2, 3, 4, 6, 8, 12, 24), $this->factor->getFactors(24));
        $this->assertEquals(array(1, 7, 49), $this->factor->getFactors(49));
    }

    public function testGetPrimeFactors()
    {
        $this->assertEquals(array(2, 3), $this->factor->getPrimeFactors(24));
    }

    public function testGetSmallestFactorStepOfRange()
    {
        // range 10 .. 20 -> primes are 11, 13, 17, 19 -> product = 46189
        $this->assertEquals(46189, $this->factor->getSmallestFactorStepOfRange(10, 20));
    }

    public function testGetSmallestMultipleOfRange()
    {
        $this->assertEquals(12, $this->factor->getSmallestMultipleOfRange(1, 4));
        $this->assertEquals(232792560, $this->factor->getSmallestMultipleOfRange(10, 20));
    }
}