<?php
require_once('DBConnect.php');
require_once('DataConnect.php');
header("Content-Type: text/html; charset=UTF-8");

/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 16.
 * Time: PM 12:59
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>같이갈래?</title>
    <link rel="shortcut icon" href="./img/corn2.ico">
    <link rel="icon" href="./img/corn2.ico">

    <link rel="stylesheet" href="./res/slick/slick.css">
    <link rel="stylesheet" href="./res/slick/slick-plus.css">
    <link rel="stylesheet" href="./res/css/style.css">
    <link rel="stylesheet" href="./res/datepicker/css/datepicker.min.css">
</head>
<body>
<div class="load">
    <div class="gr">
        <img src="./img/logo2.png" alt="logo">
    </div>
</div>
<div class="bg">
    <header>
        <div class="wrap">
            <img src="./img/logo.png" alt="logo">
            <form class="searchbox" action="/list.php" method="get">
                <input type="text" name="keyword">
                <button type="submit"></button>
            </form>
        </div>
    </header>
    <div id="ani" class="w100">

        <?php
        $dbclass = new DBConnect();

        try {
            $query = "select seq, thumbnail from performDatas where thumbnail != '' order by seq desc limit 0, 8;";

            $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $db->query($query);
            $db = null; /* 연결 끊음 */

            foreach ($result as $row) {
                ?>
                <div class="card">
                    <?php echo "<a href=\"/sub.php?seq=" . $row['seq'] . "\">" ?>
                    <?php echo "<img src=" . $row['thumbnail'] . " alt=''>" ?>
                    <?php echo "</a>" ?>
                </div>
                <?php
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>

    </div>
    <div id="searchbox">
        <form class="box" action="/list.php" method="get">
            <div>
                <h1 class="titlebar">장르</h1>
                <select name="realmName">
                    <?php
                    $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $query = "select distinct realmName from detailDatas";

                    $result = $db->query($query);

                    foreach($result as $row)
                    {
                        echo "<option>".$row['realmName']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div>
                <h1 class="titlebar">지역</h1>
                <select name="area">

                    <?php
                    $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $query = "select distinct area from detailDatas";

                    $result = $db->query($query);

                    foreach($result as $row)
                    {
                        echo "<option>".$row['area']."</option>";
                    }
                    ?>

                </select>
            </div>
            <div>
                <h1 class="titlebar" for="date">날짜</h1>
                <input type="text" class="date" id="date" name="date" data-date-format="yyyy-mm-dd">
            </div>
            <button>검색</button>
    </div>
    </form>
</div>
<div class="content">
    <div class="wrap">
        <div class="contentbar">
            <span class="this">새 공연</span>
            <span>콘서트</span>
            <span>연극</span>
            <span>음악</span>
            <span>무용</span>
        </div>
        <div class="contentbox">
            <?php
            $dbclass = new DBConnect();

            try {
                $query = "select seq, thumbnail, title from performDatas where thumbnail != '' order by seq desc limit 0, 5;";

                $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $db->query($query);
                $db = null; /* 연결 끊음 */

                foreach ($result as $row) {
                    echo "<a href=\"/sub.php?seq=" . $row['seq'] . "\">";
                    echo "<div class=\"contentcard\">";
                    echo "<img src=" . $row['thumbnail'] . " alt=''>";
                    echo "<div class=\"cardtitle\">".$row['title']."</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>

        </div>
        <div class="contentbox" style="display: none">
            <?php
            $dbclass = new DBConnect();

            try {
                $query = "select seq, thumbnail, title from performDatas where realmName = \"콘서트\" and thumbnail != '' order by seq desc limit 0, 5;";

                $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $db->query($query);
                $db = null; /* 연결 끊음 */

                foreach ($result as $row) {
                    echo "<a href=\"/sub.php?seq=" . $row['seq'] . "\">";
                    echo "<div class=\"contentcard\">";
                    echo "<img src=" . $row['thumbnail'] . " alt=''>";
                    echo "<div class=\"cardtitle\">".$row['title']."</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            ?>

        </div>
        <div class="contentbox" style="display: none">
            <?php
            $dbclass = new DBConnect();

            try {
                $query = "select seq, thumbnail, title from performDatas where realmName = \"연극\" and thumbnail != '' order by seq desc limit 0, 5;";

                $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $db->query($query);
                $db = null; /* 연결 끊음 */

                foreach ($result as $row) {
                    echo "<a href=\"/sub.php?seq=" . $row['seq'] . "\">";
                    echo "<div class=\"contentcard\">";
                    echo "<img src=" . $row['thumbnail'] . " alt=''>";
                    echo "<div class=\"cardtitle\">".$row['title']."</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } catch (PDOException $e) {
            }
            ?>

        </div>
        <div class="contentbox" style="display: none">
            <?php
            $dbclass = new DBConnect();

            try {
                $query = "select seq, thumbnail, title from performDatas where realmName = \"음악\" and thumbnail != '' order by seq desc limit 0, 5;";

                $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $db->query($query);
                $db = null; /* 연결 끊음 */

                foreach ($result as $row) {
                    echo "<a href=\"/sub.php?seq=" . $row['seq'] . "\">";
                    echo "<div class=\"contentcard\">";
                    echo "<img src=" . $row['thumbnail'] . " alt=''>";
                    echo "<div class=\"cardtitle\">".$row['title']."</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } catch (PDOException $e) {
            }
            ?>

        </div>
        <div class="contentbox" style="display: none">
            <?php
            $dbclass = new DBConnect();

            try {
                $query = "select seq, thumbnail, title from performDatas where realmName = \"무용\" and thumbnail != '' order by seq desc limit 0, 5;";

                $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $result = $db->query($query);
                $db = null; /* 연결 끊음 */

                foreach ($result as $row) {
                    echo "<a href=\"/sub.php?seq=" .$row['seq'] . "\">";
                    echo "<div class=\"contentcard\">";
                    echo "<img src=" . $row['thumbnail'] . " alt=''>";
                    echo "<div class=\"cardtitle\">".$row['title']."</div>";
                    echo "</div>";
                    echo "</a>";
                }
            } catch (PDOException $e) {
            }
            ?>

        </div>

    </div>

</div>


<script src="./res/jquery/jquery.min.js"></script>
<script src="./res/datepicker/js/datepicker.min.js"></script>

<script src="./res/datepicker/js/i18n/datepicker.ko.js"></script>
<script src="./res/slick/slick.js"></script>
<script src="./res/js/js.js"></script>

</body>
</html>