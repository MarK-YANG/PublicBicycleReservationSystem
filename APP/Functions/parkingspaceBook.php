<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 8:10 PM
 */

class parkingspaceBook{

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
        $sql = "SELECT * FROM r_parkingspace_book WHERE customer_id = '$id' AND finish_time = 'null'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function isAvailable($id){
        $sql = "SELECT * FROM t_parkingspace WHERE station_id = '$id' AND available = 1";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }
    }

    public function add($customerId, $stationId){
        $parkingspaceSQL = "SELECT * FROM t_parkingspace WHERE station_id = '$stationId' AND available = 1";
        $parkingspaceResult = mysql_query($parkingspaceSQL);
        $parkingspace = mysql_fetch_array($parkingspaceResult);
        $parkingspaceId = $parkingspace['parkingspace_id'];

        $parkingspaceBookSQL = "UPDATE t_parkingspace SET available = 0 WHERE parkingspace_id = '$parkingspaceId'";
        mysql_query($parkingspaceBookSQL);

        $uuid  = "PB".date('Ymd',time()).substr(md5(uniqid(mt_rand(), true)),0,8);
        $time = date('Y-m-d G:i:s',time());
        $sql = "INSERT INTO r_parkingspace_book (id, customer_id, station_id, parkingspace_id, start_time, finish_time, operate_by)
                VALUES ('$uuid', '$customerId', '$stationId','$parkingspaceId', '$time', 'null', 'admin')";
        $result = mysql_query($sql);

        if($result){
            $selectSQL = "SELECT * FROM r_parkingspace_book WHERE id = '$uuid'";
            $selectResult = mysql_query($selectSQL);
            return mysql_fetch_array($selectResult);
        }else{
            return false;
        }
    }

    public function cancel($uuid){
        $sql = "UPDATE r_parkingspace_book SET finish_time = '2000-01-01 00:00:00' WHERE id = '$uuid'";
        mysql_query($sql);

        $parkingspaceSQL = "SELECT * FROM r_parkingspace_book WHERE id = '$uuid'";
        $result = mysql_fetch_array(mysql_query($parkingspaceSQL));

        $parkingspaceId = $result['parkingspace_id'];

        $bikeSQL = "UPDATE t_parkingspace SET available = 1 WHERE parkingspace_id = '$parkingspaceId'";
        mysql_query($bikeSQL);

        if($result){
            return true;
        }else{
            return false;
        }
    }

}