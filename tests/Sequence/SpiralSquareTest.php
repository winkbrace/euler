<?php namespace Sequence;

class SpiralSquareTest extends \PHPUnit_Framework_TestCase
{
    public function testGetNumberAt()
    {
        $s = new SpiralSquare();
        $this->assertEquals(49, $s->getNumberAt(12));
        $this->assertEquals(1, $s->getNumberAt(0));
        $this->assertEquals(9, $s->getNumberAt(4));
        $this->assertEquals(13, $s->getNumberAt(5));
    }

    public function testGetIndexOf()
    {
        $s = new SpiralSquare();
        $this->assertEquals(12, $s->getIndexOf(49));
        $this->assertEquals(5, $s->getIndexOf(13));
        $this->assertEquals(4, $s->getIndexOf(9));
    }

    public function testCreateSequenceOfLength()
    {
        $s = new SpiralSquare();
        $expected = [1 => 3, 5, 7, 9, 13, 17, 21, 25, 31, 37, 43, 49];
        $this->assertEquals($expected, $s->createSequenceOfLength(12));
    }

    public function testCreateSequenceTo()
    {
        $s = new SpiralSquare();
        $expected = [1 => 3, 5, 7, 9, 13, 17, 21, 25, 31, 37, 43, 49];
        $this->assertEquals($expected, $s->createSequenceTo(49));
    }

    public function testNext()
    {
        $s = new SpiralSquare();
        $this->assertEquals(3, $s->next());
    }
}
