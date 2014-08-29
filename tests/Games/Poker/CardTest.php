<?php namespace Games\Poker;

class CardTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $card = new Card('JD');
        $this->assertEquals(11, $card->intValue);
        $this->assertEquals('J', $card->value);
        $this->assertEquals('D', $card->suit);
    }

    public function test10()
    {
        $card = new Card('10H');
        $this->assertEquals(10, $card->intValue);
        $this->assertEquals('10', $card->value);
        $this->assertEquals('H', $card->suit);
    }
}
