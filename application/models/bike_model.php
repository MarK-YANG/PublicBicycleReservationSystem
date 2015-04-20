<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/23/15
 * Time: 8:39 PM
 */

class Bike_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function bikeSelect($bikeId){
        $this->db->where('bike_id', $bikeId);
        $this->db->select('*');
        $query = $this->db->get('t_bike');
        return $query->result();
    }

    function bikeAvailable($stationId){
        $this->db->where('available', 1);
        $this->db->where('station_id', $stationId);
        $this->db->select('*');
        $query = $this->db->get('t_bike');
        return $query->result();
    }

    function bikeInsert($var){
        $this->db->insert('t_bike', $var);
    }

    function bikeUpdate($bikeId, $var){
        $this->db->where('bike_id', $bikeId);
        $this->db->update('t_bike', $var);
    }

    function bikeDelete($bikeId){
        $this->db->where('bike_id', $bikeId);
        $this->db->delete('t_bike');
    }

    function changeAvailable($bikeId, $state){
        $this->db->where('bike_id', $bikeId);
        $arr = array("available" => $state);
        $this->bikeUpdate($bikeId, $arr);
    }

    function setParkingspace($bikeId, $parkingspaceId){
        $this->db->where('bike_id', $bikeId);
        $arr = array("parkingspace_id" => $parkingspaceId);
        $this->bikeUpdate($bikeId, $arr);
    }



}

?>