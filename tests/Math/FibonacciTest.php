<?php namespace Math; 

class FibonacciTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $f = new Fibonacci();
        $this->assertInstanceOf('\\Math\\Fibonacci', $f);
        $this->assertEquals(array(1, 1), $f->getSequence());
    }

    public function testGetSequence()
    {
        $f = new Fibonacci();
        $this->assertEquals(array(1, 1), $f->getSequence());

        $f->createSequenceTo(100);
        $this->assertEquals(array(1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89), $f->getSequence());
    }

    public function testNext()
    {
        $f = new Fibonacci();
        $f->createSequenceTo(50);
        $this->assertEquals('55', $f->next());
        $this->assertEquals('89', $f->next());
    }

    public function getLastIndex()
    {
        $f = new Fibonacci();
        $this->assertEquals(2, $f->getLastIndex());
        $f->next();
        $f->next();
        $this->assertEquals(4, $f->getLastIndex());
    }
}
