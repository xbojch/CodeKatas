<?php

namespace spec\xbojch\NumbersInWords;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NumbersInWordsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\NumbersInWords\NumbersInWords');
    }

    function it_should_return_one_for_1() {
        $this->sayNumber(1)->shouldReturn('one');
    }
}
