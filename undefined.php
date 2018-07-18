<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 16.
 * Time: PM 7:15
 */
include 'include/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>같이갈래?</title>
    <link rel="stylesheet" href="./res/css/style.css">

</head>
<body>

<section id="undefind">
    <h1>
        <span class="this"><?php echo $_GET['keyword']; ?></span> 검색 결과가 없습니다<br>
        <span class="sub">다른 키워드로 검색해 보세요!</span>

    </h1>
</section>

</body>
</html>