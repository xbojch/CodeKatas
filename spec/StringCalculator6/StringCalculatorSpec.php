<?php

namespace spec\xbojch\StringCalculator6;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\StringCalculator6\StringCalculator');
    }

    function it_returns_0_for_empty_string() {
        $this->add("")->shouldReturn(0);
    }

    function it_returns_3_for_3() {
        $this->add("3")->shouldReturn(3);
    }

    function it_returns_5_for_5() {
        $this->add("5")->shouldReturn(5);
    }

    function it_returns_9_for_4_and_5() {
        $this->add("4,5")->shouldReturn(9);
    }

    function it_returns_10_for_4_newline_6() {
        $this->add("4\n6")->shouldReturn(10);
    }

    function it_supports_different_delimiters() {
        $this->add("//;\n3;4;5")->shouldReturn(12);
    }

    function it_throws_an_exception_for_negative_number() {
        $this->shouldThrow('\Exception')->duringAdd("4,-3");
    }

    function it_throws_an_exception_with_message_for_negative_number() {
        $this->shouldThrow(new \Exception('negatives not allowed: -7'))->duringAdd("3,-7");
    }

    function it_throws_an_exception_with_message_for_negative_numbers() {
        $this->shouldThrow(new \Exception('negatives not allowed: -4, -8, -20'))->duringAdd("3,4,8,-4,18,33,-8,17,-20");
    }




}
