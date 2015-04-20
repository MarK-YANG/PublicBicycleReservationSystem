<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/9/15
 * Time: 12:45 PM
 */

class Maintain_log_model extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function select($id){
        $this->db->where('id', $id);
        $this->db->select('*');
        $query = $this->db->get("r_maintain_log");
        return $query->result();
    }

    function  insert($var){
        $this->db->insert('r_maintain_log', $var);
    }

    function update($id, $var){
        $this->db->where('id', $id);
        $this->db->update('r_maintain_log', $var);
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('r_maintain_log');
    }
}