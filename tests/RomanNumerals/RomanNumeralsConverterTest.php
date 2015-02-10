<?php namespace xbojch\Tests\RomanNumerals;

use xbojch\RomanNumerals\RomanNumeralsConverter;

class RomanNumeralsConverterTest extends \PHPUnit_Framework_TestCase {

  private $romanNumeralConverter;

  public function setUp() {
    $this->romanNumeralConverter = new RomanNumeralsConverter();
  }

  public function testShouldConvert1() {
    $this->assertEquals('I', $this->romanNumeralConverter->convert(1));
  }

  public function testShouldConvert2() {
    $this->assertEquals('II', $this->romanNumeralConverter->convert(2));
  }

  public function testShouldConvert3() {
    $this->assertEquals('III', $this->romanNumeralConverter->convert(3));
  }

  public function testShouldConvert4() {
    $this->assertEquals('IV', $this->romanNumeralConverter->convert(4));
  }

  public function testShouldConvert5() {
    $this->assertEquals('V', $this->romanNumeralConverter->convert(5));
  }

  public function testShouldConvert6() {
    $this->assertEquals('VI', $this->romanNumeralConverter->convert(6));
  }

  public function testShouldConvert7() {
    $this->assertEquals('VII', $this->romanNumeralConverter->convert(7));
  }

  public function testShouldConvert8() {
    $this->assertEquals('VIII', $this->romanNumeralConverter->convert(8));
  }

  public function testShouldConvert9() {
    $this->assertEquals('IX', $this->romanNumeralConverter->convert(9));
  }

  public function testShouldConvert10() {
    $this->assertEquals('X', $this->romanNumeralConverter->convert(10));
  }

  public function testShouldConvert11() {
    $this->assertEquals('XI', $this->romanNumeralConverter->convert(11));
  }

  public function testShouldConvert12() {
    $this->assertEquals('XII', $this->romanNumeralConverter->convert(12));
  }

  public function testShouldConvert20() {
    $this->assertEquals('XX', $this->romanNumeralConverter->convert(20));
  }

  public function testShouldConvert40() {
    $this->assertEquals('XL', $this->romanNumeralConverter->convert(40));
  }

  public function testShouldConvert100() {
    $this->assertEquals('C', $this->romanNumeralConverter->convert(100));
  }

  public function testShouldConvert500() {
    $this->assertEquals('D', $this->romanNumeralConverter->convert(500));
  }

  public function testShouldConvert1000() {
    $this->assertEquals('M', $this->romanNumeralConverter->convert(1000));
  }

  public function testShouldConvert2000() {
    $this->assertEquals('MM', $this->romanNumeralConverter->convert(2000));
  }

  public function testShouldConvert1999() {
    $this->assertEquals('MCMXCIX', $this->romanNumeralConverter->convert(1999));
  }

  public function testShouldConvert4990() {
    $this->assertEquals('MMMMCMXC', $this->romanNumeralConverter->convert(4990));
  }

}