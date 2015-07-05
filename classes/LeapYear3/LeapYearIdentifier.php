<?php

namespace xbojch\LeapYear3;

class LeapYearIdentifier
{
    public function isLeapYear($inputYear) {

        if ($this->isLeapYearCandidate($inputYear)) {
            if ($this->isAtypicalCommonYear($inputYear)) return false;
            return true;
        }
        return false;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function isLeapYearCandidate($inputYear)
    {
        return $inputYear % 4 == 0;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function isAtypicalCommonYear($inputYear)
    {
        return $inputYear % 100 == 0 && $inputYear % 400 != 0;
    }

}
