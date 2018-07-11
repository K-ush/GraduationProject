<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 11.
 * Time: AM 10:24
 */

class DatasVO
{
    private $seq;
    private $title;
    private $startDate;
    private $endDate;
    private $place;
    private $realmName;
    private $area;
    private $thumbnail;
    private $gpsX;
    private $gpsY;

    function __construct($seq, $title, $startDate, $endDate, $place, $realmName, $area, $thumbnail, $gpsX, $gpsY)
    {
        $this->seq = $seq;
        $this->title = $title;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->place = $place;
        $this->realmName = $realmName;
        $this->area = $area;
        $this->thumbnail = $thumbnail;
        $this->gpsX = $gpsX;
        $this->gpsY = $gpsY;
    }
}