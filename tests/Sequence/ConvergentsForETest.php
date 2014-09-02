<?php namespace Sequence;

class ConvergentsForETest extends \PHPUnit_Framework_TestCase
{
    public function testCreateSequence()
    {
        $convergents = new ConvergentsForE();
        $sequence = $convergents->createSequenceOfLength(10);
        $expected = [1 => null, 1, 2, 1, 1, 4, 1, 1, 6, 1];
        $this->assertEquals($expected, $sequence);
    }
}
