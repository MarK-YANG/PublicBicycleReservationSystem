<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/25/15
 * Time: 3:46 PM
 */

require_once('../DB_Util/DB_Connect.php');

$db = new DB_Connect();

$db->connect();


$sql = "SELECT * FROM t_customer";

$result = mysql_query($sql);

while ($row = mysql_fetch_array($result)) {
    echo var_dump($row);

}

echo date('Y-m-d G:i:s', time());
