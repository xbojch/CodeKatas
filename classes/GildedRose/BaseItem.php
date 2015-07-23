<?php namespace xbojch\GildedRose;


class BaseItem
{

    protected $sellIn;
    protected $quality;

    function __construct($sellIn, $quality)
    {
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    /**
     * @return mixed
     */
    public function getSellIn()
    {
        return $this->sellIn;
    }

    /**
     * @return mixed
     */
    public function getQuality()
    {
        return $this->quality;
    }

    public function tick()
    {
    }

}