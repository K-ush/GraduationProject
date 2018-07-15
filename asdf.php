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

//$address->changeAddress($_GET['area'], $_GET['place']);



include_once('simplehtmldom_1_5/simple_html_dom.php');

$link = "https://www.naver.com";
//$link .= $_GET['area']."+".$_GET['$place'];

// 네이버 html을 가져온다

$html = file_get_html($link);

// 모든 이미지태그를 찾고

foreach($html->find('img') as $element) {

    echo $element->src . '<br>';
}


// 모든 a태그를 찾아내어 href속성을 뿌려줍니다.

foreach($html->find('a') as $element) {

    echo $element->href . '<br>';
}


출처: http://hnark.tistory.com/137 [tiend]