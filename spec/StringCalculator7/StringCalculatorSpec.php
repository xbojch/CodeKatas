<?php

namespace spec\xbojch\StringCalculator7;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\StringCalculator7\StringCalculator');
    }

    function it_returns_0_for_empty_string() {
        $this->add("")->shouldReturn(0);
    }

    function it_returns_3_for_3() {
        $this->add("3")->shouldReturn(3);
    }

    function it_returns_4_for_4() {
        $this->add("4")->shouldReturn(4);
    }

    function it_returns_5_for_2_and_3() {
        $this->add("2,3")->shouldReturn(5);
    }

    function it_returns_9_for_3_and_4_and_2() {
        $this->add("3,4,2")->shouldReturn(9);
    }

    function it_throws_an_exception_for_negative_number() {
        $this->shouldThrow('\Exception')->duringAdd("4,-5");
    }

    function it_throws_an_exception_with_message_for_negative_number() {
        $this->shouldThrow(new \Exception('negatives not allowed: -8'))->duringAdd("4,5,6,-8,10,20");
    }

    function it_throws_an_exception_with_message_for_negative_numbers() {
        $this->shouldThrow(new \Exception('negatives not allowed: -10, -23, -5, -8'))->duringAdd("3,-10,6,-23,4,5,7,-5,3,2,1,-8");
    }

    function it_supports_newline_as_delimiter() {
        $this->add("3,5\n8")->shouldReturn(16);
    }

    function it_ignores_numbers_greater_than_1000() {
        $this->add("3,1001,20")->shouldReturn(23);
    }
}
