<?php

namespace spec\xbojch\StringCalculator5;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\StringCalculator5\StringCalculator');
    }

    function it_returns_0_for_empty_string() {
        $this->add("")->shouldReturn(0);
    }

    function it_returns_5_for_5() {
        $this->add("5")->shouldReturn(5);
    }

    function it_returns_4_for_4() {
        $this->add("4")->shouldReturn(4);
    }

    function it_returns_10_for_6_and_4() {
        $this->add("6,4")->shouldReturn(10);
    }

    function it_returns_20_for_4_and_5_and_6_and_5() {
        $this->add("4,5,6,5")->shouldReturn(20);
    }

    function it_returns_20_for_4_and_6_newline_5_and_5() {
        $this->add("4,6\n5,5")->shouldReturn(20);
    }

    function it_ignores_numbers_bigger_than_1000() {
        $this->add("2,1001")->shouldReturn(2);
    }

    function it_throws_an_exception_for_negative_number() {
        $this->shouldThrow('\Exception')->duringAdd("4,-3");
    }

    function it_throws_an_exception_with_a_message_for_negative_number() {
        $this->shouldThrow(new \Exception('negatives not allowed: -1'))->duringAdd("5,-1");
    }

    function it_throws_an_exception_with_a_message_for_all_negative_numbers() {
        $this->shouldThrow(new \Exception('negatives not allowed: -4, -6, -7'))->duringAdd("4,-4, -6, 7, -7");
    }
}
