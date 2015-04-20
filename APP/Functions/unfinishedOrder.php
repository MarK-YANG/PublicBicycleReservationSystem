<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 8:31 PM
 */

class unfinishedOrder{

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

    public function bikeOrder($id){

        $sql = "SELECT * FROM r_bike_book WHERE customer_id = '$id' AND finish_time = 'null'";
        $result = mysql_query($sql);

        if(mysql_num_rows($result) > 0){
            $arr = array();
            while($row = mysql_fetch_array($result)){

                $user = $this->getUser($row['customer_id'])['name'];
                $station = $this->getStation($row['station_id'])['station_name'];

                $start = strtotime($row['start_time']);
                $time = date('Y-m-d G:i:s',time());
                $end = strtotime($time);
                $left = 35 - floor(($end - $start)/60);

                $arr[] = array(
                    'id' => $row['id'],
                    'customer_id' => $row['customer_id'],
                    'station_id' => $row['station_id'],
                    'start_time' => $row['start_time'],
                    'left_time' => $left,
                    'customer_name' => $user,
                    'station_name' => $station

                );
            }

            return $arr;
        }else{
            return false;
        }
    }

    public function parkingspaceOrder($id){
        $sql = "SELECT * FROM r_parkingspace_book WHERE customer_id = '$id' AND finish_time = 'null'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            $arr = array();
            while($row = mysql_fetch_array($result)){

                $user = $this->getUser($row['customer_id'])['name'];
                $station = $this->getStation($row['station_id'])['station_name'];

                $start = strtotime($row['start_time']);
                $time = date('Y-m-d G:i:s',time());
                $end = strtotime($time);
                $left = 35 - floor(($end - $start)/60);

                $arr[] = array(
                    'id' => $row['id'],
                    'customer_id' => $row['customer_id'],
                    'station_id' => $row['station_id'],
                    'start_time' => $row['start_time'],
                    'left_time' => $left,
                    'customer_name' => $user,
                    'station_name' => $station
                );
            }

            return $arr;
        }else{
            return false;
        }
    }


    public function getUser($id){
        $sql = "SELECT * FROM t_customer WHERE customer_id = '$id'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }

    public function getStation($id){
        $sql = "SELECT * FROM t_station WHERE station_id = '$id'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }

}