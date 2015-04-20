<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 11:37 PM
 */
class AdminAccountManage extends CI_Controller{

    function addBalance($id){

        $this->load->model('customer_model');
        $data['customer'] = $this->customer_model->customerSelect($id);

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[4] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminAccountBalanceAdd', $data);
        $this->load->view('adminFooter');

    }

    function refresh($id){
        $this->load->model('customer_model');
        $data['customer'] = $this->customer_model->customerSelect($id);

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[4] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        //fine
        $data['fine'] = 100;

        //hint
        $data['type'] = "primary";
        $data['hint'] = "解冻";

        $this->load->view('adminHeader', $data);
        $this->load->view('adminAccountRefresh', $data);
        $this->load->view('adminFooter');
    }


    function refreshSuccess($id){

        $this->load->model('customer_model');
        $result = $this->customer_model->customerSelect($id);
        $fine = 100;

        if($result[0]->balance > $fine){

            $arr = array("balance" => $result[0]->balance - $fine, "break_count" => 0);

            $this->customer_model->customerUpdate($id, $arr);

            $data['customer'] = $this->customer_model->customerSelect($id);

            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[4] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            $this->load->view('adminHeader', $data);
            $this->load->view('adminAccountRefreshSuccess', $data);
            $this->load->view('adminFooter');

        }else{

            $this->load->model('customer_model');
            $data['customer'] = $this->customer_model->customerSelect($id);

            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[4] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //fine
            $data['fine'] = 100;

            //hint
            $data['type'] = "danger";
            $data['hint'] = "余额不足，请先充值";

            $this->load->view('adminHeader', $data);
            $this->load->view('adminAccountRefresh', $data);
            $this->load->view('adminFooter');
        }


    }

    function add($id){

        $this->form_validation->set_rules('account', '充值金额', 'required|greater_than[0]');
        $this->form_validation->set_message('required', '%s不能为空');
        $this->form_validation->set_message('greater_than', "%s不能小于0");

        if($this->form_validation->run()){

            $this->load->model('customer_model');
            $result = $this->customer_model->customerSelect($id);

            $arr = array("balance" => $result[0]->balance + $_POST['account']);

            $this->customer_model->customerUpdate($id, $arr);

            $data['customer'] = $this->customer_model->customerSelect($id);

            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[4] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            $this->load->view('adminHeader', $data);
            $this->load->view('adminAccountBalanceAddSuccess', $data);
            $this->load->view('adminFooter');

        }else{
            $this->load->model('customer_model');
            $data['customer'] = $this->customer_model->customerSelect($id);

            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[4] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            $this->load->view('adminHeader', $data);
            $this->load->view('adminAccountBalanceAdd', $data);
            $this->load->view('adminFooter');
        }

    }

}