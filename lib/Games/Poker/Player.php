<?php namespace Games\Poker;

class Player
{
    /** @var int */
    public $id;
    /** @var string */
    public $name;
    /** @var Hand */
    public $hand;

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @param Hand $hand
     */
    public function receiveHand(Hand $hand)
    {
        $this->hand = $hand;
    }
}