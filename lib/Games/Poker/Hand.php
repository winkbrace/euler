<?php namespace Games\Poker;

/**
 * Class Hand
 *
 * This class is responsible for determining the value of a hand of cards
 *
 * High Card: Highest value card.
 * One Pair: Two cards of the same value.
 * Two Pairs: Two different pairs.
 * Three of a Kind: Three cards of the same value.
 * Straight: All cards are consecutive intValues.
 * Flush: All cards of the same suit.
 * Full House: Three of a kind and a pair.
 * Four of a Kind: Four cards of the same value.
 * Straight Flush: All cards are consecutive intValues of same suit.
 * Royal Flush: Ten, Jack, Queen, King, Ace, in same suit.
 *
 * The cards are valued in the order:
 * 2, 3, 4, 5, 6, 7, 8, 9, 10, Jack, Queen, King, Ace.
 */
class Hand
{
    const HIGH_CARD = 1;
    const ONE_PAIR = 2;
    const TWO_PAIR = 3;
    const THREE_OF_A_KIND = 4;
    const STRAIGHT = 5;
    const FLUSH = 6;
    const FULL_HOUSE = 7;
    const FOUR_OF_A_KIND = 8;
    const STRAIGHT_FLUSH = 9;
    const ROYAL_FLUSH = 10;

    /** @var Card[] */
    private $cards = array();
    /** @var array */
    private $values = array();
    /** @var int[] */
    private $intValues = array();
    /** @var array */
    private $suits = array();
    /** @var bool */
    private $isStraight;
    /** @var bool */
    private $isFlush;
    /** @var array */
    private $cardsPerValue = array();

    /**
     * @param string $cards example: '5H 5C 6S 7S KD'
     */
    public function __construct($cards)
    {
        foreach (explode(' ', $cards) as $str)
            $this->cards[] = new Card($str);

        $this->sortCardsByValue();

        foreach ($this->cards as $card)
        {
            $this->values[] = $card->value;
            $this->intValues[] = $card->intValue;
            $this->suits[] = $card->suit;
        }
    }

    /**
     * calculate numerical representation for the hand value
     * @return int
     */
    public function getScore()
    {
        if ($this->hasRoyalFlush())
            return self::ROYAL_FLUSH;
        elseif ($this->hasStraightFlush())
            return self::STRAIGHT_FLUSH;
        elseif ($this->hasFourOfAKind())
            return self::FOUR_OF_A_KIND;
        elseif ($this->hasFullHouse())
            return self::FULL_HOUSE;
        elseif ($this->hasFlush())
            return self::FLUSH;
        elseif ($this->hasStraight())
            return self::STRAIGHT;
        elseif ($this->hasThreeOfAKind())
            return self::THREE_OF_A_KIND;
        elseif ($this->hasTwoPair())
            return self::TWO_PAIR;
        elseif ($this->hasOnePair())
            return self::ONE_PAIR;
        else
            return self::HIGH_CARD;
    }

    /**
     * @return bool
     */
    private function hasRoyalFlush()
    {
        return in_array('A', $this->values) && $this->hasStraightFlush();
    }

    /**
     * @return bool
     */
    private function hasStraightFlush()
    {
        return $this->hasFlush() && $this->hasStraight();
    }

    /**
     * @return bool
     */
    private function hasFlush()
    {
        if (is_null($this->isFlush))
            $this->isFlush = $this->findFlush();

        return $this->isFlush;
    }


    private function findFlush()
    {
        return count(array_unique($this->suits)) == 1;
    }

    /**
     * @return bool
     */
    private function hasStraight()
    {
        if (is_null($this->isStraight))
            $this->isStraight = $this->findStraight();

        return $this->isStraight;
    }

    /**
     * @return bool
     */
    private function findStraight()
    {
        $prev = 0;
        foreach ($this->intValues as $value)
        {
            if ($prev > 0 && $value != $prev - 1)
                return false;

            $prev = $value;
        }
        return true;
    }


    private function hasFullHouse()
    {
        return $this->hasThreeOfAKind() && $this->hasOnePair();
    }

    /**
     * @return bool
     */
    private function hasFourOfAKind()
    {
        foreach ($this->getCardsPerValue() as $set)
        {
            if (count($set) == 4)
                return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    private function hasThreeOfAKind()
    {
        foreach ($this->getCardsPerValue() as $set)
        {
            if (count($set) == 3)
                return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    private function hasTwoPair()
    {
        return $this->getPairCount() == 2;
    }

    /**
     * @return bool
     */
    private function hasOnePair()
    {
        return $this->getPairCount() == 1;
    }

    /**
     * @return int
     */
    private function getPairCount()
    {
        $pairCount = 0;

        foreach ($this->getCardsPerValue() as $set)
        {
            if (count($set) == 2)
                $pairCount++;
        }

        return $pairCount;
    }

    /**
     * @return array
     */
    public function getCardsPerValue()
    {
        if (empty($this->cardsPerValue))
        {
            foreach ($this->cards as $card)
                $this->cardsPerValue[$card->intValue][] = $card;

            // sort by set size. When size is equal sort by value.
            // (2nd step is required, otherwise the order will get scrambled)
            usort($this->cardsPerValue, function($a, $b) {
                if (count($a) == count($b)) {
                    return $a[0]->intValue > $b[0]->intValue ? -1 : 1;
                }
                return count($a) > count($b) ? -1 : 1;
            });
        }

        return $this->cardsPerValue;
    }

    /**
     * sort the cards by value high to low
     */
    private function sortCardsByValue()
    {
        usort($this->cards, function ($a, $b) {
            return $a->intValue > $b->intValue ? -1 : 1;
        });
    }

    /**
     * @return \Games\Poker\Card[]
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * @param int $score
     * @return string
     */
    public function scoreToString($score)
    {
        $scores = [
            self::HIGH_CARD => 'High Card',
            self::ONE_PAIR => 'One Pair',
            self::TWO_PAIR => 'Two Pair',
            self::THREE_OF_A_KIND => 'Three of a Kind',
            self::STRAIGHT => 'Straight',
            self::FLUSH => 'Flush',
            self::FULL_HOUSE => 'Full House',
            self::FOUR_OF_A_KIND => 'Four of a Kind',
            self::STRAIGHT_FLUSH => 'Straight Flush',
            self::ROYAL_FLUSH => 'Royal Flush',
        ];

        return $scores[$score];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '[' . implode(' ', $this->cards) . ']';
    }
}