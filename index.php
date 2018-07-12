<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 9.
 * Time: PM 12:36
 */
require_once 'DBConnect.php';
require_once 'DataConnect.php';
header("Content-Type: text/html; charset=UTF-8");


//$datas = DBConnect::getPerformLists();
$dbclass = new DBConnect();
$datas = new DataConnect();

$dbclass->insertPerformData($datas->getDetailData(113961));