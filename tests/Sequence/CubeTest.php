<?php namespace Sequence;

class CubeTest extends \PHPUnit_Framework_TestCase
{
    /** @var Cube */
    protected $cube;

    public function setUp()
    {
        $this->cube = new Cube();
    }

    public function testSequence()
    {
        $this->assertEquals([1 => 1, 8, 27, 64, 125], $this->cube->createSequenceOfLength(5));
    }

    public function testGetIndexOf()
    {
        $this->assertEquals(4, $this->cube->getIndexOf(64));
    }

    public function testIsCube()
    {
        $this->assertFalse($this->cube->isCube(14));
        $this->assertTrue($this->cube->isCube(27));
    }
}
