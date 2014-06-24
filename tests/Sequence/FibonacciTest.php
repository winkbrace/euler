<?php namespace Sequence;

class FibonacciTest extends \PHPUnit_Framework_TestCase
{
    /** @var Fibonacci */
    protected $fibonacci;
    
    public function setUp()
    {
        $this->fibonacci = new Fibonacci();
    }
    
    public function testCreation()
    {
        $this->assertInstanceOf('\\Sequence\\Fibonacci', $this->fibonacci);
        $this->assertEquals(array(1, 1), $this->fibonacci->getSequence());
    }

    public function testGetSequence()
    {
        $this->assertEquals(array(1, 1), $this->fibonacci->getSequence());

        $this->fibonacci->createSequenceTo(100);
        $this->assertEquals(array(1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89), $this->fibonacci->getSequence());
    }

    public function testNext()
    {
        $this->fibonacci->createSequenceTo(50);
        $this->assertEquals('55', $this->fibonacci->next());
        $this->assertEquals('89', $this->fibonacci->next());
    }

    public function getLastIndex()
    {
        $this->assertEquals(2, $this->fibonacci->getLastIndex());
        $this->fibonacci->next();
        $this->fibonacci->next();
        $this->assertEquals(4, $this->fibonacci->getLastIndex());
    }

    public function testGetNumberAt()
    {
        $this->assertEquals(1597, $this->fibonacci->getNumberAt(17));
        $this->assertEquals(13, $this->fibonacci->getNumberAt(7));
    }

    public function testGetIndexOf()
    {
        $this->assertEquals(17, $this->fibonacci->getIndexOf(1597));
        $this->assertEquals(7, $this->fibonacci->getIndexOf(13));
    }
    
    public function testIsFibonacci()
    {
        $this->assertTrue($this->fibonacci->isFibonacci(13));
        $this->assertFalse($this->fibonacci->isFibonacci(14));
    }
}
