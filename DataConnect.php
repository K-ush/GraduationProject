<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 12.
 * Time: AM 10:29
 */

class DataConnect
{
    private $KEY = "ZNZV1BXnl0kRebCqIy6Njuo2ZqXgy6hXzPvMOY9Iw55414T0xINWSrF%2Btx06PvMO7aClJHwjEPf0CLZT0ojhrg%3D%3D";

    function __construct()
    {
        require 'DetailData.php';
    }

    function getDataLists()
    {
        $ch = curl_init();
        $url = 'http://www.culture.go.kr/openapi/rest/publicperformancedisplays/period'; /*URL*/
        $queryParams = '?' . urlencode('ServiceKey') . '='.$this->KEY; /*Service Key*/

        curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    function getDetailData($seq)
    {
        $ch = curl_init();
        $url = 'http://www.culture.go.kr/openapi/rest/publicperformancedisplays/d/'; /*URL*/
        $queryParams = '?' . urlencode('ServiceKey') . '='.$this->KEY; /*Service Key*/
        $queryParams .= '&' . urlencode('seq') . '=' . urlencode($seq); /* data index */

        curl_setopt($ch, CURLOPT_URL, $url . $queryParams); // URL 연결
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);     // Return값 존재
        curl_setopt($ch, CURLOPT_HEADER, FALSE);            // HEADER 안가져옴
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');     // 몰라시불
        $response = curl_exec($ch);       // $ch 실행 후 결과값 $ex에 넣음
        curl_close($ch);            // $ch 닫음

        $response = simplexml_load_string($response);

        /////
        /// 세부데이터를 DetailData 클래스에 넣음
        /////
        $data = new DetailData;

        $data->setSeq($response->msgBody->perforInfo->seq);
        $data->setTitle($response->msgBody->perforInfo->title);
        $data->setStartDate($response->msgBody->perforInfo->startDate);
        $data->setEndDate($response->msgBody->perforInfo->endDate);
        $data->setPlace($response->msgBody->perforInfo->place);
        $data->setRealmName($response->msgBody->perforInfo->realmName);
        $data->setArea($response->msgBody->perforInfo->area);
        $data->setSubTitle($response->msgBody->perforInfo->subTitle);
        $data->setPrice($response->msgBody->perforInfo->price);
        $data->setContents1($response->msgBody->perforInfo->contents1);
        $data->setContents2($response->msgBody->perforInfo->contents2);
        $data->setUrl($response->msgBody->perforInfo->url);
        $data->setPhone($response->msgBody->perforInfo->phone);
        $data->setImgUrl($response->msgBody->perforInfo->url);
        $data->setGpsX($response->msgBody->perforInfo->gpsX);
        $data->setGpsY($response->msgBody->perforInfo->gpsY);
        $data->setPlaceUrl($response->msgBody->perforInfo->placeUrl);
        $data->setPlaceAddr($response->msgBody->perforInfo->placeAddr);
        $data->setPlaceSeq($response->msgBody->perforInfo->placeSeq);

        echo $data->getSeq()."<br>";
        echo $data->getTitle()."<br>";
        echo $data->getStartDate()."<br>";

        return $data;
    }

}