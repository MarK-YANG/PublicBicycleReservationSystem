<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 4:16 PM
 */

class station{

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

    public function getAllStationStatus(){

        $result = array();

        $sql = "SELECT * FROM t_station";
        $stations = mysql_query($sql);

        while($row = mysql_fetch_array($stations)){

            $stationId = $row['station_id'];

            $bikeSQL = "SELECT * FROM t_bike WHERE station_id = '$stationId' AND available = 1";
            $bikeResult = mysql_query($bikeSQL);

            $parkingspaceSQL = "SELECT * FROM t_parkingspace WHERE station_id = '$stationId' AND available = 1";
            $parkingspaceResult = mysql_query($parkingspaceSQL);

            $result[] = array(
                "station_id" => $row['station_id'],
                'station_name' => $row['station_name'],
                'station_address' => $row['station_address'],
                'station_phone_number' => $row['station_phone_number'],
                'available_bike_count' => mysql_num_rows($bikeResult),
                'available_parkingspace_count' => mysql_num_rows($parkingspaceResult)
            );
        }

        return $result;

    }

    public function getStationStatusById($id){

        $sql = "SELECT * FROM t_station WHERE station_id = '$id'";
        $result = mysql_query($sql);

        $bikeSQL = "SELECT * FROM t_bike WHERE station_id = '$id' AND available = 1";
        $bikeResult = mysql_query($bikeSQL);
        $bikeCount = mysql_num_rows($bikeResult);

        $parkingspaceSQL = "SELECT * FROM t_parkingspace WHERE station_id = '$id' AND available = 1";
        $parkingspaceResult = mysql_query($parkingspaceSQL);
        $parkingspaceCount = mysql_num_rows($parkingspaceResult);

        if(mysql_num_rows($result) > 0){
            $row = mysql_fetch_array($result);
            return array(
                'station_id' => $row['station_id'],
                'station_name' => $row['station_name'],
                'station_address' => $row['station_address'],
                'station_phone_number' => $row['station_phone_number'],
                'available_bike_count' => $bikeCount,
                'available_parkingspace_count' => $parkingspaceCount
            );
        }else{
            return false;
        }

    }

    public function getStation($id){
        $sql = "SELECT * FROM t_station WHERE station_id = '$id'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }
}