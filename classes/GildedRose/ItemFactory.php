<?php namespace xbojch\GildedRose;


class ItemFactory
{

    private static $defaultItem = 'xbojch\GildedRose\BaseItem';

    private static $itemsMap = array(
        'normal' => 'xbojch\GildedRose\Normal',
        'Aged Brie' => 'xbojch\GildedRose\Brie',
        'Backstage passes to a TAFKAL80ETC concert' => 'xbojch\GildedRose\Backstage',
        'Elixir of the Mongoose' => 'xbojch\GildedRose\Normal',
        'Flying duck from a magic spell' => 'xbojch\GildedRose\Conjured'
    );

    public static function makeItem($itemName, $sellIn, $quality)
    {
        if (isset(self::$itemsMap[$itemName])) {
            return new self::$itemsMap[$itemName]($sellIn, $quality);
        } else {
            return new self::$defaultItem($sellIn, $quality);
        }
    }
}