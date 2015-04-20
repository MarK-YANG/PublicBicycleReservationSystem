<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:25 AM
 */

class Customer extends CI_Controller{

    function index(){
        $this->load->view('header');
        $this->load->view("customerLogin");
        $this->load->view('footer');
    }

}