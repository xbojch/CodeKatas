<?php namespace xbojch\Tests\BowlingGame;

use xbojch\BowlingGame\BowlingGame;

class BowlingGameTest extends \PHPUnit_Framework_TestCase {

    private $bowlingGame;

    public function setUp() {
        $this->bowlingGame = new BowlingGame();
    }

    public function testShouldScoreZeroOnAGutterGame() {

        $this->rollTimes(20, 0);

        $this->assertEquals(0, $this->bowlingGame->score());
    }

    public function testShouldSumTheNumberOfAllKnockedDownPinsInAGame() {

        $this->rollTimes(20, 1);

        $this->assertEquals(20, $this->bowlingGame->score());
    }

    public function testShouldAwardAOneStrikeBonusForEverySpare() {
        $this->rollSpare();
        $this->bowlingGame->roll(5);

        $this->rollTimes(17, 0);

        $this->assertEquals(20, $this->bowlingGame->score());
    }

    public function testShouldAwardATwoStrikeBonusForEveryStrike() {
        $this->bowlingGame->roll(10);
        $this->bowlingGame->roll(7);
        $this->bowlingGame->roll(2);

        $this->rollTimes(17, 0);

        $this->assertEquals(28, $this->bowlingGame->score());
    }

    public function testShouldScoreAPerfectGame() {
        $this->rollTimes(12, 10);
        $this->assertEquals(300, $this->bowlingGame->score());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testShouldThrowInvalidArgumentExceptionWithNegativeRoll() {
        $this->bowlingGame->roll(-5);
    }

    protected function rollSpare()
    {
        $this->bowlingGame->roll(2);
        $this->bowlingGame->roll(8); //we get a spare
    }

    protected function rollTimes($count, $pins)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->bowlingGame->roll($pins);
        }
    }
}