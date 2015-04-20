<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/16/15
 * Time: 10:12 PM
 */

class MyGoto extends CI_Controller{


    function index(){
        $this->load->view('header');
        $this->load->view("customerLogin");
        $this->load->view('footer');



    }

}