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
        require_once('DataConnect.php');
        require_once('DatasVO.php');
    }

    function getPerformLists()
    {
        $endDate = date("Ymd");
        $query = "select * from performDatas where endDate < " . $endDate . " order by seq desc limit 0, 10;";

        try
        {
            $this->db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $this->db->query($query);
            $this->db = null; /* 연결 끊음 */

            foreach ($result as $row) {
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
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }

        return $this->list;
    }

    function insertPerformList($datas) // $datas -> DatasVO 객체가 들어있는 배열
    {
        foreach($datas as $data)
        {
            try
            {
                $this->db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "select seq from performDatas where seq = ".$data->getSeq();
                $result = $this->db->query($query);

                foreach($result as $row)
                {
                    if($row['seq'] != 0)
                    {
                        continue;
                    }
                    else
                    {
                        $query = "insert into performDatas(seq, title, startdate, enddate, place, realmname, area, thumbnail, gpsx, gpsY) "
                            ."values (?,?,?,?,?,?,?,?,?,?)";
                        $stmt = $this->db->prepare($query);

                        $stmt->bindParam(1, $data->getSeq());
                        $stmt->bindParam(2, $data->getTitle());
                        $stmt->bindParam(3, $data->getStartDate());
                        $stmt->bindParam(4, $data->getEndDate());
                        $stmt->bindParam(5, $data->getPlace());
                        $stmt->bindParam(6, $data->getRealmName());
                        $stmt->bindParam(7, $data->getArea());
                        $stmt->bindParam(8, $data->getThumbnail());
                        $stmt->bindParam(9, $data->getGpsX());
                        $stmt->bindParam(10, $data->getGpsY());

                        $stmt->execute();
                    }
                }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage()."<br>";
            }
        }
    }

    function getDetailData($seq)
    {
        $query = "select * from detailDatas where seq = ".$seq;

        try
        {
            $this->db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $this->db->query($query);

            foreach($result as $row)
            {
                $data = new DetailData;

                $data->setSeq($row['seq']);
                $data->setTitle($row['title']);
                $data->setStartDate($row['startDate']);
                $data->setEndDate($row['endDate']);
                $data->setPlace($row['place']);
                $data->setRealmName($row['realmName']);
                $data->setArea($row['area']);
                $data->setSubTitle($row['subTitle']);
                $data->setPrice($row['price']);
                $data->setContents1($row['contents1']);
                $data->setContents2($row['contents2']);
                $data->setUrl($row['url']);
                $data->setPhone($row['phone']);
                $data->setGpsX($row['gpsX']);
                $data->setGpsY($row['gpsY']);
                $data->setImgUrl($row['imgUrl']);
                $data->setPlaceUrl($row['placeUrl']);
                $data->setPlaceAddr($row['placeAddr']);
                $data->setPlaceSeq($row['placeSeq']);

                return $data;
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function insertPerformData($data)
    {
        try
        {
            $this->db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "insert into detailDatas(seq, title, startDate, endDate, place, realmName, area, subTitle, price, contents1, contents2, url, phone, gpsX, gpsY, imgUrl, placeUrl, placeAddr, placeSeq) "
                     ."values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(1,$data->getSeq());
            $stmt->bindParam(2,$data->getTitle());
            $stmt->bindParam(3,$data->getStartDate());
            $stmt->bindParam(4,$data->getEndDate());
            $stmt->bindParam(5,$data->getPlace());
            $stmt->bindParam(6,$data->getRealmName());
            $stmt->bindParam(7,$data->getArea());
            $stmt->bindParam(8,$data->getSubTitle());
            $stmt->bindParam(9,$data->getPrice());
            $stmt->bindParam(10,$data->getContents1());
            $stmt->bindParam(11,$data->getContents2());
            $stmt->bindParam(12,$data->getUrl());
            $stmt->bindParam(13,$data->getPhone());
            $stmt->bindParam(14,$data->getGpsX());
            $stmt->bindParam(15,$data->getGpsY());
            $stmt->bindParam(16,$data->getImgUrl());
            $stmt->bindParam(17,$data->getPlaceUrl());
            $stmt->bindParam(18,$data->getPlaceAddr());
            $stmt->bindParam(19, $data->getPlaceSeq());

            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}