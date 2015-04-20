<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 3:38 PM
 */

class AdminReservationOrder extends CI_Controller{

    function index(){

    }

    function finish($id){

        //finish reservation order
        $this->load->model('bike_book_model');
        $time = date('Y-m-d G:i:s', time());
        $var = array("finish_time" => $time, "operate_by" => $this->session->userdata('currentAdminId'));
        $this->bike_book_model->update($id, $var);

        //get the finished order
        $result = $this->bike_book_model->select($id);

        //parkingspace available
        $this->load->model('parkingspace_model');
        $this->parkingspace_model->changeAvailable($result[0]->parkingspace_id, 1);


        //create rent order
        //uuid
        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = "BR".date('Ymd',time()).substr($chars,0,8);

        $arr = array(
            "id" => $uuid,
            "customer_id" => $result[0]->customer_id,
            "rent_station_id" => $result[0]->station_id,
            "bike_id" => $result[0]->bike_id,
            "parkingspace_id" => $result[0]->parkingspace_id,
            "start_time" => $time,
            "finish_time" => "null",
            "operate_by" => "admin",
            "cost" => 0,
            "return_station_id" => $result[0]->station_id
        );

        $this->load->model('bike_rent_model');
        $this->bike_rent_model->insert($arr);



        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[1] = "class=\"active\"";
        $data['activeArr'] = $arrActive;



        //customer info
        $this->load->model('customer_model');
        $customerResult = $this->customer_model->customerSelect($result[0]->customer_id);
        $data['customer'] = $customerResult;

        //station info
        $this->load->model('station_model');
        $stationResult = $this->station_model->stationSelect($result[0]->station_id);
        $data['station'] = $stationResult;

        $data['bike_book'] = $result;
        $data['bike_rent'] = $arr;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminReservationOrderFinish', $data);
        $this->load->view('adminFooter');
    }

}