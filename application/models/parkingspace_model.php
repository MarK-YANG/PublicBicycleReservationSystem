<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/23/15
 * Time: 8:39 PM
 */

class Parkingspace_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function parkingspaceSelect($parkingspaceId){
        $this->db->where('parkingspace_id', $parkingspaceId);
        $this->db->select('*');
        $query = $this->db->get('t_parkingspace');
        return $query->result();
    }

    function parkingspaceAvailable($stationId){
        $this->db->where('available', 1);
        $this->db->where('station_id', $stationId);
        $this->db->select('*');
        $query = $this->db->get('t_parkingspace');
        return $query->result();
    }

    function parkingspaceInsert($var){
        $this->db->insert('t_parkingspace', $var);
    }

    function parkingspaceUpdate($bikeId, $var){
        $this->db->where('parkingspace_id', $bikeId);
        $this->db->update('t_parkingspace', $var);
    }

    function parkingspaceDelete($bikeId){
        $this->db->where('parkingspace_id', $bikeId);
        $this->db->delete('t_parkingspace');
    }

    function changeAvailable($parkingspaceId, $state){
        $this->db->where('parkingspace_id', $parkingspaceId);
        $arr = array("available" => $state);
        $this->parkingspaceUpdate($parkingspaceId, $arr);
    }

}

?>