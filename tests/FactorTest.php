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

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIsFactorWithZero()
    {
        $this->assertTrue($this->factor->isFactor(0, 8));
    }

    public function testGetFactors()
    {
        $this->assertEquals(array(1, 2, 5), $this->factor->getFactors(10));
        $this->assertEquals(array(1, 2, 3, 4, 6, 8, 12), $this->factor->getFactors(24));
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
