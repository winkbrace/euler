<?php namespace Games\Poker;

class HandTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $hand = new Hand('5H 5C 6S 7S KD');
        $this->assertInstanceOf('\\Games\\Poker\\Hand', $hand);
        $cards = $hand->getCards();
        $this->assertInstanceOf('\\Games\\Poker\\Card', $cards[0]);
        $this->assertEquals('K', $cards[0]->value);
    }

    public function testStraight()
    {
        $hand = new Hand('8H 6D 7H 5S 9C');
        $this->assertEquals(Hand::STRAIGHT, $hand->getScore());
    }

    public function testFlush()
    {
        $hand = new Hand('3H 5H JH 7H QH');
        $this->assertEquals(Hand::FLUSH, $hand->getScore());
    }

    public function testStraightFlush()
    {
        $hand = new Hand('10H 9H JH KH QH');
        $this->assertEquals(Hand::STRAIGHT_FLUSH, $hand->getScore());
    }

    public function testRoyalFlush()
    {
        $hand = new Hand('10H AH JH KH QH');
        $this->assertEquals(Hand::ROYAL_FLUSH, $hand->getScore());
    }

    public function testOnePair()
    {
        $hand = new Hand('10H 10D 2H 3C QH');
        $this->assertEquals(Hand::ONE_PAIR, $hand->getScore());
    }

    public function testTwoPair()
    {
        $hand = new Hand('10H 10D 2H 2C QH');
        $this->assertEquals(Hand::TWO_PAIR, $hand->getScore());
    }

    public function testFourOfAKind()
    {
        $hand = new Hand('10H 10D 10S 10C QH');
        $this->assertEquals(Hand::FOUR_OF_A_KIND, $hand->getScore());
    }

    public function testThreeOfAKind()
    {
        $hand = new Hand('10H 10D 10S 5C QH');
        $this->assertEquals(Hand::THREE_OF_A_KIND, $hand->getScore());
    }

    public function testFullHouse()
    {
        $hand = new Hand('10H 10D 10S 5C 5H');
        $this->assertEquals(Hand::FULL_HOUSE, $hand->getScore());
    }

    public function testHighCard()
    {
        $hand = new Hand('10H 9D 6S 5C 3H');
        $this->assertEquals(Hand::HIGH_CARD, $hand->getScore());
    }

    public function testSortingBySetSize()
    {
        $hand = new Hand('3C 3D 3S 9S 9D');
        $cards = $hand->getCardsPerValue();
        $this->assertEquals($cards[0][0]->intValue, '3');
    }

    public function testSortingByValue()
    {
        $hand = new Hand('3C 3D KS 9S 9D');
        $cards = $hand->getCardsPerValue();
        $this->assertEquals($cards[0][0]->intValue, '9');
    }
}
