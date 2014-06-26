<?php namespace Util;

class ArraysTest extends \PHPUnit_Framework_TestCase
{
    public function testIncrementKeys()
    {
        $a = [1, 2, 3];
        ArrayHelper::incrementKeys($a);
        $this->assertEquals([1 => 1, 2, 3], $a);
    }

    public function testIncrementKeysMoreThanOne()
    {
        $a = [1, 2, 3];
        ArrayHelper::incrementKeys($a, 3);
        $this->assertEquals([3 => 1, 2, 3], $a);
    }

    public function testGetAllDifferences()
    {
        $a = [1, 4, 5, 6];
        $expected = [
            3 => [[1, 4]],
            4 => [[1, 5]],
            5 => [[1, 6]],
            1 => [[4, 5], [5, 6]],
            2 => [[4, 6]],
        ];
        $actual = ArrayHelper::getAllDifferences($a);
        $this->assertEquals($expected, $actual);
    }

    public function testTail()
    {
        // we test the last 10 items with their original keys are returned
        $a = array(0,1,2,3,4,5,6,7,8,9,'ten' => 10,11,'twelve' => 12);
        $tail = ArrayHelper::tail($a);
        $expected = array(3 => 3,4,5,6,7,8,9,'ten' => 10,11,'twelve' => 12);
        $this->assertEquals($expected, $tail);
    }

    public function testShortArrayTail()
    {
        $a = array(0,1,2,);
        $tail = ArrayHelper::tail($a);
        $this->assertEquals($a, $tail);
    }

    public function testCustomLengthTail()
    {
        $a = range(0,10);
        $tail = ArrayHelper::tail($a, 6);
        $this->assertEquals([5 => 5, 6, 7, 8, 9, 10], $tail);
    }
}
