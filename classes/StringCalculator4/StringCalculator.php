<?php

namespace xbojch\StringCalculator4;

use Exception;

class StringCalculator
{

    public function add($numbers) {

        $splitNumbers = $this->getNumbers($numbers);

        $negativeNumbers = [];

        $sum = 0;

        foreach ($splitNumbers as $number) {

            if ($number < 0) array_push($negativeNumbers,$number);

            $sum += $number;
        }

        if (count($negativeNumbers)>0) {
            throw new \Exception("negatives not allowed: ".join(", ",$negativeNumbers));
        }

        return $sum;
    }

    /**
     * @param $numbers
     * @return array
     */
    private function getNumbers($numbers)
    {
        return array_map("intval", preg_split('/,|\n/', $numbers));
    }
}
