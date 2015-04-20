<?php

class Customer_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function customerSelect($customerId)
	{
		$this->db->where("customer_id", $customerId);
		$this->db->select("*");
		$query = $this->db->get("t_customer");
		return $query->result();
	}

	public function customerInsert($var)
	{
		$this->db->insert("t_customer", $var);
	}

	public function customerUpdate($id, $var)
	{
		$this->db->where("customer_id", $id);
		$this->db->update("t_customer", $var);
	}

	public function customerDelete($id)
	{
		$this->db->where("customer_id", $id);
		$this->db->delete("t_customer");
	}
}

?>