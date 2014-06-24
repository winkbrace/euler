<?php namespace Sequence;

class PentagonalTest extends \PHPUnit_Framework_TestCase
{
    /** @var Pentagonal */
    protected $pentagonal;
    
    public function setUp()
    {
        $this->pentagonal = new Pentagonal();
    }
    
    public function testGetPentagonalAt()
    {
        $this->assertEquals(1, $this->pentagonal->getNumberAt(1));
        $this->assertEquals(5, $this->pentagonal->getNumberAt(2));
        $this->assertEquals(12, $this->pentagonal->getNumberAt(3));
        $this->assertEquals(22, $this->pentagonal->getNumberAt(4));
        $this->assertEquals(35, $this->pentagonal->getNumberAt(5));
    }

    public function testNext()
    {
        $this->assertEquals(1, $this->pentagonal->next());
        $this->assertEquals(5, $this->pentagonal->next());
        $this->assertEquals(12, $this->pentagonal->next());
    }

    public function testCreateSequence()
    {
        $sequence = $this->pentagonal->createSequenceOfLength(10);
        $expected = array(1 => 1, 5, 12, 22, 35, 51, 70, 92, 117, 145);
        $this->assertEquals($expected, $sequence);
    }
    
    public function testGetIndexOf()
    {
        $this->assertEquals(1, $this->pentagonal->getIndexOf(1));
        $this->assertEquals(2, $this->pentagonal->getIndexOf(5));
        $this->assertEquals(5, $this->pentagonal->getIndexOf(35));
    }
}
 