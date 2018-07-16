<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 9.
 * Time: PM 12:36
 */
require_once('DBConnect.php');
require_once('DataConnect.php');
header('Content-Type: application/json');

$dbclass = new DBConnect;
$datas = new DataConnect;
try
{
    switch($_GET['type'])
    {
        case 'list':
            $result = $dbclass->getPerformLists($_GET['option']);

            $output = json_encode($result, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);

            echo urldecode($output);

            break;

        case 'data':
            $result = $dbclass->getDetailData($_GET['seq']);

            $output = json_encode($result, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);

            echo urldecode($output);

            break;
        case 'search':
            $result = $dbclass->getPerformListsByKeyword($_GET['keyword']);

            $output = json_encode($result, JSON_UNESCAPED_UNICODE + JSON_PRETTY_PRINT);

            echo urldecode($output);
            break;

        case 'insert':
            $result = $datas->getDataLists();

            $dbclass->insertPerformList($result);

            echo "insertPerformList execute";
            break;
    }



}catch(Exception $e)
{
    echo $e->getMessage();
}

/*
 *  $groupData["memberData"] = $memberData;

    // JSON Array가 포함된 Object를 문자열로 변환
    $output =  json_encode($groupData);

    // 출력
    echo  urldecode($output);
*/
//$datas->getDataLists();