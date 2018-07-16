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
    <title>DaDa</title>
    <link rel="shortcut icon" href="./img/corn2.ico" type="image/x-icon" />
    <link rel="icon" href="./img/corn2.ico" type="image/x-icon" />

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
            <form class="searchbox" action="/list" method="get">
                <input type="text" name="title">
                <button type="submit"></button>
            </form>
        </div>
    </header>
    <div id="ani" class="w100">

        <?php
        $dbclass = new DBConnect();

        try {
            $query = "select thumbnail from performDatas order by seq desc limit 0, 8;";

            $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $db->query($query);
            $db = null; /* 연결 끊음 */

            foreach ($result as $row) {
                ?>
                <div class="card">
                    <?php echo "<img src=".$row['thumbnail']." alt=''>"?>
                </div>
                <?php
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        ?>

    </div>
    <div id="searchbox">
        <form class="box" action="/list" method="get">
            <div>
                <h1 class="titlebar">장르</h1>
                <select name="realmName">
                    <option selected>콘서트</option>
                    <option>전시</option>
                </select>
            </div>
            <div>
                <h1 class="titlebar">지역</h1>
                <select name="area">
                    <option selected>서울</option>
                    <option>경기</option>
                </select>
            </div>
            <div>
                <h1 class="titlebar" for="date">날짜</h1>
                <input type="text" class="date" id="date" name="startDate" data-date-format="yyyy-mm-dd">
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
            <span>뮤지컬</span>
            <span>음악</span>
            <span>무용</span>
        </div>
        <div class="contentbox">
            <a href="/sub.php?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/rdf_2018053117191987720.jpg" alt="">
                    <div class="cardtitle">이름 몰라요</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/06/show_2018062715242395641.jpg" alt="">
                    <div class="cardtitle">모른다고요</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/15303430260680622_문화포털.jpg" alt="33">
                    <div class="cardtitle">아몰랑</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/show_20180528950966766.JPG" alt="">
                    <div class="cardtitle">아 모른다고</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/03/show_201803261347141013.JPG" alt="">
                    <div class="cardtitle">몰라</div>
                </div>
            </a>
        </div>

        <div class="contentbox" style="display: none">
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/rdf_2018053117191987720.jpg" alt="">
                    <div class="cardtitle">이름 몰라요1</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/06/show_2018062715242395641.jpg" alt="">
                    <div class="cardtitle">모른다고요</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/15303430260680622_문화포털.jpg" alt="33">
                    <div class="cardtitle">아몰랑</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/show_20180528950966766.JPG" alt="">
                    <div class="cardtitle">아 모른다고</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/03/show_201803261347141013.JPG" alt="">
                    <div class="cardtitle">몰라</div>
                </div>
            </a>
        </div>
        <div class="contentbox" style="display: none">
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/rdf_2018053117191987720.jpg" alt="">
                    <div class="cardtitle">이름 몰라요2</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/06/show_2018062715242395641.jpg" alt="">
                    <div class="cardtitle">모른다고요</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/15303430260680622_문화포털.jpg" alt="33">
                    <div class="cardtitle">아몰랑</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/show_20180528950966766.JPG" alt="">
                    <div class="cardtitle">아 모른다고</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/03/show_201803261347141013.JPG" alt="">
                    <div class="cardtitle">몰라</div>
                </div>
            </a>
        </div>
        <div class="contentbox" style="display: none">
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/rdf_2018053117191987720.jpg" alt="">
                    <div class="cardtitle">이름 몰라요3</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/06/show_2018062715242395641.jpg" alt="">
                    <div class="cardtitle">모른다고요</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/15303430260680622_문화포털.jpg" alt="33">
                    <div class="cardtitle">아몰랑</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/show_20180528950966766.JPG" alt="">
                    <div class="cardtitle">아 모른다고</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/03/show_201803261347141013.JPG" alt="">
                    <div class="cardtitle">몰라</div>
                </div>
            </a>
        </div>
        <div class="contentbox" style="display: none">
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/rdf_2018053117191987720.jpg" alt="">
                    <div class="cardtitle">이름 몰라요4</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/06/show_2018062715242395641.jpg" alt="">
                    <div class="cardtitle">모른다고요</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/15303430260680622_문화포털.jpg" alt="33">
                    <div class="cardtitle">아몰랑</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/show_20180528950966766.JPG" alt="">
                    <div class="cardtitle">아 모른다고</div>
                </div>
            </a>
            <a href="/sub?seq=">
                <div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/03/show_201803261347141013.JPG" alt="">
                    <div class="cardtitle">몰라</div>
                </div>
            </a>
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