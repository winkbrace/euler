<?php namespace Math;

class PrimeTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Math\Prime */
    protected $prime;

    public function setUp()
    {
        $this->prime = Prime::getInstance();
    }

    public function testZero()
    {
        $this->assertFalse($this->prime->isPrime(0));
    }

    public function testOne()
    {
        $this->assertFalse($this->prime->isPrime(1));
    }

    public function testTwo()
    {
        $this->assertTrue($this->prime->isPrime(2));
    }

    public function testThree()
    {
        $this->assertTrue($this->prime->isPrime(3));
    }

    public function testFour()
    {
        $this->assertFalse($this->prime->isPrime(4));
    }

    public function testEleven()
    {
        $this->assertTrue($this->prime->isPrime(11));
    }

    public function test103()
    {
        $this->assertFalse($this->prime->isPrime(102));
        $this->assertTrue($this->prime->isPrime(103));
    }

    public function testGetPrimesTo()
    {
        $actual = $this->prime->getPrimesTo(20);
        $expected = array(2, 3, 5, 7, 11, 13, 17, 19);
        $this->assertEquals($expected, $actual);
    }

    public function testGetPrimeFactors()
    {
        $actual = $this->prime->getPrimeFactorsOf(13195);
        $expected = array(5, 7, 13, 29);
        $this->assertEquals($expected, $actual);
    }

    public function testGetNthPrime()
    {
        $this->assertEquals(13, $this->prime->getNthPrime(6));
    }

    public function testCircularPrime()
    {
        $this->assertTrue($this->prime->isCircularPrime(13));  // 13 and 31 are prime
    }

    public function testIsTruncatable()
    {
        $this->assertTrue($this->prime->isTruncatable(3797));
        $this->assertFalse($this->prime->isTruncatable(269));
    }

    // this test is working, but takes 3 seconds, so commented out
    /*
    public function testRead1M()
    {
        $prime = Prime::getInstance('1M');
        $this->assertInstanceOf('\\Math\\Prime', $prime);
        $this->assertCount(1000000, $prime->getPrimes());
        $this->assertEquals(15485863, $prime->getMaxInFile());
    }
    */
}