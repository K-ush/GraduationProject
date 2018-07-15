<?php
header("Content-Type: text/html; charset=UTF-8");



$addr = "http://www.culture.go.kr/openapi/rest/publicperformancedisplays/";
$key = "serviceKey=ZNZV1BXnl0kRebCqIy6Njuo2ZqXgy6hXzPvMOY9Iw55414T0xINWSrF%2Btx06PvMO7aClJHwjEPf0CLZT0ojhrg%3D%3D";

switch($_GET['t'])
{
    case "r":
        $type="realm?";
        break;
    case "p":
        $type="period?";
        break;
    case "d":
        $type="d/?seq=".$_GET['seq']."&";
        break;
    default:
        $type="period?";

}

echo "<br><br><br><a href='".$addr.$type.$key."'>asdf</a>";