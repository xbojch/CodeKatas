<?php

namespace xbojch\StringCalculator3;

class StringCalculator
{

    private $delimiter = ',|\\n';
    private $numbers;

    public function add($numbers) {

        $this->numbers = $numbers;

        $this->detectSpecialDelimiter();

        $this->parseNumbers();

        $sum = 0;

        foreach($this->numbers as $number) {
            $sum += $number;
        }

        return $sum;

    }

    /**
     * @param $numbers
     * @return array
     */
    private function parseNumbers()
    {
        $this->numbers = array_map('intval', preg_split('/('.$this->delimiter.')/', $this->numbers));
    }

    private function detectSpecialDelimiter() {
        $matches = preg_match('/^\/\/(.*)\\n/', $this->numbers, $matches);

        if (isset($matches[1])) {
            $this->delimiter =  $matches[1];
            $this->numbers = preg_replace('/^\/\/.*\\n/', '', $this->numbers);
        }
    }

}
