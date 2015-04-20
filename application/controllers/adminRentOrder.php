<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 4:44 PM
 */
class AdminRentOrder extends CI_Controller{

    function finish($id){

        $this->load->model('parkingspace_book_model');
        $this->load->model('bike_rent_model');

        //get the bike rent order
        $bikeRentResult = $this->bike_rent_model->select($id);

        //if has parking space reservation order
        $parkingspaceOrder = $this->parkingspace_book_model->check($bikeRentResult[0]->customer_id);

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[2] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->session->set_userdata(array("bike_rent_id" => $id));
        $data['bike_rent'] = $id;

        if(count($parkingspaceOrder) != 0){


            //have reservation order
            $data['parkingspace_book'] = $parkingspaceOrder;
            $this->load->model('customer_model');
            $customerResult = $this->customer_model->customerSelect($parkingspaceOrder[0]->customer_id);
            $data['customer'] = $customerResult;
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelect($parkingspaceOrder[0]->station_id);
            $data['station'] = $stationResult;

            $this->load->view('adminHeader', $data);
            $this->load->view('adminRentOrderWithBook', $data);
            $this->load->view('adminFooter');


        }else{
            //don't have reservation order

            $this->load->model('station_model');
            $allStations = $this->station_model->stationSelectAll();
            $data['allStations'] = $allStations;

            $this->load->model('parkingspace_model');
            $parkingspaces = $this->parkingspace_model->parkingspaceAvailable($allStations[0]->station_id);

            $count = count($parkingspaces);
            $data['count'] = $count;

            if($count == 0){
                $data['color'] = "red";
                $data['hint'] = "很抱歉，没有可用的自行车停车位";
            }elseif($count > 0 && $count <= 10){
                $data['color'] = "orange";
                $data['hint'] = "可预约自行车停车位数量有限，请尽快完成";
            }else{
                $data['color'] = "green";
                $data['hint'] = "可预约自行车停车位数量充足，欢迎使用";
            }

            $data['station'] = $allStations;

            $this->session->set_userdata(array("selectStation" => $allStations[0]->station_id));

            $this->load->view('adminHeader', $data);
            $this->load->view('adminRentOrderWithoutBook', $data);
            $this->load->view('adminFooter', $data);
        }


    }

    function orderFinishWithBook($bike_rent_id, $parkingspace_book_id){

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[2] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->model('parkingspace_book_model');
        $parkingspaceResult = $this->parkingspace_book_model->select($parkingspace_book_id);

        $this->load->model('bike_rent_model');
        $bikeRentResult = $this->bike_rent_model->select($bike_rent_id);

        $start = $bikeRentResult[0]->start_time;
        $end = date('Y-m-d G:i:s', time());

        $last = number_format((strtotime($end) - strtotime($start))/60, 2);
        $cost = 0;

        if($last <= 120){
            $cost = number_format($last * 0.01,2);
        }else if ($last > 120 && $last <= 180){
            $cost = 120 * 0.01;
            $cost = number_format($cost + ($last - 120) * 0.02, 2);
        }else{
            $cost = number_format(1.2 + 1.2 + ($last-180) * 0.05, 2);
        }

        $var = array(
            "finish_time" => $end,
            "operate_by" => $this->session->userdata('currentAdminId'),
            "cost" => $cost,
            "return_station_id" => $parkingspaceResult[0]->station_id
        );

        //finish bike_rent_order
        $this->bike_rent_model->update($bike_rent_id, $var);

        $bikeRent = $this->bike_rent_model->select($bike_rent_id);

        $data['bike_rent'] = $bikeRent;

        //Change balance
        $this->load->model('customer_model');
        $customerR = $this->customer_model->customerSelect($bikeRent[0]->customer_id);

        $balance = array("balance" => number_format($customerR[0]->balance - $cost, 2));
        $this->customer_model->customerUpdate($customerR[0]->customer_id, $balance);

        $data['customer'] = $this->customer_model->customerSelect($customerR[0]->customer_id);

        //finish parkingspace_book order
        $parkingspaceR = array("finish_time" => $end, "operate_by" => $this->session->userdata('currentAdminId'));
        $this->parkingspace_book_model->update($parkingspace_book_id, $parkingspaceR);
        $parkingspaceBookR = $this->parkingspace_book_model->select($parkingspace_book_id);

        //chage bike state
        $this->load->model('bike_model');
        $this->bike_model->changeAvailable($bikeRent[0]->bike_id, 1);
        $this->bike_model->setParkingspace($bikeRent[0]->bike_id, $parkingspaceBookR[0]->parkingspace_id);

        $this->load->model('station_model');
        $data['rent_station'] = $this->station_model->stationSelect($bikeRent[0]->rent_station_id);
        $data['return_station'] = $this->station_model->stationSelect($bikeRent[0]->return_station_id);


        $data['last'] = $last;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminRentOrderSuccess', $data);
        $this->load->view('adminFooter');

    }

    function orderFinishWithoutBook($bike_rent_id){

        $selectStation = $this->session->userdata('selectStation');
        $this->session->unset_userdata('selectStation');

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[2] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->model('parkingspace_book_model');

        $this->load->model('bike_rent_model');
        $bikeRentResult = $this->bike_rent_model->select($bike_rent_id);

        $start = $bikeRentResult[0]->start_time;
        $end = date('Y-m-d G:i:s', time());

        $last = (strtotime($end) - strtotime($start))/60;
        $cost = 0;

        if($last <= 120){
            $cost = number_format($last * 0.01,2);
        }else if ($last > 120 && $last <= 180){
            $cost = 120 * 0.01;
            $cost = number_format($cost + ($last - 120) * 0.02, 2);
        }else{
            $cost = number_format(1.2 + 1.2 + ($last-180) * 0.05, 2);
        }

        $var = array(
            "finish_time" => $end,
            "operate_by" => $this->session->userdata('currentAdminId'),
            "cost" => $cost,
            "return_station_id" => $selectStation
        );

        //finish bike_rent_order
        $this->bike_rent_model->update($bike_rent_id, $var);

        $bikeRent = $this->bike_rent_model->select($bike_rent_id);

        $data['bike_rent'] = $bikeRent;

        //Change balance
        $this->load->model('customer_model');
        $customerR = $this->customer_model->customerSelect($bikeRent[0]->customer_id);

        $balance = array("balance" => number_format($customerR[0]->balance - $cost, 2));
        $this->customer_model->customerUpdate($customerR[0]->customer_id, $balance);

        $data['customer'] = $this->customer_model->customerSelect($customerR[0]->customer_id);

        //available parkingspace
        $this->load->model('parkingspace_model');
        $avaParkingspace = $this->parkingspace_model->parkingspaceAvailable($selectStation);


        //chage bike state
        $this->load->model('bike_model');
        $this->bike_model->changeAvailable($bikeRent[0]->bike_id, 1);
        $this->bike_model->setParkingspace($bikeRent[0]->bike_id, $avaParkingspace[0]->parkingspace_id);

        //change parkingspace state
        $this->parkingspace_model->changeAvailable($avaParkingspace[0]->parkingspace_id, 0);

        $this->load->model('station_model');
        $data['rent_station'] = $this->station_model->stationSelect($bikeRent[0]->rent_station_id);
        $data['return_station'] = $this->station_model->stationSelect($bikeRent[0]->return_station_id);


        $data['last'] = $last;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminRentOrderSuccess', $data);
        $this->load->view('adminFooter');


    }



    function stationSearch(){

        //
        $this->session->set_userdata(array("selectStation" => $_POST['selectStation']));

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[2] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $data['bike_rent'] = $this->session->userdata('bike_rent_id');

        $this->load->model('station_model');
        $allStations = $this->station_model->stationSelectAll();
        $data['allStations'] = $allStations;

        $this->load->model('parkingspace_model');
        $parkingspaces = $this->parkingspace_model->parkingspaceAvailable($_POST['selectStation']);

        $count = count($parkingspaces);
        $data['count'] = $count;

        if($count == 0){
            $data['color'] = "red";
            $data['hint'] = "很抱歉，没有可用的自行车停车位";
        }elseif($count > 0 && $count <= 10){
            $data['color'] = "orange";
            $data['hint'] = "可预约自行车停车位数量有限，请尽快完成";
        }else{
            $data['color'] = "green";
            $data['hint'] = "可预约自行车停车位数量充足，欢迎使用";
        }

        $data['station'] = $this->station_model->stationSelect($_POST['selectStation']);

        $this->load->view('adminHeader', $data);
        $this->load->view('adminRentOrderWithoutBook', $data);
        $this->load->view('adminFooter', $data);
    }

}

