<?php namespace Sequence; 

class SquareTest extends \PHPUnit_Framework_TestCase
{
    /** @var Square */
    protected $square;

    public function setUp()
    {
        $this->square = new Square();
    }

    public function testIsSquare()
    {
        $this->assertTrue($this->square->isSquare(1));
        $this->assertTrue($this->square->isSquare(9));
        $this->assertFalse($this->square->isSquare(2));
    }
}
 