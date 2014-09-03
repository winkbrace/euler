<?php namespace Sequence;

class HeptagonalTest extends \PHPUnit_Framework_TestCase
{
    /** @var Heptagonal */
    protected $heptagonal;

    public function setUp()
    {
        $this->heptagonal = new Heptagonal();
    }

    public function testSequence()
    {
        $this->assertEquals([1 => 1, 7, 18, 34, 55], $this->heptagonal->createSequenceTo(55));
    }

    public function testGetIndexOf()
    {
        $this->assertEquals(4, $this->heptagonal->getIndexOf(34));
        $this->assertEquals(5, $this->heptagonal->getIndexOf(55));
    }
}
