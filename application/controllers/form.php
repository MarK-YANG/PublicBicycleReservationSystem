<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/16/15
 * Time: 10:06 PM
 */

class Form extends CI_Controller {

    function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('myform');
        }
        else
        {
            $this->load->view('formsuccess');
        }
    }
}
?>