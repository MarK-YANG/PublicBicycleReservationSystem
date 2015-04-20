<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 6:40 PM
 */

class bikeBook{

    private $db;

    /*
     * constructor
     */

    function __construct(){
        require_once('../DB_Util/DB_Connect.php');
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    /*
     * destructor
     */

    function __destruct(){

    }

    public function isExisted($id){
        $sql = "SELECT * FROM r_bike_book WHERE customer_id = '$id' AND finish_time = 'null'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function isAvailable($id){
        $sql = "SELECT * FROM t_bike WHERE station_id = '$id' AND available = 1";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function add($customerId, $stationId){
        $bikeSQL = "SELECT * FROM t_bike WHERE station_id = '$stationId' AND available = 1";
        $bikeResult = mysql_query($bikeSQL);
        $bike = mysql_fetch_array($bikeResult);
        $bikeId = $bike['bike_id'];
        $parkingspaceId = $bike['parkingspace_id'];

        $bikeBookSQL = "UPDATE t_bike SET available = 0 WHERE bike_id = '$bikeId'";
        mysql_query($bikeBookSQL);

        $uuid  = "BB".date('Ymd',time()).substr(md5(uniqid(mt_rand(), true)),0,8);
        $time = date('Y-m-d G:i:s',time());
        $sql = "INSERT INTO r_bike_book (id, customer_id, station_id, parkingspace_id, bike_id, start_time, finish_time, operate_by)
                VALUES ('$uuid', '$customerId', '$stationId','$parkingspaceId', '$bikeId', '$time', 'null', 'admin')";
        $result = mysql_query($sql);

        if($result){
            $selectSQL = "SELECT * FROM r_bike_book WHERE id = '$uuid'";
            $selectResult = mysql_query($selectSQL);
            return mysql_fetch_array($selectResult);
        }else{
            return false;
        }
    }

    public function cancel($uuid){
        $sql = "UPDATE r_bike_book SET finish_time = '2000-01-01 00:00:00' WHERE id = '$uuid'";
        $result = mysql_query($sql);

        $bikeBookSQL = "SELECT * FROM r_bike_book WHERE id = '$uuid'";
        $result = mysql_fetch_array(mysql_query($bikeBookSQL));

        $bikeId = $result['bike_id'];

        $bikeSQL = "UPDATE t_bike SET available = 1 WHERE bike_id = '$bikeId'";
        mysql_query($bikeSQL);

        if($result){
            return true;
        }else{
            return false;
        }
    }

}