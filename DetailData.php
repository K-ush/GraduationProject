<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 12.
 * Time: AM 10:36
 */

class DetailData
{
    /*
        일련번호	        seq
        시작일	        startDate
        마감일	        endDate
        장소	            place
        분류명	        realmName
        지역	            area
        공연부제목	        subTitle
        티켓요금	        price
        내용1     	    contents1
        내용2     	    contents2
        관람URL	        url
        문의처	        phone
        GPS-X좌표	        gpsX
        GPS-Y좌표	        gpsY
        이미지	        imgUrl
        공연장URL	        placeUrl
        공연장 주소	    placeAddr
        문화예술공간일련번호
                        placeSeq
     */

    private $seq;
    private $title;
    private $startDate;
    private $endDate;
    private $place;
    private $realmName;
    private $area;
    private $subTitle;
    private $price;
    private $contents1;
    private $contents2;
    private $url;
    private $phone;
    private $gpsX;
    private $gpsY;
    private $imgUrl;
    private $placeUrl;
    private $placeAddr;
    private $placeSeq;

    /**
     * DetailData constructor.
     */
    public function __construct()
    {
    }

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
    public function getPerforInfo()
    {
        return $this->perforInfo;
    }

    /**
     * @param mixed $perforInfo
     */
    public function setPerforInfo($perforInfo)
    {
        $this->perforInfo = $perforInfo;
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
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * @param mixed $subTitle
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getContents1()
    {
        return $this->contents1;
    }

    /**
     * @param mixed $contents1
     */
    public function setContents1($contents1)
    {
        $this->contents1 = $contents1;
    }

    /**
     * @return mixed
     */
    public function getContents2()
    {
        return $this->contents2;
    }

    /**
     * @param mixed $contents2
     */
    public function setContents2($contents2)
    {
        $this->contents2 = $contents2;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getGpsX()
    {
        return $this->gpsX;
    }

    /**
     * @param mixed $pgsX
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

    /**
     * @return mixed
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }

    /**
     * @param mixed $imgUrl
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;
    }

    /**
     * @return mixed
     */
    public function getPlaceUrl()
    {
        return $this->placeUrl;
    }

    /**
     * @param mixed $placeUrl
     */
    public function setPlaceUrl($placeUrl)
    {
        $this->placeUrl = $placeUrl;
    }

    /**
     * @return mixed
     */
    public function getPlaceAddr()
    {
        return $this->placeAddr;
    }

    /**
     * @param mixed $placeAddr
     */
    public function setPlaceAddr($placeAddr)
    {
        $this->placeAddr = $placeAddr;
    }

    /**
     * @return mixed
     */
    public function getPlaceSeq()
    {
        return $this->placeSeq;
    }

    /**
     * @param mixed $placeSeq
     */
    public function setPlaceSeq($placeSeq)
    {
        $this->placeSeq = $placeSeq;
    }

    public function toString(){
        $string = "seq : ".$this->seq."<br>";
        $string .="title : ".$this->title."<br>";
        $string .="startDate : ".$this->startDate."<br>";
        $string .="endDate : ".$this->endDate."<br>";
        $string .="place : ".$this->place."<br>";

        return $string;
    }


}