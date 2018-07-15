<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 15.
 * Time: PM 8:25
 */

class getAddress
{
    function getAddress($area, $place)
    {
        echo $area." ".$place."<br>";
        $link = "https://www.google.co.kr/search?q=";
        $link .=$area."+".$place;

        echo $link;
    }
}
