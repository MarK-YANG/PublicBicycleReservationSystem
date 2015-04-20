<?php

class CustomerRegiste extends CI_Controller
{

	function index(){

		$this->form_validation->set_rules('customerId','用户名','required|valid_email|is_unique[t_customer.customer_id]|xss_clean');
		$this->form_validation->set_rules('name','姓名','required');
		$this->form_validation->set_rules('birthDate','出生日期','required');
		$this->form_validation->set_rules('citizenId','身份证号码','required|exact_length[18]');
		$this->form_validation->set_rules('gender','性别','required');
		$this->form_validation->set_rules('password','密码','required|min_length[6]|max_length[12]|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','确认密码','required');
		$this->form_validation->set_rules('agree','同意条款','callback_check_agree');
		$this->form_validation->set_message('required','%s不能为空.');
		$this->form_validation->set_message('valid_email','%s必须为有效的邮箱地址.');
		$this->form_validation->set_message('is_unique','该用户已经存在.');
		$this->form_validation->set_message('exact_length','请输入有效的18位身份证号码.');
		$this->form_validation->set_message('min_length','%s的长度不能少于6位.');
		$this->form_validation->set_message('max_length','%s的长度不能大于12位.');
		$this->form_validation->set_message('matches','两次输入的密码不一致.');

		if($this->form_validation->run()){

			$var = array(
				"customer_id"=>$_POST['customerId'],
				"password"=> md5($_POST['password']),
				"citizen_id"=>$_POST['citizenId'],
				"gender"=>$_POST['gender'],
				"create_time"=>date('Y-m-d H:i:s',time()),
				"break_count"=>0,
				"birthDate"=>$_POST['birthDate'],
				"name"=>$_POST['name'],
				"balance"=>0,
				"level"=>0
			);

			$this->load->model("customer_model");
			$this->customer_model->customerInsert($var);

			$this->session->unset_userdata('currentCustomerId');
			$this->session->set_userdata(array('currentCustomerId' => $_POST['customerId']));
			$result = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
			$data['customer'] = $result;

			$arrActive = array('','','','','','');
			$arrActive[0] = "class=\"active\"";
			$data['activeArr'] = $arrActive;

			$this->load->view('customerHeader', $data);
			$this->load->view('customerMainPage', $data);
			$this->load->view('customerFooter');

		}else{
			$this->load->view('customerRegiste');
		}


	}

	function check_agree($str){

		if(!empty($_POST['agree'])){
			return true;
		}else{
			$this->form_validation->set_message('check_agree','请同意服务条款.');
			return false;
		}
	}

	function gotoCustomerLogin()
	{
		$this->load->view('customerLogin');
	}

}

?>