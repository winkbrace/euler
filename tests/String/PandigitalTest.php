<?php namespace String; 

class PandigitalTest extends \PHPUnit_Framework_TestCase
{
    /** @var \String\Pandigital */
    protected $pandigital;

    public function setUp()
    {
        $this->pandigital = new Pandigital();
    }

    public function testIsPandigital()
    {
        $this->assertTrue($this->pandigital->isPandigital('31524'));
    }

    public function testIsNotPandigital()
    {
        $this->assertFalse($this->pandigital->isPandigital('3000'));
    }
}
 