<?php namespace xbojch\Tests\GildedRose;

use xbojch\GildedRose\Program;
use xbojch\GildedRose\Item;

class GildedRoseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function theQualityOfAnItemIsNeverNegative() {
        $program = new Program(array(new Item(array( 'name' => "Elixir of the Mongoose",'sellIn' => 3,'quality' => 0))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(2, $item->sellIn);
        $this->assertEquals(0, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityOfBrieIsIncreasingBy1BeforeSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Aged Brie",'sellIn' => 2,'quality' => 20))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(1, $item->sellIn);
        $this->assertEquals(21, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityOfBrieIsIncreasingBy2AfterSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Aged Brie",'sellIn' => -5,'quality' => 20))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(-6, $item->sellIn);
        $this->assertEquals(22, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityNeverIncreasesOver50() {
        $program = new Program(array(new Item(array( 'name' => "Aged Brie",'sellIn' => -5,'quality' => 50))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(-6, $item->sellIn);
        $this->assertEquals(50, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityOfTicketsIncreasesBy1UpTo10DaysBeforeSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Backstage passes to a TAFKAL80ETC concert",'sellIn' => 15,'quality' => 30))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(14, $item->sellIn);
        $this->assertEquals(31, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityOfTicketsIncreasesBy2From10To5DaysBeforeSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Backstage passes to a TAFKAL80ETC concert",'sellIn' => 10,'quality' => 30))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(9, $item->sellIn);
        $this->assertEquals(32, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityOfTicketsIncreasesBy3Last5DaysBeforeSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Backstage passes to a TAFKAL80ETC concert",'sellIn' => 5,'quality' => 30))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(4, $item->sellIn);
        $this->assertEquals(33, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityOfTicketsDecreasesTo0AfterSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Backstage passes to a TAFKAL80ETC concert",'sellIn' => 0,'quality' => 30))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(-1, $item->sellIn);
        $this->assertEquals(0, $item->quality);
    }



    /**
     * @test
     */
    public function theQualityDescreasesBy1BeforeSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Elixir of the Mongoose",'sellIn' => 5,'quality' => 30))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(4, $item->sellIn);
        $this->assertEquals(29, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityDescreasesBy2AfterSellInDate() {
        $program = new Program(array(new Item(array( 'name' => "Elixir of the Mongoose",'sellIn' => 0,'quality' => 30))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(-1, $item->sellIn);
        $this->assertEquals(28, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityAndSellInOfALegendaryProductNeverDecreases() {
        $program = new Program(array(new Item(array( 'name' => "Sulfuras, Hand of Ragnaros",'sellIn' => 6,'quality' => 80))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(6, $item->sellIn);
        $this->assertEquals(80, $item->quality);
    }

    /**
     * @test
     */
    public function theQualityOfConjuredItemDegradesTwiceAsFast() {
        $program = new Program(array(new Item(array( 'name' => 'Flying duck from a magic spell', 'sellIn' => 5, 'quality' => 30))));
        $program->UpdateQuality();

        $item = $program->getItems()[0];
        $this->assertEquals(4, $item->sellIn);
        $this->assertEquals(28, $item->quality);
    }
}

