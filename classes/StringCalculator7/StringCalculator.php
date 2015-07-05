<?php

namespace xbojch\StringCalculator7;

class StringCalculator
{

    const MAX_ALLOWED_VALUE = 1000;

    public function add($numbers)
    {
        $parsedNumbers = $this->parseNumbers($numbers);

        $negativeNumbers = [];

        $sum = 0;

        foreach($parsedNumbers as $number) {

            if ($number > self::MAX_ALLOWED_VALUE) continue;

            if ($number < 0) $negativeNumbers[] = $number;

            $sum += $number;
        }

        if (count($negativeNumbers)>0) {
            throw new \Exception('negatives not allowed: '.join(', ', $negativeNumbers));
        }

        return $sum;
    }

    /**
     * @param $numbers
     * @return array
     */
    private function parseNumbers($numbers)
    {
        return array_map('intval', preg_split('/,|\n/', $numbers));
    }
}
