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
    private $list = [];

    function __construct()
    {
        require_once('DetailData.php');
        require_once('DatasVO.php');
    }

    function getDataLists()
    {
        $ch = curl_init();
        $url = 'http://www.culture.go.kr/openapi/rest/publicperformancedisplays/period'; /*URL*/
        $queryParams = '?' . urlencode("serviceKey") . '='.$this->KEY; /*Service Key*/

        curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        $response = curl_exec($ch);
        curl_close($ch);

        $response = simplexml_load_string($response);
        $response = $response->msgBody->perforList;

        foreach($response as $array){
            $data = new DatasVO;

            $data->setSeq($array->seq);
            $data->setTitle($array->title);
            $data->setStartDate($array->startDate);
            $data->setEndDate($array->endDate);
            $data->setPlace($array->place);
            $data->setRealmName($array->realmName);
            $data->setArea($array->area);
            $data->setThumbnail($array->thumbnail);
            $data->setGpsX($array->gpsX);
            $data->setGpsY($array->gpsY);

            array_push($this->list, $data);
        }

        return $this->list;
    }

    function getDetailData($seq)
    {
        $ch = curl_init();
        $url = 'http://www.culture.go.kr/openapi/rest/publicperformancedisplays/d/'; /*URL*/
        $queryParams = '?' . urlencode('ServiceKey') . '='.$this->KEY; /*Service Key*/
        $queryParams .= '&' . urlencode('seq') . '=' . $seq; /* data index */
        echo $url.$queryParams;

        curl_setopt($ch, CURLOPT_URL, $url . $queryParams); // URL 연결
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);     // Return값 존재
        curl_setopt($ch, CURLOPT_HEADER, FALSE);            // HEADER 안가져옴
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');     // 몰라시불
        $response = curl_exec($ch);       // $ch 실행 후 결과값 $ex에 넣음
        curl_close($ch);            // $ch 닫음

        $response = simplexml_load_string($response);
        $response = $response->msgBody->perforInfo;

        /////
        /// 세부데이터를 DetailData 클래스에 넣음
        /////
        $data = new DetailData;

        $data->setSeq($response->seq);
        $data->setTitle($response->title);
        $data->setStartDate($response->startDate);
        $data->setEndDate($response->endDate);
        $data->setPlace($response->place);
        $data->setRealmName($response->realmName);
        $data->setArea($response->area);
        $data->setSubTitle($response->subTitle);
        $data->setPrice($response->price);
        $data->setContents1($response->contents1);
        $data->setContents2($response->contents2);
        $data->setUrl($response->url);
        $data->setPhone($response->phone);
        $data->setImgUrl($response->imgUrl);
        $data->setGpsX($response->gpsX);
        $data->setGpsY($response->gpsY);
        $data->setPlaceUrl($response->placeUrl);
        $data->setPlaceAddr($response->placeAddr);
        $data->setPlaceSeq($response->placeSeq);

        return $data;
    }

}