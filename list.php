<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 16.
 * Time: PM 3:23
 */
require_once('DBConnect.php');
$cnt = 0;

if($_GET['keyword'] == null)
    $searchTitle = $_GET['realmName']." / ".$_GET['area']." / ".$_GET['date'];
else
    $searchTitle = $_GET['keyword'];

include_once('include/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>같이갈래?</title>
    <link rel="stylesheet" href="./res/css/style.css">
</head>
<body>
<header class="different">
    <div class="wrap">
        <a href="/">
            <img src="./img/logo.png" alt="logo">
        </a>
        <form class="searchbox" action="/list.php" method="get">
            <input type="text" name="keyword">
            <button type="submit"></button>
        </form>
    </div>
</header>
<style>
    #list {
        min-height: 100vh;
        height: auto;
        background: #fafafa;
    }

    #list .keyword {

        height: 200px;
        line-height: 200px;
        text-align: center;
    }

    #list .listcard {
        padding: 20px 40px;
        width: 95%;
        height: 300px;
        background: #fff;
        box-shadow: 0px 4px 30px #eee;
        margin: 30px auto;
    }

    #list .listcard > * {
        float: left;
    }

    #list .listcard img {
        width: 195px;
        height: 100%;
        border-radius: 10px;
    }

    #list .listcard .listtext {
        padding-top: 30px;
        padding-left: 60px;
    }

    #list .listcard .listtext .title {
        font-weight: 100;
        font-size: 28px;
        margin-bottom: 100px;
    }

    #list .listcard .listtext .place {
        margin-bottom: 15px;
        font-weight: 100;
    }

    #list .listcard .listtext .date {
        font-weight: 100;
    }
</style>

<section id="list">
    <div class="wrap">
        <h1 class="keyword">
            <span class="this"><?php echo $searchTitle ?></span> 검색결과
        </h1>


        <?php

        $dbclass = new DBConnect();

        try {
            if ($_GET['keyword'] == null) {
                $query = "select seq, thumbnail, title, area, place, startDate, endDate from performDatas where realmName = '" . $_GET['realmName'] . "' and area = '" . $_GET['area'] .
                    "' and startDate <= \"" . $_GET['date'] . "\" and endDate >= \"" . $_GET['date'] . "\" order by seq desc;";
            }
            else
                $query = "select seq, thumbnail, title, area, place, startDate, endDate from performDatas where title like '%" . $_GET['keyword'] . "%' order by seq desc;";

            $db = DBConnect::getDB();

            $result = $db->query($query);
            $db = null; /* 연결 끊음 */

            foreach ($result as $row) {
                $cnt++;

                $title = mb_substr($row['title'],0,25);
                if($title != $row['title'])
                    $title.="...";

                $place = $row['area']." / ".$row['place'];

                if($row['area'] == "" && $row['place'] == "")
                    $place = "";
                else if($row['area'] == "")
                    $place = $row['place'];
                else if($row['place'] == "")
                    $place = $row['area'];



                ?>
                <div class="card">
                    <?php echo "<a href=\"/sub.php?seq=" . $row['seq'] . "\">"; ?>
                    <?php echo "<div class=\"listcard\">"; ?>
                    <?php echo "<img src=" . $row['thumbnail'] . " alt=''>"; ?>
                    <?php echo "<div class=\"listtext\">"; ?>
                    <?php echo "<h1 class=\"title\">" . $title . "</h1>"; ?>
                    <?php echo "<h3 class=\"place\">" . $place . "</h3>"; ?>
                    <?php echo "<h3 class=\"date\">" . $row['startDate'] . "~" . $row['endDate'] . "</h3>"; ?>
                    <?php echo "</div>"; ?>
                    <?php echo "</div>"; ?>
                    <?php echo "</a>" ?>
                </div>
                <?php
            }
            if($cnt == 0)
            {
                header("Location: ./undefined.php?keyword=".$_GET['keyword']);
                die();
            }

        } catch (PDOException $e) {
        }

        ?>

    </div>


</section>
</body>
</html>
