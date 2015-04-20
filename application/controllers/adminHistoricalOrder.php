<?php

/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 9:26 PM
 */
class AdminHistoricalOrder extends CI_Controller
{

    function bikeBook($id)
    {
        $this->load->model('bike_book_model');
        $result = $this->bike_book_model->select($id);
        $data['bike_book'] = $result;

        $this->load->model('customer_model');
        $data['customer'] = $this->customer_model->customerSelect($result[0]->customer_id);

        $this->load->model('station_model');
        $data['station'] = $this->station_model->stationSelect($result[0]->station_id);

        $this->load->model('admin_model');
        $data['admin'] = $this->admin_model->select($result[0]->operate_by);

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;



        //active class
        $arrActive = array('', '', '', '', '', '', '', '', '');
        $arrActive[7] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminHistoricalBikeBookOrder', $data);
        $this->load->view('adminFooter');
    }

    function parkingspaceBook($id)
    {
        $this->load->model('parkingspace_book_model');
        $result = $this->parkingspace_book_model->select($id);
        $data['parkingspace_book'] = $result;

        $this->load->model('customer_model');
        $data['customer'] = $this->customer_model->customerSelect($result[0]->customer_id);

        $this->load->model('station_model');
        $data['station'] = $this->station_model->stationSelect($result[0]->station_id);

        $this->load->model('admin_model');
        $data['admin'] = $this->admin_model->select($result[0]->operate_by);

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('', '', '', '', '', '', '', '', '');
        $arrActive[7] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminHistoricalParkingspaceBookOrder', $data);
        $this->load->view('adminFooter');
    }

    function bikeRent($id)
    {
        $this->load->model('bike_rent_model');
        $result = $this->bike_rent_model->select($id);
        $data['bike_rent'] = $result;

        $this->load->model('customer_model');
        $data['customer'] = $this->customer_model->customerSelect($result[0]->customer_id);

        $this->load->model('station_model');
        $data['rent_station'] = $this->station_model->stationSelect($result[0]->rent_station_id);
        $data['return_station'] = $this->station_model->stationSelect($result[0]->return_station_id);

        $this->load->model('admin_model');
        $data['admin'] = $this->admin_model->select($result[0]->operate_by);

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('', '', '', '', '', '', '', '', '');
        $arrActive[7] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('adminHeader', $data);
        $this->load->view('adminHistoricalBikeRentOrder', $data);
        $this->load->view('adminFooter');
    }

}