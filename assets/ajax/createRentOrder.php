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

$resultArr = array();

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}


$stationSql = "SELECT * FROM t_station WHERE station_id = '$keyword'";
$stationResult = mysql_query($stationSql);
$station = mysql_fetch_array($stationResult);

$bikeSql = "SELECT * FROM t_bike WHERE station_id = '$keyword' AND available = 1";
$bikeResult = mysql_query($bikeSql);
$bikeCount = mysql_num_rows($bikeResult);


if(mysql_num_rows($stationResult) == 0){
    echo " : : : :";
}else{
    echo $station['station_id'].":";
    echo $station['station_name'].":";
    echo $station['station_address'].":";
    echo $station['station_phone_number'].":";
    echo $bikeCount;
}


