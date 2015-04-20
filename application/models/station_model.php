<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/23/15
 * Time: 8:11 PM
 */

class Station_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function stationSelectAll(){
        $this->db->select('*');
        $query = $this->db->get("t_station");
        return $query->result();
    }

    function stationSelect($stationId){
        $this->db->where("station_id", $stationId);
        $this->db->select("*");
        $query = $this->db->get("t_station");
        return $query->result();
    }

    function stationInsert($var){
        $this->db->insert('t_station', $var);
    }

    function stationUpdate($stationId,$var){
        $this->db->where("station_id", $stationId);
        $this->db->update('t_station', $var);
    }

    function stationDelete($stationId){
        $this->db->where('station_id', $stationId);
        $this->db->delete('t_station');
    }
}