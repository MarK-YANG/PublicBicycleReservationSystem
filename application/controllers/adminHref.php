<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 11:05 AM
 */

class AdminHref extends CI_Controller{

    function gotoAdminMainPage(){

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
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
    }

    function gotoAdminReservationOrder(){

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[1] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminReservationOrder', $data);
        $this->load->view('adminFooter');
    }

    function gotoAdminRentOrder(){

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[2] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminRentOrder', $data);
        $this->load->view('adminFooter');
    }

    function gotoAdminCreateRentOrder(){
        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[3] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->model('station_model');
        $allStations = $this->station_model->stationSelectAll();
        $data['allStations'] = $allStations;

        $this->load->model('bike_model');
        $bikes = $this->bike_model->bikeAvailable($allStations[0]->station_id);

        $data['station'] = $this->station_model->stationSelect($allStations[0]->station_id);

        $this->session->set_userdata(array("create_order_select_station" => $allStations[0]->station_id));

        $count = count($bikes);
        $data['count'] = $count;

        if($count == 0){
            $data['color'] = "red";
            $data['hint'] = "很抱歉，没有可用的自行车";
        }elseif($count > 0 && $count <= 10){
            $data['color'] = "orange";
            $data['hint'] = "可预约自行车数量有限，请尽快完成";
        }else{
            $data['color'] = "green";
            $data['hint'] = "可预约自行车数量充足，欢迎使用";
        }

        $this->load->view('adminHeader', $data);
        $this->load->view('adminCreateRentOrder', $data);
        $this->load->view('adminFooter');
    }

    function gotoAdminAccountManage(){
        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[4] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminAccountManage', $data);
        $this->load->view('adminFooter');
    }

    function gotoAdminSystemMaintain(){
        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[5] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $tabActive = array('','','','','','','');
        $tabActive[0] = "class=\"active\"";
        $data['tabActive'] = $tabActive;

        $tabActiveP = array('','','','','','','');
        $tabActiveP[0] = "active";
        $data['tabActiveP'] = $tabActiveP;

        //station info
        $this->load->model('station_model');
        $stationResult = $this->station_model->stationSelectAll();
        $data['allStation'] = $stationResult;

        $data['addAdmin'] = array("hint" => "");

        $data['modifyStation'] = array(
            "hint" => "",
            "station_id" => "",
            "station_name" => "",
            "station_address" => "",
            "station_phone_number" => ""
        );

        $data['addStation'] = array('hint' => "");

        $this->load->view('adminHeader', $data);
        $this->load->view('adminSystemMaintain', $data);
        $this->load->view('adminFooter');
    }

    function gotoAdminAccountSearch(){
        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[6] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminAccountSearch', $data);
        $this->load->view('adminFooter');
    }

    function gotoAdminHistoricalOrder(){
        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[7] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminHistoricalOrder', $data);
        $this->load->view('adminFooter');
    }

    function gotoAdminInfor(){
        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[8] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminInfor', $data);
        $this->load->view('adminFooter');
    }



}