<?php
/**
 * Created by PhpStorm.
 * User: kush
 * Date: 2018. 7. 15.
 * Time: AM 3:22
 */

class AutoInsert
{
    private $db;
    public function __construct()
    {
        require_once('DBConnect.php');
        require_once('DataConnect.php');
    }

    function getDBSeq()
    {
        try
        {
            $this->db = new PDO('mysql:host=localhost;dbname=seungh;charset=utf8mb4', 'seungh', 'jgd486952317');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "select seq from performDatas limit 1";
            $result = $this->db->query($query);
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

}