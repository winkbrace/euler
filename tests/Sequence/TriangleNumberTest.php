<?php namespace Sequence;

class TriangleNumberTest extends \PHPUnit_Framework_TestCase
{
    /** @var TriangleNumber */
    protected $triangle;
    
    public function setUp()
    {
        $this->triangle = new TriangleNumber();
    }
    
    public function testCreation()
    {
        $this->assertInstanceOf('\\Sequence\\TriangleNumber', $this->triangle);
    }

    public function testGetNumberAt()
    {
        $this->assertEquals(1, $this->triangle->getNumberAt(1));
        $this->assertEquals(3, $this->triangle->getNumberAt(2));
        $this->assertEquals(28, $this->triangle->getNumberAt(7));
    }
    
    public function testGetIndexOf()
    {
        $this->assertEquals(5, $this->triangle->getIndexOf(15));
        $this->assertEquals(1, $this->triangle->getIndexOf(1));
        $this->assertEquals(7, $this->triangle->getIndexOf(28));
    }

    public function testIsTriangleNumber()
    {
        $this->assertTrue($this->triangle->isTriangleNumber(15));
        $this->assertTrue($this->triangle->isTriangleNumber(1));
        $this->assertFalse($this->triangle->isTriangleNumber(14));
    }
}
