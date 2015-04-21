<?php

class CustomerRegiste extends CI_Controller
{

	function index(){

		$this->form_validation->set_rules('customerId','用户名','required|valid_email|is_unique[t_customer.customer_id]|xss_clean');
		$this->form_validation->set_rules('name','姓名','required');
		$this->form_validation->set_rules('birthDate','出生日期','required');
		//$this->form_validation->set_rules('citizenId','身份证号码','required|exact_length[18]');
		$this->form_validation->set_rules('citizenId','身份证号码','required|callback_check_citizenId');
		$this->form_validation->set_rules('gender','性别','required');
		$this->form_validation->set_rules('password','密码','required|min_length[6]|max_length[12]|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm','确认密码','required');
		$this->form_validation->set_rules('agree','同意条款','callback_check_agree');
		$this->form_validation->set_message('required','%s不能为空.');
		$this->form_validation->set_message('valid_email','%s必须为有效的邮箱地址.');
		$this->form_validation->set_message('is_unique','该用户已经存在.');
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

	function validate_gender($citizenId, $gender){
		$citizenGender = substr($citizenId, 16, 1);
		if($citizenGender%2 == $gender){
			return true;
		}else{
			return false;
		}
	}


	function validate_birthDate($citizenId, $birthDate){
		$birth = explode('-', $birthDate, 3);
		$result = $birth[0] . $birth[1] . $birth[2];
		$citizenDate = substr($citizenId, 6, 8);

		if($citizenDate == $result){
			return true;
		}else{
			return false;
		}
	}

	function check_citizenId($id){

		$str = $_POST['citizenId'];

		if(strlen($str) != 18){
			$this->form_validation->set_message('check_citizenId', "请输入有效的身份证号码");
			return false;
		}


		if(!$this->validate_birthDate($str, $_POST['birthDate'])){
			$this->form_validation->set_message('check_citizenId', "身份证号码与出生日期不符");
			return false;
		}

		if(!$this->validate_gender($str, $_POST['gender'])){
			$this->form_validation->set_message('check_citizenId', "身份证号码与性别不符");
			return false;
		}

		$eachNum = str_split($str,1);
		$weight = array(7, 9, 10, 5, 8 , 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);

		$parity_bit = array(1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2);

		$sum = 0;

		for($i = 0; $i < 17; ++$i){
			$sum += $eachNum[$i] * $weight[$i];
		}

		$result_count = $sum%11;
		$result_parity_bit = $parity_bit[$result_count];

		if($result_parity_bit == $eachNum[17]){
			return true;
		}else{
			$this->form_validation->set_message('check_citizenId', "请输入有效的身份证号码");
			return false;
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