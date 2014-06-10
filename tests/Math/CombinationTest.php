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

    public function testCreatePermutations()
    {
        $c = new Combination();
        $pool = '012';
        $permutations = $c->createPermutations($pool);
        $expected = array('012', '021', '102', '120', '201', '210');
        $this->assertEquals($expected, $permutations);
    }

    public function testFindLexiPermutationAt()
    {
        $c = new Combination();

        $pool = implode('', range(0,9));
        $perm = $c->findLexicographicPermutationAtIndex($pool, 1000000);
        $this->assertEquals('2783915460', $perm);

        // 012   021   102   120   201   210
        $pool = '012';
        $perm = $c->findLexicographicPermutationAtIndex($pool, 3);
        $this->assertEquals('102', $perm);
        $perm = $c->findLexicographicPermutationAtIndex($pool, 4);
        $this->assertEquals('120', $perm);
    }
}
