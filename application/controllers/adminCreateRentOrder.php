<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 10:13 PM
 */
class AdminCreateRentOrder extends CI_Controller{

    function search(){

        $this->session->set_userdata(array("create_order_select_station" => $_POST['station']));

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
        $bikes = $this->bike_model->bikeAvailable($_POST['station']);

        $data['station'] = $this->station_model->stationSelect($_POST['station']);

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

    function check($str){

        $this->load->model('customer_model');
        $result = $this->customer_model->customerSelect($_POST['customerId']);

        $this->load->model('bike_rent_model');
        $bikeRent = $this->bike_rent_model->check($_POST['customerId']);


        if(count($result) != 0){
            if(count($bikeRent) != 0){
                $this->form_validation->set_message('check','该用户存在未完成订单;');
                return false;
            }else{
                return true;
            }
        }else{
            $this->form_validation->set_message('check','用户名不存在;');
            return false;
        }
    }

    function index(){
        $station_id = $this->session->userdata('create_order_select_station');

        $this->form_validation->set_rules('customerId','用户名', 'required|callback_check');
        $this->form_validation->set_message('required', '%s不能为空');

        if($this->form_validation->run()){

//            $station_id = $this->session->userdata('create_order_select_station');
//            $this->session->unset_userdata('create_order_select_station');

            $station_id = $_POST['station'];

            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[3] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //select station
            $this->load->model('station_model');
            $data['station'] = $this->station_model->stationSelect($station_id);

            //uuid
            $chars = md5(uniqid(mt_rand(), true));
            $uuid  = "BR".date('Ymd',time()).substr($chars,0,8);

            //available bike
            $this->load->model('bike_model');
            $bikes = $this->bike_model->bikeAvailable($station_id);

            $bike_rent_order = array(
                "id" => $uuid,
                "customer_id" => $_POST['customerId'],
                "rent_station_id" => $station_id,
                "bike_id" => $bikes[0]->bike_id,
                "parkingspace_id" => $bikes[0]->parkingspace_id,
                "start_time" => date('Y-m-d G:i:s', time()),
                "finish_time" => "null",
                "operate_by" => "admin",
                "cost" => 0,
                "return_station_id" =>$station_id
            );

            $data['bike_rent'] = $bike_rent_order;

            $this->load->model('bike_rent_model');
            $this->bike_rent_model->insert($bike_rent_order);

            //customer inof
            $this->load->model('customer_model');
            $data['customer'] = $this->customer_model->customerSelect($_POST['customerId']);

            //change bike parkingsapce state
            $this->bike_model->changeAvailable($bikes[0]->bike_id, 0);
            $this->load->model('parkingspace_model');
            $this->parkingspace_model->changeAvailable($bikes[0]->parkingspace_id, 1);

            $this->load->view('adminHeader', $data);
            $this->load->view('adminCreateRentOrderSuccess', $data);
            $this->load->view('adminFooter');



        }else{
//            $station_id = $this->session->userdata('create_order_select_station');
//            $this->session->unset_userdata('create_order_select_station');
            $station_id = $_POST['station'];

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
            $bikes = $this->bike_model->bikeAvailable($station_id);

            $data['station'] = $this->station_model->stationSelect($station_id);

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


    }

}