<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/19/15
 * Time: 1:06 PM
 */

class CustomerMainPage extends CI_Controller{


    function index(){

    }

    function changePassword(){
        $this->form_validation->set_rules('password','密码','required|min_length[6]|max_length[12]|matches[rePassword]|md5');
        $this->form_validation->set_rules('rePassword','确认密码','required');
        $this->form_validation->set_message('min_length','%s的长度不能少于6位.');
        $this->form_validation->set_message('max_length','%s的长度不能大于12位.');
        $this->form_validation->set_message('matches','两次输入的密码不一致.');
        $this->form_validation->set_message('required','%s不能为空.');

        if($this->form_validation->run()){
            $this->load->model("customer_model");
            $arr = array("password"=>$_POST['password']);
            $this->customer_model->customerUpdate($this->session->userdata('currentCustomerId'), $arr);

            $this->load->model("customer_model");
            $result = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
            $data['customer'] = $result;

            $arrActive = array('','','','','','');
            $arrActive[0] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            $this->load->view('customerHeader', $data);
            $this->load->view('customerMainPage', $data);
            $this->load->view('customerFooter');

        }else{

            $this->load->model("customer_model");
            $result = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
            $data['customer'] = $result;

            $arrActive = array('','','','','','');
            $arrActive[0] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            $this->load->view('customerHeader', $data);
            $this->load->view('customerMainPage', $data);
            $this->load->view('customerFooter');

        }

    }

    function logout(){
        $this->session->unset_userdata('currentCustomerId');
        $this->load->view('customerLogin');
    }


}

?>
