<?php namespace xbojch\BowlingGame;


class BowlingGame
{

    private $rolls = [];

    public function roll($pins)
    {

        if ($pins < 0) {
            throw new \InvalidArgumentException;
        }

        $this->rolls[] = $pins;
    }

    public function score()
    {

        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++) {

            if ($this->isStrike($roll)) {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            } elseif ($this->isASpare($roll)) {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            } else {
                $score += $this->getDefaultFrameScore($roll);
                $roll += 2;
            }
        }

        return $score;
    }

    /**
     * @param $roll
     * @return bool
     */
    private function isASpare($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
    }

    /**
     * @param $roll
     * @return mixed
     */
    private function getDefaultFrameScore($roll)
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    /**
     * @param $roll
     * @return bool
     */
    private function isStrike($roll)
    {
        return $this->rolls[$roll] == 10;
    }

    private function strikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    private function spareBonus($roll)
    {
        return $this->rolls[$roll + 2];
    }
}