<?php

namespace xbojch\TennisScoring;

class ScoreKeeper
{
    protected $player1;
    protected $player2;

    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {

        if ($this->hasAWinner()) {
            return 'Win for ' . $this->winner()->getName();
        }

        if ($this->hasTheAdvantage()) {
            return 'Advantage '. $this->winner()->getName();
        }

        if ($this->inDeuce()) {
            return 'Deuce';
        }

        return $this->generalScore();
    }

    /**
     * @return bool
     */
    private function tied()
    {
        return $this->player1->getPoints() == $this->player2->getPoints();
    }

    private function hasAWinner()
    {
        return $this->hasEnoughPointsToWin() && $this->isLeadingByAtLeastTwo();
    }

    private function winner()
    {
        return $this->player1->getPoints() > $this->player2->getPoints()
                ? $this->player1
                : $this->player2;
    }

    /**
     * @return bool
     */
    private function hasEnoughPointsToWin()
    {
        return max([$this->player1->getPoints(), $this->player2->getPoints()]) >= 4;
    }

    /**
     * @return bool
     */
    private function isLeadingByAtLeastTwo()
    {
        return abs($this->player1->getPoints() - $this->player2->getPoints()) >= 2;
    }

    private function hasTheAdvantage() {
        return $this->hasEnoughPointsToWin() && $this->isLeadingByOne();
    }

    private function inDeuce() {
        return $this->scoredAtLeastSixPoints() && $this->tied();
    }

    /**
     * @return string
     */
    private function generalScore()
    {
        $score = $this->lookup[$this->player1->getPoints()] . '-';
        $score .= $this->tied() ? 'All' : $this->lookup[$this->player2->getPoints()];

        return $score;
    }

    /**
     * @return bool
     */
    private function isLeadingByOne()
    {
        return abs($this->player1->getPoints() - $this->player2->getPoints()) == 1;
    }

    /**
     * @return bool
     */
    private function scoredAtLeastSixPoints()
    {
        return $this->player1->getPoints() + $this->player2->getPoints() >= 6;
    }
}
