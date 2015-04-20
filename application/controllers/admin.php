<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:26 AM
 */

class Admin extends CI_Controller{

    function index(){
        $this->load->view('adminLogin');
    }

}