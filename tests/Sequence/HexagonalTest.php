<?php namespace Sequence; 

class HexagonalTest extends \PHPUnit_Framework_TestCase
{
    /** @var Hexagonal */
    protected $hex;

    public function setUp()
    {
        $this->hex = new Hexagonal();
    }

    public function testCreation()
    {
        $this->assertInstanceOf('\\Sequence\\Hexagonal', $this->hex);
    }

    public function testGetNumberAt()
    {
        $this->assertEquals(1, $this->hex->getNumberAt(1));
        $this->assertEquals(45, $this->hex->getNumberAt(5));
    }

    public function testGetIndexOf()
    {
        $this->assertEquals(1, $this->hex->getIndexOf(1));
        $this->assertEquals(5, $this->hex->getIndexOf(45));
    }

    public function testCreateSequence()
    {
        $seq = $this->hex->createSequenceTo(100);
        $expected = array(1 => 1, 6, 15, 28, 45, 66, 91);
        $this->assertEquals($expected, $seq);
    }
}
 