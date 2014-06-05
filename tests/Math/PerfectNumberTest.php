<?php namespace Math;

class PerfectNumberTest extends \PHPUnit_Framework_TestCase
{
    /** @var PerfectNumber */
    protected $pn;

    public function setUp()
    {
        $this->pn = new PerfectNumber();
    }

    public function testIsPerfect()
    {
        $this->assertFalse($this->pn->isPerfect(27));
        $this->assertTrue($this->pn->isPerfect(28));
    }

    public function testIsDeficient()
    {
        // divisors of 8 => 1, 2, 4 => 7
        $this->assertTrue($this->pn->isDeficient(8));
        // 12 => 1, 2, 3, 4, 6 => 16
        $this->assertFalse($this->pn->isDeficient(12));
    }

    public function testIsAbundant()
    {
        // divisors of 8 => 1, 2, 4 => 7
        $this->assertFalse($this->pn->isAbundant(8));
        // 12 => 1, 2, 3, 4, 6 => 16
        $this->assertTrue($this->pn->isAbundant(12));
        // first odd abundant number
        $this->assertTrue($this->pn->isAbundant(945));
    }

    public function testFindAbundantNumbersUpTo()
    {
        $a = $this->pn->findAbundantNumbersUpTo(50);
        $this->assertEquals(array(12, 18, 20, 24, 30, 36, 40, 42, 48), $a);
    }
}
