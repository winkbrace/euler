<?php namespace Math; 

class SumTest extends \PHPUnit_Framework_TestCase
{
    public function testSumOfDigits()
    {
        $sum = new Sum();
        $this->assertEquals(21, $sum->getSumOfDigits('123456'));
    }
}
