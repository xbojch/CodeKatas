<?php namespace xbojch\GildedRose;


class Conjured extends BaseItem
{

    public function tick()
    {
        $this->sellIn -= 1;

        if ($this->quality >= 50) return;
        if ($this->sellIn < 0) {
            $this->quality = 0;
            return;
        }

        $this->quality -= 2;
    }


}