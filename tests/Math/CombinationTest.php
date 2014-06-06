<?php namespace Math; 

class CombinationTest extends \PHPUnit_Framework_TestCase
{
    public function testFac()
    {
        $c = new Combination();
        $this->assertEquals(24, $c->fact(4));
    }

    public function testNPr()
    {
        $c = new Combination();
        $this->assertEquals(1320, $c->nPr(12, 3));
    }

    public function testNCr()
    {
        $c = new Combination();
        $this->assertEquals(3060, $c->nCr(18, 4));
    }

    public function testFindLexiPermutationAt()
    {
        $c = new Combination();

        // 012   021   102   120   201   210
        $pool = '012';
        $perm = $c->findLexicographicPermutationAtIndex($pool, 3);
        $this->assertEquals('102', $perm);
    }
}
