<?php

use xbojch\GildedRose\Program;
use xbojch\GildedRose\Item;

class GildedRoseRunner {

    public static function main()
    {
        echo "HELLO\n";

        $app = new Program(array(
            new Item(array( 'name' => "+5 Dexterity Vest",'sellIn' => 10,'quality' => 20)),
            new Item(array( 'name' => "Aged Brie",'sellIn' => 2,'quality' => 0)),
            new Item(array( 'name' => "Elixir of the Mongoose",'sellIn' => 5,'quality' => 7)),
            new Item(array( 'name' => "Sulfuras, Hand of Ragnaros",'sellIn' => 0,'quality' => 80)),
            new Item(array( 'name' => "Backstage passes to a TAFKAL80ETC concert",
                'sellIn' => 15,
                'quality' => 20
            )),
            new Item(array('name' => "Conjured Mana Cake",'sellIn' => 3,'quality' => 6)),
        ));

        $app->UpdateQuality();

        $items = $app->getItems();

        echo sprintf("%50s - %7s - %7s\n", "Name", "SellIn", "Quality");
        foreach ($items as $item) {
            echo sprintf("%50s - %7d - %7d\n", $item->name, $item->sellIn, $item->quality);
        }
    }
}