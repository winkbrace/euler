<?php namespace Math;

class CombinatoricsTest extends \PHPUnit_Framework_TestCase
{
    public function testFac()
    {
        $c = new Combinatorics();
        $this->assertEquals(24, $c->fact(4));
    }

    public function testNPr()
    {
        $c = new Combinatorics();
        $this->assertEquals(1320, $c->nPr(12, 3));
    }

    public function testNCr()
    {
        $c = new Combinatorics();
        $this->assertEquals(3060, $c->nCr(18, 4));
    }

    public function testCreatePermutations()
    {
        $c = new Combinatorics();
        $pool = '012';
        $permutations = $c->createPermutations($pool);
        $expected = array('012', '021', '102', '120', '201', '210');
        $this->assertEquals($expected, $permutations);
    }

    public function testFindLexiPermutationAt()
    {
        $c = new Combinatorics();

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

    public function testCreateCombinationsWithSize()
    {
        $c = new Combinatorics();
        $pool = range('a', 'd');
        $combinations = $c->createCombinations($pool, 3);
        $expected = array(
            array('a', 'b', 'c'),
            array('a', 'b', 'd'),
            array('a', 'c', 'd'),
            array('b', 'c', 'd'),
        );
        $this->assertEquals($expected, $combinations);
    }

    public function testCreateCombinationsWithoutSize()
    {
        $c = new Combinatorics();
        $pool = range('a', 'd');
        $combinations = $c->createCombinations($pool);
        $this->assertCount(15, $combinations);
        $this->assertEquals(array('a'), $combinations[0]);
        $this->assertEquals(array('a', 'b', 'c', 'd'), $combinations[14]);
    }
}
