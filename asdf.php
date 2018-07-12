<?php 

require_once 'DBConnect.php';
$db = new DBConnect;

$result = $db->getPerformLists();
foreach($result as $row)
{

	echo "<pre>".$row->getSeq()."	".$row->getTitle()."	".$row->getStartDate()."  ".$row->getEndDate()."<br></pre>";
}