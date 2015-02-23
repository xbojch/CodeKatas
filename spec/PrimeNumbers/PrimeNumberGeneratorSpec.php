<?php

namespace spec\xbojch\PrimeNumbers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PrimeNumberGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('xbojch\PrimeNumbers\PrimeNumberGenerator');
    }

    function it_returns_an_empty_array_for_1() {
        $this->generate(1)->shouldReturn([]);
    }

    function it_returns_2_for_2() {
        $this->generate(2)->shouldReturn([2]);
    }

    function it_returns_3_for_3() {
        $this->generate(3)->shouldReturn([3]);
    }

    function it_returns_2_2_for_4() {
        $this->generate(4)->shouldreturn([2,2]);
    }

    function it_returns_5_for_5() {
        $this->generate(5)->shouldReturn([5]);
    }

    function it_returns_2_3_for_6() {
        $this->generate(6)->shouldReturn([2,3]);
    }

    function it_returns_7_for_7() {
        $this->generate(7)->shouldReturn([7]);
    }

    function it_returns_2_2_2_for_8() {
        $this->generate(8)->shouldReturn([2,2,2]);
    }

    function it_returns_3_3_for_9() {
        $this->generate(9)->shouldReturn([3,3]);
    }

    function it_returns_2_5_for_10() {
        $this->generate(10)->shouldReturn([2,5]);
    }

    function it_returns_2_2_5_5_for_100() {
        $this->generate(100)->shouldReturn([2,2,5,5]);
    }

    function it_returns_2_2_2_5_5_for_200() {
        $this->generate(200)->shouldReturn([2,2,2,5,5]);
    }

    function it_returns_2_3_5_5_for_150() {
        $this->generate(150)->shouldReturn([2,3,5,5]);
    }
}
