<?php namespace Sequence;

class OctagonalTest extends \PHPUnit_Framework_TestCase
{
    /** @var Octagonal */
    protected $octagonal;

    public function setUp()
    {
        $this->octagonal = new Octagonal();
    }

    public function testSequence()
    {
        $this->assertEquals([1 => 1, 8, 21, 40, 65], $this->octagonal->createSequenceOfLength(5));
    }

    public function testGetIndexOf()
    {
        $this->assertEquals(4, $this->octagonal->getIndexOf(40));
        $this->assertEquals(5, $this->octagonal->getIndexOf(65));
    }
}
