<?php namespace spec\xbojch\TennisScoring;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use xbojch\TennisScoring\Player;

class ScoreKeeperSpec extends ObjectBehavior
{
    protected $john;
    protected $jane;

    function let() {

        $this->john = new Player('John Doe', 0);
        $this->jane = new Player('Jane Doe', 0);

        $this->beConstructedWith($this->john, $this->jane);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\TennisScoring\ScoreKeeper');
    }

    function it_scores_a_scoreless_game() {
        $this->score()->shouldReturn('Love-All');
    }

    function it_scores_a_1_to_0_game() {
        $this->john->earnPoints(1);
        $this->score()->shouldReturn('Fifteen-Love');
    }

    function it_scores_a_2_to_0_game() {
        $this->john->earnPoints(2);
        $this->score()->shouldReturn('Thirty-Love');
    }

    function it_scores_a_3_to_0_game() {
        $this->john->earnPoints(3);
        $this->score()->shouldReturn('Forty-Love');
    }

    function it_scores_a_4_to_0_game() {
        $this->john->earnPoints(4);
        $this->score()->shouldReturn('Win for John Doe');
    }

    function it_scores_a_0_to_2_game() {
        $this->jane->earnPoints(2);
        $this->score()->shouldReturn('Love-Thirty');
    }

    function it_scores_a_0_to_4_game() {
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Win for Jane Doe');
    }

    function it_scores_a_4_to_3_game() {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);
        $this->score()->shouldReturn('Advantage John Doe');
    }

    function it_scores_a_3_to_4_game() {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Advantage Jane Doe');
    }

    function it_scores_a_3_to_3_game() {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(3);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_4_to_4_game() {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(4);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_8_to_8_game() {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(8);
        $this->score()->shouldReturn('Deuce');
    }

    function it_scores_a_8_to_9_game() {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(9);
        $this->score()->shouldReturn('Advantage Jane Doe');
    }

    function it_scores_a_8_to_10_game() {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(10);
        $this->score()->shouldReturn('Win for Jane Doe');
    }
}
