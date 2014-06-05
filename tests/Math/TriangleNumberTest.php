<?php namespace Math; 

class TriangleNumberTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $t = new TriangleNumber();
        $this->assertInstanceOf('\\Math\\TriangleNumber', $t);
    }

    public function testGetNumberAt()
    {
        $t = new TriangleNumber();
        $this->assertEquals(1, $t->getNumberAt(1));
        $this->assertEquals(3, $t->getNumberAt(2));
        $this->assertEquals(28, $t->getNumberAt(7));
    }
}
