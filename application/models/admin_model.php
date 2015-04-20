<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:36 AM
 */

class Admin_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function select($id){
        $this->db->where('admin_id', $id);
        $this->db->select('*');
        $query = $this->db->get("t_administrator");
        return $query->result();
    }

    function  insert($var){
        $this->db->insert('t_administrator', $var);
    }

    function update($id, $var){
        $this->db->where('admin_id', $id);
        $this->db->update('t_administrator', $var);
    }

    function delete($id){
        $this->db->where('admin_id', $id);
        $this->db->delete('t_administrator');
    }

}