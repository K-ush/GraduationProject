<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 9.
 * Time: PM 12:36
 */
require_once('DBConnect.php');
require_once('DataConnect.php');
header("Content-Type: text/html; charset=UTF-8");

$dbclass = new DBConnect;
$datas = new DataConnect;
try
{
    $dbclass->insertPerformData($datas->getDetailData($_GET['seq']));

}
catch(Exception $e)
{
    echo $e->getMessage();
}


//$datas->getDataLists();