<?php

namespace spec\xbojch\RomanNumerals;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RomanNumeralsConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\RomanNumerals\RomanNumeralsConverter');
    }

    function it_converts_1() {
        $this->convert(1)->shouldReturn('I');
    }

    function it_converts_2() {
        $this->convert(2)->shouldReturn('II');
    }

    function it_converts_3() {
        $this->convert(3)->shouldReturn('III');
    }

    function it_converts_4() {
        $this->convert(4)->shouldReturn('IV');
    }

    function it_converts_5() {
        $this->convert(5)->shouldReturn('V');
    }

    function it_converts_6() {
        $this->convert(6)->shouldReturn('VI');
    }

    function it_converts_7() {
        $this->convert(7)->shouldReturn('VII');
    }

    function it_converts_8() {
        $this->convert(8)->shouldReturn('VIII');
    }

    function it_converts_9() {
        $this->convert(9)->shouldReturn('IX');
    }

    function it_converts_10() {
        $this->convert(10)->shouldReturn('X');
    }

    function it_converts_11() {
        $this->convert(11)->shouldReturn('XI');
    }

    function it_converts_12() {
        $this->convert(12)->shouldReturn('XII');
    }

    function it_converts_20() {
        $this->convert(20)->shouldReturn('XX');
    }

    function it_converts_40() {
        $this->convert(40)->shouldReturn('XL');
    }

    function it_converts_100() {
        $this->convert(100)->shouldReturn('C');
    }

    function it_converts_500() {
        $this->convert(500)->shouldReturn('D');
    }

    function it_converts_1000() {
        $this->convert(1000)->shouldReturn('M');
    }

    function it_converts_2000() {
        $this->convert(2000)->shouldReturn('MM');
    }

    function it_converts_1999() {
        $this->convert(1999)->shouldReturn('MCMXCIX');
    }

    function it_converts_4990() {
        $this->convert(4990)->shouldReturn('MMMMCMXC');
    }
}
