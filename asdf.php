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
echo $_GET['area']." ".$_GET['place']."<br>";

$address->changeAddress($_GET['area'], $_GET['place']);

