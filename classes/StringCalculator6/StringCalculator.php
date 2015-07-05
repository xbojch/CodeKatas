<?php

namespace xbojch\StringCalculator6;

class StringCalculator
{

    public function add($numbers)
    {
        $splitNumbers = $this->splitNumbers($numbers);

        $sum = 0;
        $negativeNumbers = [];

        foreach($splitNumbers as $number) {

            if ($this->isNegative($number)) $negativeNumbers[] = $number;

            $sum += $number;
        }

        if ($this->hasNegatives($negativeNumbers)) {
            throw new \Exception('negatives not allowed: '.join(', ', $negativeNumbers));
        }

        return $sum;
    }

    /**
     * @param $numbers
     * @return array
     */
    private function splitNumbers($numbers)
    {
        $delimiter = $this->detectDelimiter($numbers);

        return array_map('intval', preg_split('/'.$delimiter.'/', $numbers));
    }

    /**
     * @param $numbers
     * @param $matches
     * @return null
     */
    private function detectDelimiter($numbers)
    {
        $delimiter = ',|\n';

        preg_match('/\/\/(.*)\n/', $numbers, $matches);

        if (isset($matches[1])) {
            $delimiter = $matches[1];
        }

        return $delimiter;
    }

    /**
     * @param $number
     * @return bool
     */
    private function isNegative($number)
    {
        return $number < 0;
    }

    /**
     * @param $negativeNumbers
     * @return bool
     */
    private function hasNegatives($negativeNumbers)
    {
        return count($negativeNumbers) > 0;
    }
}
