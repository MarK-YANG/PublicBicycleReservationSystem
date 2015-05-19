<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 8:31 PM
 */

class historicalOrder{

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

    public function bike($id){

        $sql = "SELECT * FROM r_bike_book WHERE customer_id = '$id' AND finish_time <> 'null' AND finish_time <> '2000-01-01 00:00:00'
                AND finish_time <> '1999-01-01 00:00:00'  ORDER BY start_time DESC";
        $result = mysql_query($sql);

        if(mysql_num_rows($result) > 0){
            $arr = array();
            while($row = mysql_fetch_array($result)){

                $user = $this->getUser($row['customer_id'])['name'];
                $station = $this->getStation($row['station_id'])['station_name'];

                $arr[] = array(
                    'id' => $row['id'],
                    'customer_id' => $row['customer_id'],
                    'station_id' => $row['station_id'],
                    'start_time' => $row['start_time'],
                    'finish_time' => $row['finish_time'],
                    'customer_name' => $user,
                    'station_name' => $station
                );
            }

            return $arr;
        }else{
            return false;
        }
    }

    public function parkingspace($id){
        $sql = "SELECT * FROM r_parkingspace_book WHERE customer_id = '$id'AND finish_time <> 'null' AND finish_time <> '2000-01-01 00:00:00'
                AND finish_time <> '1999-01-01 00:00:00'  ORDER BY start_time DESC";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            $arr = array();
            while($row = mysql_fetch_array($result)){

                $user = $this->getUser($row['customer_id'])['name'];
                $station = $this->getStation($row['station_id'])['station_name'];

                $arr[] = array(
                    'id' => $row['id'],
                    'customer_id' => $row['customer_id'],
                    'station_id' => $row['station_id'],
                    'start_time' => $row['start_time'],
                    'finish_time' => $row['finish_time'],
                    'customer_name' => $user,
                    'station_name' => $station
                );
            }

            return $arr;
        }else{
            return false;
        }
    }

    public function rent($id){
        $sql = "SELECT * FROM r_bike_rent WHERE customer_id = '$id' ORDER BY start_time DESC ";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) > 0){
            $arr = array();
            while($row = mysql_fetch_array($result)){

                $user = $this->getUser($row['customer_id'])['name'];
                $rentStation = $this->getStation($row['rent_station_id'])['station_name'];
                $returnStation = $this->getStation($row['return_station_id'])['station_name'];

                $arr[] = array(
                    'id' => $row['id'],
                    'customer_id' => $row['customer_id'],
                    'station_id' => $row['rent_station_id'],
                    'start_time' => $row['start_time'],
                    'finish_time' => $row['finish_time'],
                    'customer_name' => $user,
                    'rent_station_name' => $rentStation,
                    'return_station_name' => $returnStation,
                    'cost' => $row['cost']
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