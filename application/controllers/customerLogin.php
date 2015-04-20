<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/16/15
 * Time: 9:48 PM
 */

class CustomerLogin extends CI_Controller{

    /**
     *login form validation
     */


    public function login(){

        $this->form_validation->set_rules('customerId','用户名','required|valid_email');
        $this->form_validation->set_rules('password','密码','required|callback_customer_validate');
        $this->form_validation->set_message('required','%s不能为空');
        $this->form_validation->set_message('valid_email','%s必须为有效的邮箱地址;');



        if($this->form_validation->run()){

            $this->session->set_userdata(array('currentCustomerId' => $_POST['customerId']));

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
            $this->load->view('customerLogin');
        }

    }

    function customer_validate($str){
        $this->load->model("customer_model");
        $result = $this->customer_model->customerSelect($_POST['customerId']);
        $passwd = md5($_POST['password']);

        if(count($result) != 0){
            if($passwd == $result[0]->password){
                return true;
            }else{
                $this->form_validation->set_message('customer_validate',"用户名与密码不匹配.");
                return false;
            }
        }else{
            $this->form_validation->set_message('customer_validate','用户名不存在;');
            return false;
        }

    }

    function gotoCustomerRegiste(){
        $this->load->view('customerRegiste');
    }




}

?>
