<?php
header("Content-Type: text/html; charset=UTF-8");
require_once('DBConnect.php');
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 15.
 * Time: PM 8:29
 */

$dbclass = new DBConnect();

try {

    $query = "select seq, thumbnail, title, area, place, startDate, endDate from performDatas where title like '%" . $_GET['keyword'] . "%' order by seq desc;";

    $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $db->exec($query);
    $db = null; /* 연결 끊음 */


} catch (PDOException $e) {
    echo $e->getMessage();
}

