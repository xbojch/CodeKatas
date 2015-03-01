<?php namespace xbojch\TennisScoring;


class Player {


    protected $name;

    protected $points;

    function __construct($name, $points)
    {
        $this->name = $name;
        $this->points = $points;
    }

    public function earnPoints($points) {
        $this->points = $points;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

}
