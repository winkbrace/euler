<?php namespace Games\Poker;

class Card
{
    /** @var string (D, S, H or C) */
    public $suit;
    /** @var int */
    public $intValue;
    /** @var string */
    public $value;

    public function __construct($card)
    {
        $values = array(2 => 2, 3, 4, 5, 6, 7, 8, 9, 10, 'T' => 10, 'J' => 11, 'Q' => 12, 'K' => 13, 'A' => 14);

        $this->value = substr($card, 0, -1);
        $this->intValue = $values[$this->value];
        $this->suit = substr($card, -1);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value . $this->suit;
    }
}