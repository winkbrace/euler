<?php namespace Math;

class FractionTest extends \PHPUnit_Framework_TestCase
{
    /** @var \Math\Fraction */
    protected $fraction;

    public function setUp()
    {
        $this->fraction = new Fraction();
    }

    public function testGetFraction()
    {
        $this->assertEquals('0.0014285', $this->fraction->getFraction(1, 700, 7));
    }

    public function testGetFractionGreaterThan1()
    {
        $this->assertEquals('166.6666666', $this->fraction->getFraction(500, 3, 7));
    }

    public function testGetRecurringCycle()
    {
        $n = '3.333333333333333333333333';
        $this->assertEquals('3', $this->fraction->getRecurringCycle($n));
    }

    public function testGetTougherRecurringCycle()
    {
        $n = $this->fraction->getFraction(1, 7, 100);
        $this->assertEquals('142857', $this->fraction->getRecurringCycle($n));
    }

    public function testSimplify()
    {
        list($n, $d) = $this->fraction->simplify(2, 10);
        $this->assertEquals(5, $d);
        $this->assertEquals(1, $n);
    }

    public function testComplexerSimplify()
    {
        list($n, $d) = $this->fraction->simplify(3*5*2*2*7, 3*5*2*2*6*11);
        $this->assertEquals(66, $d);
        $this->assertEquals(7, $n);
    }
}
