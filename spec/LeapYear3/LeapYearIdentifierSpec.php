<?php

namespace spec\xbojch\LeapYear3;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeapYearIdentifierSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\LeapYear3\LeapYearIdentifier');
    }

    function it_identifies_1996_as_a_typical_leap_year() {
        $this->isLeapYear(1996)->shouldReturn(true);
    }

    function it_identifies_2001_as_a_typical_common_year() {
        $this->isLeapYear(2001)->shouldReturn(false);
    }

    function it_identifies_2000_as_an_atypical_leap_year() {
        $this->isLeapYear(2000)->shouldReturn(true);
    }

    function it_identifies_1900_as_an_atypical_common_year() {
        $this->isLeapYear(1900)->shouldReturn(false);
    }


    // 1996 is a typical leap year
    // 2001 is a typical common year
    // 2000 is an atypical leap year
    // 1900 is an atypical common year

}
