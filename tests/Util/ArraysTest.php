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
}
