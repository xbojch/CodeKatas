<?php

namespace xbojch\LeapYear2;

class LeapYearIdentifier
{
    const TYPICAL_LEAP_YEAR_INTERVAL = 4;
    const ATYPICAL_YEAR_INTERVAL = 100;
    const ATYPICAL_LEAP_YEAR_INTERVAL = 400;

    public function isLeapYear($inputYear)
    {
        return $this->checkTypicalAndAtypicalLeapYear($inputYear);
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function checkTypicalAndAtypicalLeapYear($inputYear)
    {
        if ($this->isTypicalLeapYear($inputYear)) {

            return $this->checkLeapYear($inputYear);
        }

        return false;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function isTypicalLeapYear($inputYear)
    {
        return $inputYear % self::TYPICAL_LEAP_YEAR_INTERVAL == 0;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function checkLeapYear($inputYear)
    {
        if ($this->isAtypicalYear($inputYear)) {
            return $this->isAtypicalLeapYear($inputYear);
        }

        return true;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function isAtypicalYear($inputYear)
    {
        return $inputYear % self::ATYPICAL_YEAR_INTERVAL == 0;
    }

    /**
     * @param $inputYear
     * @return bool
     */
    private function isAtypicalLeapYear($inputYear)
    {
        if ($inputYear % self::ATYPICAL_LEAP_YEAR_INTERVAL == 0) {
            return true;
        } else {
            return false;
        }
    }
}
