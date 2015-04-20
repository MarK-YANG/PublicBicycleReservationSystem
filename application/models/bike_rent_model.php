<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/25/15
 * Time: 1:12 AM
 */

class Bike_rent_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function selectAll(){
        $this->db->select('*');
        $query = $this->db->get("r_bike_rent");
        return $query->result();
    }

    function select($id){
        $this->db->where("id", $id);
        $this->db->select("*");
        $query = $this->db->get("r_bike_rent");
        return $query->result();
    }

    function insert($var){
        $this->db->insert('r_bike_rent', $var);
    }

    function update($id,$var){
        $this->db->where("id", $id);
        $this->db->update('r_bike_rent', $var);
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('r_bike_rent');
    }

    function check($customerId){
        $this->db->where('customer_id', $customerId);
        $this->db->where('finish_time',"null");
        $this->db->select('*');
        $query = $this->db->get('r_bike_rent');
        return $query->result();
    }

    function get($customerId){
        $this->db->where('customer_id', $customerId);
        $this->db->where('finish_time !=',"null");
        $this->db->where('finish_time !=', '2000-01-01 00:00:00');
        $this->db->select('*');
        $query = $this->db->get('r_bike_rent');
        return $query->result();
    }

    function unfinishedOrder(){
        $this->db->where('finish_time', "null");
        $this->db->select('*');
        $query = $this->db->get('r_bike_rent');
        return $query->result();
    }

    function errorOrder(){
        $this->db->where('finish_time', "1999-01-01 00:00:00");
        $this->db->select('*');
        $query = $this->db->get('r_bike_rent');
        return $query->result();
    }

}