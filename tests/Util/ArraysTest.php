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
}
