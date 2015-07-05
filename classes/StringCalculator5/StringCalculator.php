<?php

namespace xbojch\StringCalculator5;

class StringCalculator
{

    const MAX_NUMBER_LIMIT = 1000;

    const ZERO = 0;

    public function add($numbers)
    {
        $splitNumbers = $this->splitNumbers($numbers);

        $negativeNumbers = [];

        $sum = 0;

        foreach ($splitNumbers as $number) {
            if ($this->numberOverLimit($number)) continue;

            if ($this->negativeNumber($number)) $negativeNumbers[] = $number;

            $sum += $number;
        }

        if ($this->hasNegativeNumbers($negativeNumbers)) {
            throw new \Exception('negatives not allowed: '.join(", ", $negativeNumbers));
        }

        return $sum;
    }

    /**
     * @param $numbers
     * @return array
     */
    private function splitNumbers($numbers)
    {
        return array_map("intval", preg_split('/,|\n/', $numbers));
    }

    /**
     * @param $number
     * @return bool
     */
    private function numberOverLimit($number)
    {
        return $number > self::MAX_NUMBER_LIMIT;
    }

    /**
     * @param $number
     * @return bool
     */
    private function negativeNumber($number)
    {
        return $number < self::ZERO;
    }

    /**
     * @param $negativeNumbers
     * @return bool
     */
    private function hasNegativeNumbers($negativeNumbers)
    {
        return count($negativeNumbers) > 0;
    }
}
