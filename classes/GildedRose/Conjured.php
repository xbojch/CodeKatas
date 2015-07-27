<?php namespace xbojch\GildedRose;


class Conjured extends BaseItem
{

    public function tick()
    {
        $this->sellIn -= 1;

        if ($this->quality <= 2) {
            $this->quality = 0;
            return;
        }

        $this->quality -= 2;
    }


}