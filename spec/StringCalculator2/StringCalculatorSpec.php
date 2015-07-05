<?php

namespace spec\xbojch\StringCalculator2;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\StringCalculator2\StringCalculator');
    }

    function it_adds_no_number_as_0() {
        $this->add("")->shouldReturn(0);
    }

    function it_adds_0_as_0() {
        $this->add("0")->shouldReturn(0);
    }

    function it_adds_1_as_1() {
        $this->add("1")->shouldReturn(1);
    }

    function it_adds_2_as_2() {
        $this->add("2")->shouldReturn(2);
    }

    function it_adds_1_2_as_3() {
        $this->add("1,2")->shouldReturn(3);
    }

    function it_adds_1_2_3_as_6() {
        $this->add("1,2,3")->shouldReturn(6);
    }

    function it_adds_1_2_3_with_newline_as_6() {
        $this->add("1\n2\n3")->shouldReturn(6);
    }

    function it_throws_error_for_negative_value() {
        $this->shouldThrow('\Exception')->duringAdd("1, -2");
    }

    function it_lists_number_with_invalid_number_error() {
        $this->shouldThrow(new \Exception('Negatives not allowed: -3'))->duringAdd("1, -3");
    }

    function it_lists_all_invalid_numbers_with_invalid_number_error() {
        $this->shouldThrow(new \Exception('Negatives not allowed: -3, -4, -8'))->duringAdd("1, -3, 2, 5, -4, 5, -8");
    }
}
