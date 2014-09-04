<?php namespace Math;

class RootTest extends \PHPUnit_Framework_TestCase
{
    /** @var Root */
    private $root;

    public function setUp()
    {
        $this->root = new Root();
    }

// commented, because this method became private
//    public function testGetNextContinuedFraction()
//    {
//        // 2nd iteration of √23: 7 / (√23 - 3) => should return [base 3, nextA 2, nextB 3]
//        $result = $this->root->getNextContinuedFraction(23, 7, 3);
//        $this->assertEquals([3, 2, 3], $result);
//    }

    /**
     * √2=[1;(2)], period=1
     * √3=[1;(1,2)], period=2
     * √5=[2;(4)], period=1
     * √6=[2;(2,4)], period=2
     * √7=[2;(1,1,1,4)], period=4
     * √8=[2;(1,4)], period=2
     * √10=[3;(6)], period=1
     * √11=[3;(3,6)], period=2
     * √12= [3;(2,6)], period=2
     * √13=[3;(1,1,1,1,6)], period=5
     * ...
     * √23=[4;(1,3,1,8)], period=4
     */
    public function testGetContinuedFraction()
    {
        $this->assertEquals('[1;(2)]', $this->root->getContinuedFraction(2));
        $this->assertEquals('[4;(1,3,1,8)]', $this->root->getContinuedFraction(23));
    }
}
