<?php namespace Math;

class AmicableTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAmicablePartner()
    {
        $amicable = new Amicable();
        $a = 220;
        $b = $amicable->getAmicablePartner($a);

        $this->assertEquals(284, $b);
    }

    public function testHasNoAmicablePartner()
    {
        $amicable = new Amicable();
        $this->assertFalse($amicable->getAmicablePartner(1));
        $this->assertFalse($amicable->getAmicablePartner(10));
    }

    public function testGetAmicableNumbersTo()
    {
        $amicable = new Amicable();
        $numbers = $amicable->getAmicableNumbersTo(10);
        $this->assertSame(array(), $numbers);
    }
}
