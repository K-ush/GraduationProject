<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 9.
 * Time: PM 12:36
*/

global $db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
if($db==null)
{
	echo "db is null";
}
foreach($db->query('select * from performDatas') as $row)
{
    echo $row['title'].' '.$row['seq'];
}
