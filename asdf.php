<?php
header("Content-Type: text/html; charset=UTF-8");

/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 15.
 * Time: PM 8:29
 */

require_once('GetAddress.php');

$address = new GetAddress;

$address->getAddress($_GET['area'], $_GET['place']);
$endDate = date('Ymd');

echo "select * from performDatas where endDate > " . $endDate . " and realmName = '".$_GET['option']."' order by seq desc limit 0, 10;";