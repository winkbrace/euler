<?php namespace Games\Poker;

use Util\Log;

/**
 * Class Dealer
 *
 * This class is responsible for determining which player's hand wins
 */
class Dealer
{
    /** @var Player[] */
    private $players;
    /** @var \Util\Log */
    private $logger;

    /**
     * @param Player[] $players
     * @param \Util\Log $logger
     */
    public function __construct(array $players, Log $logger = null)
    {
        foreach ($players as $player)
            $this->players[$player->id] = $player;

        $this->logger = $logger;
    }

    /**
     * @param int $playerId
     * @param string $hand example: '5H 5C 6S 7S KD'
     */
    public function deal($playerId, $hand)
    {
        $this->players[$playerId]->receiveHand(new Hand($hand));
    }

    /**
     * @return int $playerId
     */
    public function findWinner()
    {
        // get the scores
        $scores = array();
        foreach ($this->players as $id => $player)
            $scores[$id] = $player->hand->getScore();
        // sort from high to low
        arsort($scores);

        // remove all players that don't have a highest hand type (e.g. all players with less than Two Pair)
        $high = reset($scores);
        foreach ($scores as $id => $score)
        {
            $this->log("player ".$this->players[$id]->name." with ".$this->players[$id]->hand." has a ".$this->players[$id]->hand->scoreToString($score));

            if ($score < $high)
                unset($scores[$id]);
        }

        if (count($scores) == 1)
            return key($scores);

        // retrieve the cards per value
        $sets = array();
        foreach ($scores as $id => $score)
            $sets[$id] = $this->players[$id]->hand->getCardsPerValue();

        // sort by values of cards
        uasort($sets, function($p1, $p2) {
            for ($i=0; $i<count($p1); $i++) // for each set (both players must have same sets)
            {
                if ($p1[$i][0]->intValue != $p2[$i][0]->intValue)
                {
                    if ($p1[$i][0]->intValue > $p2[$i][0]->intValue)
                    {
                        $this->log($p1[$i][0]->value . ' beats ' . $p2[$i][0]->value);
                        return -1;
                    }
                    else
                    {
                        $this->log($p2[$i][0]->value . ' beats ' . $p1[$i][0]->value);
                        return 1;
                    }
                }
            }
            return 0;
        });

        return key($sets);
    }

    /**
     * @param string $message
     */
    private function log($message)
    {
        if (! empty($this->logger))
            $this->logger->log($message);
    }
}