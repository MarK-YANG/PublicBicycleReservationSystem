<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/25/15
 * Time: 12:58 AM
 */

class CustomerUnfinishedOrder extends CI_Controller{

    function bikeBookCancel($id){
        $this->load->model('bike_book_model');
        $this->load->model('bike_model');

        $bikeBookOrder = $this->bike_book_model->select($id);

        $arrCancel = array("finish_time" => "2000-01-01 00:00:00");
        $this->bike_book_model->update($id, $arrCancel);
        $this->bike_model->changeAvailable($bikeBookOrder[0]->bike_id, 1);


        //reload
        $this->load->model("customer_model");
        $result = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $result;

        $arrActive = array('','','','','','');
        $arrActive[4] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->model('bike_book_model');
        $this->load->model('parkingspace_book_model');


        //get unfiished order
        $arrBikeUnfinishedOrder = $this->bike_book_model->check($this->session->userdata('currentCustomerId'));
        $arrParkingspaceUnfinishedOrder = $this->parkingspace_book_model->check($this->session->userdata('currentCustomerId'));

        $this->load->model('station_model');
        if(count($arrBikeUnfinishedOrder) != 0){
            $data['bikeBookStation'] = $this->station_model->stationSelect($arrBikeUnfinishedOrder[0]->station_id);
        }
        if(count($arrParkingspaceUnfinishedOrder) != 0){
            $data['parkingspaceBookStation'] = $this->station_model->stationSelect($arrParkingspaceUnfinishedOrder[0]->station_id);
        }


        $data['bike_book'] = $arrBikeUnfinishedOrder;
        $data['parkingspace_book'] = $arrParkingspaceUnfinishedOrder;


        $this->load->view('customerHeader', $data);
        $this->load->view('customerUnfinishedOrder', $data);
        $this->load->view('customerFooter');
    }

    function parkingspaceBookCancel($id){

        $this->load->model('parkingspace_book_model');
        $this->load->model('parkingspace_model');

        $parkingspaceBookOrder = $this->parkingspace_book_model->select($id);

        $arrCancel = array("finish_time" => "2000-01-01 00:00:00");
        $this->parkingspace_book_model->update($id, $arrCancel);
        $this->parkingspace_model->changeAvailable($parkingspaceBookOrder[0]->parkingspace_id, 1);

        //reload
        $this->load->model("customer_model");
        $result = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $result;

        $arrActive = array('','','','','','');
        $arrActive[4] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->model('bike_book_model');
        $this->load->model('parkingspace_book_model');


        //get unfiished order
        $arrBikeUnfinishedOrder = $this->bike_book_model->check($this->session->userdata('currentCustomerId'));
        $arrParkingspaceUnfinishedOrder = $this->parkingspace_book_model->check($this->session->userdata('currentCustomerId'));

        $this->load->model('station_model');
        if(count($arrBikeUnfinishedOrder) != 0){
            $data['bikeBookStation'] = $this->station_model->stationSelect($arrBikeUnfinishedOrder[0]->station_id);
        }
        if(count($arrParkingspaceUnfinishedOrder) != 0){
            $data['parkingspaceBookStation'] = $this->station_model->stationSelect($arrParkingspaceUnfinishedOrder[0]->station_id);
        }


        $data['bike_book'] = $arrBikeUnfinishedOrder;
        $data['parkingspace_book'] = $arrParkingspaceUnfinishedOrder;


        $this->load->view('customerHeader', $data);
        $this->load->view('customerUnfinishedOrder', $data);
        $this->load->view('customerFooter');

    }

}