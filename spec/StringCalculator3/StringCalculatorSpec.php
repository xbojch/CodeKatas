<?php

namespace spec\xbojch\StringCalculator3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\StringCalculator3\StringCalculator');
    }

    function it_returns_zero_for_empty_string() {
        $this->add("")->shouldReturn(0);
    }

    function it_returns_zero_for_number_zero() {
        $this->add("0")->shouldReturn(0);
    }

    function it_returns_one_for_number_one() {
        $this->add("1")->shouldReturn(1);
    }

    function it_returns_two_for_number_two() {
        $this->add("2")->shouldReturn(2);
    }

    function it_returns_three_for_one_and_two() {
        $this->add("1,2")->shouldReturn(3);
    }

    function it_returns_four_for_two_and_two() {
        $this->add("2,2")->shouldReturn(4);
    }

    function it_returns_five_with_newline_separated_one_and_four() {
        $this->add("1\n4")->shouldReturn(5);
    }

    function it_returns_six_with_mixed_separated_two_and_two_and_two() {
        $this->add("2,2\n2")->shouldReturn(6);
    }

    /*function it_supports_different_delimiters() {
        $this->add("//;\n1;2")->shouldReturn(3);
    }*/

    /*function it_returns_one_for_one_and_wrong_delimiter() {
        $this->add("1,\n2")->shouldReturn(1);
    }*/


}
