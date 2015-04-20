<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:29 AM
 */

class AdminLogin extends CI_Controller{


    function index(){

        $this->form_validation->set_rules('adminId','用户名','required');
        $this->form_validation->set_rules('password','密码','required|callback_admin_validate');

        $this->form_validation->set_message('required','%s不能为空');

        if($this->form_validation->run()){

            //set session
            $this->session->set_userdata(array('currentAdminId' => $_POST['adminId']));

            //get admin
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($_POST['adminId']);
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[0] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //unfinished reservation order
            $this->load->model('bike_book_model');
            $bikeBookResult = $this->bike_book_model->unfinishedOrder();

            $this->load->model('parkingspace_book_model');
            $parkingspaceBookResult = $this->parkingspace_book_model->unfinishedOrder();
            $data['bike_book'] = count($bikeBookResult) + count($parkingspaceBookResult);


            //unfinished rent order
            $this->load->model('bike_rent_model');
            $bikeRentResult = $this->bike_rent_model->unfinishedOrder();
            $data['bike_rent'] = count($bikeRentResult);

            //error order
            $bikeBookErrorOrder = $this->bike_book_model->errorOrder();
            $bikeRentErrorOrder = $this->bike_rent_model->errorOrder();
            $parkingspaceErrorOrder  = $this->parkingspace_book_model->errorOrder();
            $data['error_order'] = count($bikeBookErrorOrder) + count($bikeRentErrorOrder) + count($parkingspaceErrorOrder);

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['station'] = $stationResult;

            $this->load->model('bike_model');
            $this->load->model('parkingspace_model');
            $bikeResult = array();
            $parkingspaceResult = array();

            foreach($stationResult as $row){

                $tBike = $this->bike_model->bikeAvailable($row->station_id);
                $bikeResult[] = count($tBike);
                $tParkingspace = $this->parkingspace_model->parkingspaceAvailable($row->station_id);
                $parkingspaceResult[] = count($tParkingspace);

            }

            $data['bike'] = $bikeResult;
            $data['parkingspace'] = $parkingspaceResult;

            $this->load->view('adminHeader', $data);
            $this->load->view('adminMainPage', $data);
            $this->load->view('adminFooter');


        }else{
            $this->load->view('adminLogin');
        }

    }




    function admin_validate($str){
        $this->load->model("admin_model");
        $result = $this->admin_model->select($_POST['adminId']);
        $passwd = md5($_POST['password']);

        if(count($result) != 0){
            if($passwd == $result[0]->password){
                return true;
            }else{
                $this->form_validation->set_message('admin_validate',"用户名与密码不匹配.");
                return false;
            }
        }else{
            $this->form_validation->set_message('admin_validate','用户名不存在;');
            return false;
        }

    }

    function logout(){
        $this->session->unset_userdata('currentAdminId');
        $this->load->view('adminLogin');
    }


}