<?php

namespace spec\xbojch\LeapYear;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LeapYearIdentifierSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\LeapYear\LeapYearIdentifier');
    }

    function it_shows_1985_as_a_common_year() {
        $this->isLeapYear(1985)->shouldReturn(false);
    }

    function it_shows_1988_as_a_leap_year() {
        $this->isLeapYear(1988)->shouldReturn(true);
    }

    function it_shows_2001_as_a_common_year() {
        $this->isLeapYear(2001)->shouldReturn(false);
    }

    function it_shows_1996_as_a_leap_year() {
        $this->isLeapYear(1996)->shouldReturn(true);
    }

    function it_shows_2000_as_an_atypical_leap_year() {
        $this->isLeapYear(2000)->shouldReturn(true);
    }

    function it_shows_1900_as_an_atypical_common_year() {
        $this->isLeapYear(1900)->shouldReturn(false);
    }
}
