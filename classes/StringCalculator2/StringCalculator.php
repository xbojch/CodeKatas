<?php

namespace xbojch\StringCalculator2;

class StringCalculator
{
    private $negativeNumbers = array();

    public function add($numbers) {

        $numbers = $this->splitNumbers($numbers);
        $sum = 0;

        foreach($numbers as $number) {

            if ($this->isNegativeNumber($number)) {
                $this->setNegativeNumber($number);
            }
            else {
                $sum += $number;
            }

        }

        if ($this->includesNegativeNumbers()) {
            throw new \Exception('Negatives not allowed: '.join(', ', $this->negativeNumbers));
        }

        return $sum;
    }

    /**
     * @param $numbers
     * @return array
     */
    private function splitNumbers($numbers)
    {
        return array_map('intval', preg_split('/,|\n\s*/', $numbers));
    }

    /**
     * @param $number
     * @return bool
     */
    private function isNegativeNumber($number)
    {
        return $number < 0;
    }

    /**
     * @return void
     */
    private function setNegativeNumber($number)
    {
        array_push($this->negativeNumbers, $number);
    }

    /**
     * @return array
     */
    private function includesNegativeNumbers()
    {
        return $this->negativeNumbers;
    }
}
