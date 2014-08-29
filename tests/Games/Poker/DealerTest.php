<?php namespace Games\Poker;

class DealerTest extends \PHPUnit_Framework_TestCase
{
    /** @var Dealer */
    private $dealer;
    /** @var Player */
    private $p1;
    /** @var Player */
    private $p2;

    public function setUp()
    {
        $this->p1 = new Player(1, 'One');
        $this->p2 = new Player(2, 'Two');
        $this->dealer = new Dealer(array($this->p1, $this->p2));
    }

    public function testCreation()
    {
        $this->assertInstanceOf('\\Games\\Poker\\Dealer', $this->dealer);
    }

    public function testDeal()
    {
        $this->dealer->deal(1, '5H 5C 6S 7S KD');
        $this->assertEquals(new Hand('5H 5C 6S 7S KD'), $this->p1->hand);
    }

    public function testFindWinner()
    {
        // simple: 2 pair vs high card
        $this->dealer->deal(1, '2S 3D 4C 5H AH');
        $this->dealer->deal(2, '2S 2D 5S 5D QH'); // p2 should win
        $this->assertEquals(2, $this->dealer->findWinner());
    }

    public function testFindWinnerTwoPair()
    {
        // both 2 pair, both same highest pair, so 2nd pair determines winner
        $this->dealer->deal(1, '2S 2D 5S 5D QH');
        $this->dealer->deal(2, '3S 3D 5C 5H AH'); // p2 should win
        $this->assertEquals(2, $this->dealer->findWinner());
    }

    public function testFindWinnerHighCard()
    {
        $this->dealer->deal(1, '2S JD AS 5D QH'); // AQJ52 -> 5 should win
        $this->dealer->deal(2, '3S 4D JC QH AH'); // AQJ43
        $this->assertEquals(1, $this->dealer->findWinner());
    }

    public function testExamples()
    {
        $this->dealer->deal(1, '5H 5C 6S 7S KD');
        $this->dealer->deal(2, '2C 3S 8S 8D TD');
        $this->assertEquals(2, $this->dealer->findWinner());

        $this->dealer->deal(1, '5D 8C 9S JS AC');
        $this->dealer->deal(2, '2C 5C 7D 8S QH');
        $this->assertEquals(1, $this->dealer->findWinner());

        $this->dealer->deal(1, '2D 9C AS AH AC');
        $this->dealer->deal(2, '3D 6D 7D TD QD');
        $this->assertEquals(2, $this->dealer->findWinner());

        $this->dealer->deal(1, '4D 6S 9H QH QC');
        $this->dealer->deal(2, '3D 6D 7H QD QS');
        $this->assertEquals(1, $this->dealer->findWinner());

        $this->dealer->deal(1, '2H 2D 4C 4D 4S');
        $this->dealer->deal(2, '3C 3D 3S 9S 9D');
        $this->assertEquals(1, $this->dealer->findWinner());
    }
}
