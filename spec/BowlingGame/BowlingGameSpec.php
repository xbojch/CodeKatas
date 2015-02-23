<?php

namespace spec\xbojch\BowlingGame;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\BowlingGame\BowlingGame');
    }

    function it_scores_zero_on_a_gutter_game() {
        $this->rollTimes(20,0);
        $this->score()->shouldEqual(0);
    }

    function it_sums_the_number_of_all_knocked_down_pins_in_a_game() {
        $this->rollTimes(20, 1);
        $this->score()->shouldEqual(20);
    }

    function it_awards_a_one_strike_bonus_for_each_spare() {
        $this->rollSpare();
        $this->roll(5);
        $this->rollTimes(17, 0);
        $this->score()->shouldEqual(20);
    }

    function it_awards_a_two_strike_bonus_for_each_strike() {
        $this->roll(10);
        $this->roll(7);
        $this->roll(2);
        $this->rollTimes(17,0);
        $this->score()->shouldEqual(28);
    }

    function it_scores_a_perfect_game() {
        $this->rollTimes(12, 10);
        $this->score()->shouldEqual(300);
    }

    function it_disallows_negative_roll() {
        $this->shouldThrow(new \InvalidArgumentException())->duringRoll(-5);
    }

    function rollSpare() {
        $this->roll(8);
        $this->roll(2);
    }

    function rollTimes($count, $pins) {
        for($i = 0; $i < $count; $i++) {
            $this->roll($pins);
        }
    }
}
