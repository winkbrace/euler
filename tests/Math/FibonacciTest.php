<?php namespace Math; 

class FibonacciTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $f = new Fibonacci();
        $this->assertInstanceOf('\\Math\\Fibonacci', $f);
        $this->assertEquals(array(1, 2), $f->getSequence());
    }

    public function testGetSequence()
    {
        $f = new Fibonacci();
        $this->assertEquals(array(1, 2), $f->getSequence());

        $f->createSequenceTo(100);
        $this->assertEquals(array(1, 2, 3, 5, 8, 13, 21, 34, 55, 89), $f->getSequence());
    }
}
