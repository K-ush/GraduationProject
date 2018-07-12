<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 11.
 * Time: AM 11:18
 */

class DBConnect
{
    private $db;
    private $list = [];

    function __construct()
    {

    }

    function getPerformLists()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $endDate = "20180711";
        $result = $this->db->query("select * from performDatas where endDate > " . $endDate . " order by seq desc limit 0, 10;");

        foreach ($result as $row) {
            require_once 'DatasVO.php';
            $datas = new DatasVO();

            $datas->setSeq($row['seq']);
            $datas->setTitle($row['title']);
            $datas->setStartDate($row['startDate']);
            $datas->setEndDate($row['endDate']);
            $datas->setPlace($row['place']);
            $datas->setRealmName($row['realmName']);
            $datas->setArea($row['area']);
            $datas->setThumbnail($row['thumbnail']);
            $datas->setGpsX($row['gpsX']);
            $datas->setGpsY($row['gpsY']);

            array_push($this->list, $datas);
        }

        $this->db = null; /* 연결 끊음 */
        return $this->list;
    }

    function insertPerformList($datas)
    {
        $this->db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "insert into performDatas('seq','title','startDate','endDate','place','realmName','area','thumbnail','gpsX','gpsY') values( ";

        $query .= $datas->getSeq().", ";
        $query .= "'". $datas->getTitle()."', ";
        $query .= "'". $datas->getStartDate()."', ";
        $query .= "'". $datas->getEndDate()."', ";
        $query .= "'". $datas->getPlace()."' ";
        $query .= "'". $datas->getRealmName()."', ";
        $query .= "'". $datas->getArea()."', ";
        $query .= "'". $datas->getThumbnail()."', ";
        $query .= "'". $datas->getGpsX()."', ";
        $query .= "'". $datas->getGpsY()."')";


        try
        {
            $this->db->query($query);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        echo "call insertPerformList()";
    }

    function insertPerformData($data){
        $query = "insert into detailDatas(seq,subTitle,price,contents1,contents2,url,phone,imgUrl,placeUrl,placeAddr,placeSeq)
                  values( ";

        $query .= $data->getSeq().", ";
        $query .= "'". $data->getSubTitle()."', ";
        $query .= "'". $data->getPrice()."', ";
        $query .= "'". $data->getContents1()."', ";
        $query .= "'". $data->getContents2()."', ";
        $query .= "'". $data->getUrl()."', ";
        $query .= "'". $data->getPhone()."', ";
        $query .= "'". $data->getImgUrl()."', ";
        $query .= "'". $data->getPlaceUrl()."', ";
        $query .= "'". $data->getPlaceAddr()."', ";
        $query .= "'". $data->getPlaceSeq()."');";

        try{
            $this->db->exec($query);
        }
        catch(PDOException $e)
        {
            echo "<pre>";
            echo $query."<br>";
            echo  $e->getMessage();
        }

        $this->db = null; /* 연결끊음 */
    }

}