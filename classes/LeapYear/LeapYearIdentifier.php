<?php

namespace xbojch\LeapYear;

class LeapYearIdentifier
{

    public function isLeapYear($inputYear)
    {
        if ($this->isCommonLeapYear($inputYear)) {

            if (!$this->isAtypicalLeapYear($inputYear)) {
                return false;
            }

            return true;

        }

        return false;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function isCommonLeapYear($inputYear)
    {
        return $inputYear % 4 == 0;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function isAtypicalLeapYear($inputYear)
    {
        return !($inputYear % 100 == 0 && $inputYear % 400 != 0);
    }
}
