<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/27/15
 * Time: 1:58 PM
 */

$keyword = $_GET['q'];

$mysql_server_name = 'localhost';
$mysql_username = 'root';
$mysql_password = 'yang';
$mysql_database = 'PublicBicycleReservationSystem';

$conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);

mysql_select_db($mysql_database, $conn);

mysql_query('set names utf8');


if (!$conn) {
    die('Could not connect: ' . mysql_error());
}


$bikeSql = "SELECT * FROM t_bike WHERE bike_id = '$keyword'";
$bikeResult = mysql_query($bikeSql);
$bike = mysql_fetch_array($bikeResult);


if(mysql_num_rows($bikeResult) == 0){
    echo " : : : :";
}else{
    echo $bike['bike_id'].":";

    if($bike['available'] == 0){
        echo "否:";
    }else{
        echo "是:";
    }
    echo $bike['parkingspace_id'].":";
    echo $bike['station_id'];
}


