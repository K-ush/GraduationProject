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


    public function __construct(){}
    
    /**
     * @return mixed
     */
    public function getSeq()
    {
        return $this->seq;
    }

    /**
     * @param mixed $seq
     */
    public function setSeq($seq)
    {
        $this->seq = $seq;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return mixed
     */
    public function getRealmName()
    {
        return $this->realmName;
    }

    /**
     * @param mixed $realmName
     */
    public function setRealmName($realmName)
    {
        $this->realmName = $realmName;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * @param mixed $thumbnail
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return mixed
     */
    public function getGpsX()
    {
        return $this->gpsX;
    }

    /**
     * @param mixed $gpsX
     */
    public function setGpsX($gpsX)
    {
        $this->gpsX = $gpsX;
    }

    /**
     * @return mixed
     */
    public function getGpsY()
    {
        return $this->gpsY;
    }

    /**
     * @param mixed $gpsY
     */
    public function setGpsY($gpsY)
    {
        $this->gpsY = $gpsY;
    }


}