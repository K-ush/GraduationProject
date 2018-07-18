<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 16.
 * Time: PM 3:41
 */
require_once('DBConnect.php');
require_once('DetailData.php');

include_once 'include/header.php';

$seq = $_GET['seq'];

$dbclass = new DBConnect();
$data = new DetailData();

try {
    $query = "select title, subTitle, imgUrl, startDate, endDate, realmName, placeAddr, place from detailDatas where seq = ".$seq;

    $db = DBConnect::getDB();

    $result = $db->query($query);
    $db = null; /* 연결 끊음 */

    foreach($result as $row)
    {
        $data->setTitle($row['title']);
        $data->setSubTitle($row['subTitle']);
        $data->setImgUrl($row['imgUrl']);
        $data->setStartDate($row['startDate']);
        $data->setEndDate($row['endDate']);
        $data->setRealmName($row['realmName']);
        $data->setPlaceAddr($row['placeAddr']);
        $data->setPlace($row['place']);
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>같이갈래?</title>
    <link rel="stylesheet" href="./res/css/style.css">
</head>
<body>

<section id="main">
    <div class="wrap">
        <div class="viewbox">
            <div class="poster">
                <img src="<?php echo $data->getImgUrl() ?>" alt="">
            </div>
            <div class="textbox">
                <h1 class="title"><?php echo $data->getTitle() ?></h1>
                <h1 class="sub"><?php echo $data->getSubTitle() ?></h1>
                <table class="info">
                    <tr>
                        <td class="infotitle">공연기간:</td>
                        <td class="infoval"><?php echo $data->getStartDate()."~".$data->getEndDate() ?></td>
                        <td class="infotitle" style="width:6%">장르:</td>
                        <td class="infoval"><?php echo $data->getRealmName() ?></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr>
                        <?php
                        if($data->getPlace())
                        ?>
                        <td class="infotitle">공연장소:</td>
                        <td class="infoval place" colspan="3">
                            <?php echo $data->getPlace()?><br>
                            <p><?php echo $data->getPlaceAddr(); ?>&nbsp;</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="content">
            <div class="contenttitle">
                이런 공연은 어떠세요?
            </div>
            <div class="contentbox">
                <!--<div class="contentcard">
                    <img src="http://www.culture.go.kr/upload/rdf/18/05/rdf_2018053117191987720.jpg" alt="">
                    <div class="cardtitle">이름 몰라요</div>
                </div>-->
                <?php
                try {
                    $query = "select seq, title, thumbnail from performDatas where seq <> ".$seq." order by rand() limit 0, 5";

                    $db=DBConnect::getDB();

                    $result = $db->query($query);
                    $db = null; /* 연결 끊음 */

                    foreach($result as $row)
                    {
                        $title = mb_substr($row['title'],0,12);
                        if($title != $row['title'])
                            $title.="...";

                        echo "<a href=\"/sub.php?seq=" . $row['seq'] . "\">";
                        echo "<div class=\"contentcard\">";
                        echo "<img src=\"".$row['thumbnail']."\" alt=\"\">";
                        echo "<div class=\"cardtitle\">".$title."</div>";
                        echo "</div>";
                        echo "</a>";
                    }

                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
                ?>

            </div>

        </div>
    </div>

</section>


</body>
</html>
