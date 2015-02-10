<?php namespace xbojch\Tests\PrimeNumbers;

use xbojch\PrimeNumbers\PrimeNumberGenerator;

class PrimeNumbersGeneratorTest extends \PHPUnit_Framework_TestCase {


  private $primeGenerator;

  public function setUp() {
    $this->primeGenerator = new PrimeNumberGenerator();
  }

  public function testShouldReturnEmptyArrayFor1() {
    $this->assertEquals([], $this->primeGenerator->generate(1));
  }

  public function testShouldReturn2For2() {
    $this->assertEquals([2], $this->primeGenerator->generate(2));
  }

  public function testShouldReturn3for3() {
    $this->assertEquals([3], $this->primeGenerator->generate(3));
  }

  public function testShouldReturn2_2for4() {
    $this->assertEquals([2,2], $this->primeGenerator->generate(4));
  }

  public function testShouldReturn5for5() {
    $this->assertEquals([5], $this->primeGenerator->generate(5));
  }

  public function testShouldReturn2_3for6() {
    $this->assertEquals([2,3], $this->primeGenerator->generate(6));
  }

  public function testShouldReturn7for7() {
    $this->assertEquals([7], $this->primeGenerator->generate(7));
  }

  public function testShouldReturn2_2_2for8() {
    $this->assertEquals([2,2,2], $this->primeGenerator->generate(8));
  }

  public function testShouldReturn3_3for9() {
    $this->assertEquals([3,3], $this->primeGenerator->generate(9));
  }

  public function testShouldReturn2_5for10() {
    $this->assertEquals([2,5], $this->primeGenerator->generate(10));
  }

  public function testShouldReturn2_2_5_5for100() {
    $this->assertEquals([2,2,5,5], $this->primeGenerator->generate(100));
  }

  public function testShouldReturn2_2_2_5_5for200() {
    $this->assertEquals([2,2,2,5,5], $this->primeGenerator->generate(200));
  }

  public function testShouldReturn2_3_5_5for150() {
    $this->assertEquals([2,3,5,5], $this->primeGenerator->generate(150));
  }
}