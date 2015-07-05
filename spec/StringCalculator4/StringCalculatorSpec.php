<?php

namespace spec\xbojch\StringCalculator4;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\StringCalculator4\StringCalculator');
    }

    function it_adds_0_for_empty_string() {
        $this->add("")->shouldReturn(0);
    }

    function it_returns_1_for_1() {
        $this->add("1")->shouldReturn(1);
    }

    function it_returns_2_for_1_and_1() {
        $this->add("1,1")->shouldReturn(2);
    }

    function it_returns_5_for_1_and_2_and_2() {
        $this->add("1,2,2")->shouldReturn(5);
    }

    function it_returns_5_for_1_and_2_newline_2() {
        $this->add("1,2\n2")->shouldReturn(5);
    }

    function it_returns_10_for_1_newline_3_and_4_newline_2() {
        $this->add("1\n3,4\n2")->shouldReturn(10);
    }

    function it_throws_an_exception_for_a_negative_number() {
        $this->shouldThrow('\Exception')->duringAdd("3,-3");
    }

    function it_throws_an_exception_with_a_message_for_a_negative_number() {
        $this->shouldThrow(new \Exception("negatives not allowed: -5"))->duringAdd("40,-5");
    }

    function it_throws_an_exception_with_a_message_for_multiple_negative_numbers() {
        $this->shouldThrow(new \Exception("negatives not allowed: -4, -9, -8"))->duringAdd("3,-4,5,-9,7,-8");
    }
}
