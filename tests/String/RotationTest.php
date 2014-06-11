<?php namespace String; 

class RotationTest extends \PHPUnit_Framework_TestCase
{
    public function testGetAll()
    {
        $actual = Rotation::getAllRotations(197);
        $expected = array('197', '971', '719');
        $this->assertEquals($expected, $actual);
    }
}
 