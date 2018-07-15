<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 15.
 * Time: PM 8:25
 */

include_once('simplehtmldom_1_5/simple_html_dom.php');
class GetAddress
{
    function changeAddress($area, $place)
    {
        $link = "https://www.google.co.kr/search?q=";
        $link .=$area."+".$place;

        $html = file_get_html($link);

        foreach($html->find("img") as $element)
        {
            echo $element->src;
        }
    }
}
