<?php

namespace spec\xbojch\StringCalculator;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringCalculatorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\StringCalculator\StringCalculator');
    }

    function it_translates_an_empty_string_to_zero() {
        $this->add('')->shouldEqual(0);
    }

    function it_finds_the_sum_of_one_number() {
        $this->add('5')->shouldEqual(5);
    }

    function it_finds_the_sum_of_two_numbers() {
        $this->add('1,2')->shouldEqual(3);
    }

    function it_finds_the_sum_of_any_amount_of_numbers() {
        $this->add('1,2,3,4,5,6')->shouldEqual(21);
    }

    function it_disallows_negative_numbers() {
        $this->shouldThrow(new \InvalidArgumentException('Invalid number provided: -2'))->duringAdd('3,-2');
    }

    function it_ignores_number_thousand_or_greater() {
        $this->add('2,2,1000')->shouldEqual(4);
    }

    function it_allows_for_newline_delimiters() {
        $this->add('2,2,3\n5')->shouldEqual(12);
    }
}
