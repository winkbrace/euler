<?php namespace String;

class SorterTest extends \PHPUnit_Framework_TestCase
{
    public function testSortCharacters()
    {
        $sorter = new Sorter();
        $this->assertSame('123', $sorter->sortCharacters(231));
        $this->assertEquals('abc', $sorter->sortCharacters('cba'));
    }

    public function testCompare()
    {
        $sorter = new Sorter();
        $this->assertTrue($sorter->compare('123', '321'));
        $this->assertFalse($sorter->compare('112', '122'));
    }

    public function testCompareMultiple()
    {
        $sorter = new Sorter();
        $this->assertTrue($sorter->compare('112','121','211','112'));
        $this->assertFalse($sorter->compare('112','121','211','999'));
    }
}
