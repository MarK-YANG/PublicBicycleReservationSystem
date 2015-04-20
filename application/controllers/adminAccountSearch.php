<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 8:27 PM
 */

class AdminAccountSearch extends CI_Controller{

    function search($id){

        $this->load->model('customer_model');
        $data['customer'] = $this->customer_model->customerSelect($id);

        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[6] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminAccountSearchDetail', $data);
        $this->load->view('adminFooter');


    }

}