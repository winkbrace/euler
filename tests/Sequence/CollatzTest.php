<?php namespace Sequence;

class CollatzTest extends \PHPUnit_Framework_TestCase
{
    public function testGetNext()
    {
        $c = new Collatz();
        $this->assertEquals(40, $c->next(13));
        $this->assertEquals(20, $c->next(40));
    }

    public function testCreateSequence()
    {
        $c = new Collatz();
        $expected = array(13, 40, 20, 10, 5, 16, 8, 4, 2, 1);
        $this->assertEquals($expected, $c->createSequence(13));
    }

    public function testResetSequence()
    {
        $c = new Collatz();
        $c->createSequence(4);
        $c->createSequence(4); // 2nd call should reset sequence
        $this->assertEquals(array(4, 2, 1), $c->getSequence());
    }
}
