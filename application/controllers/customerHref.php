<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/23/15
 * Time: 8:17 PM
 */

class CustomerHref extends CI_Controller{

    function gotoCustomerMainPage(){

        $this->load->model("customer_model");
        $result = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $result;

        $arrActive = array('','','','','','');
        $arrActive[0] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('customerHeader', $data);
        $this->load->view('customerMainPage', $data);
        $this->load->view('customerFooter');

    }

    function gotoCustomerStationPage(){
        $this->load->model("customer_model");
        $customerResult = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $customerResult;
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

        $arrActive = array('','','','','','');
        $arrActive[1] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $data['bike'] = $bikeResult;
        $data['parkingspace'] = $parkingspaceResult;

        $this->load->view('customerHeader', $data);
        $this->load->view('customerStationPage', $data);
        $this->load->view('customerFooter');
    }

    function gotoCustomerBikeBook(){
        //customerInfo
        $this->load->model("customer_model");
        $customerResult = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $customerResult;

        //All stations
        $this->load->model('station_model');
        $stationResult = $this->station_model->stationSelectAll();
        $data['station'] = $stationResult;


        //search result
        $this->load->model('bike_model');
        $this->load->model('parkingspace_model');
        $this->load->model('bike_book_model');

        $station = $this->station_model->stationSelect($stationResult[0]->station_id);
        $bikeCount = $this->bike_model->bikeAvailable($stationResult[0]->station_id);
        $parkingspaceCount = $this->parkingspace_model->parkingspaceAvailable($stationResult[0]->station_id);
        $arrBikeBook = $this->bike_book_model->check($this->session->userdata('currentCustomerId'));

        $canReserve = 0;

        if(count($bikeCount) == 0){
            $canReserve = 0;
        }else{
            $canReserve = 1;
        }

        if(count($arrBikeBook) != 0){
            $canReserve = 2;
        }


        $searchResult = array(
            "stationName"=>$station[0]->station_name,
            "stationAddress"=>$station[0]->station_address,
            "stationPhoneNum"=>$station[0]->station_phone_number,
            "bikeCount"=>count($bikeCount),
            "parkingspaceCount"=>count($parkingspaceCount),
            "stationId"=>$station[0]->station_id,
            "canReserve"=> $canReserve
        );

        $data['search'] = $searchResult;


        //hint
        if(count($bikeCount)){
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: green\">可预约自行车数量充足，欢迎使用</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }elseif(count($bikeCount) >= 3){
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: orange\">可预约自行车数量有限，请尽快完成预约</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }else{
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: red\">如果需要，请马上完成预约</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }

        if($canReserve == 2){
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: red\">不可以同时创建两个预约订单，请先完成未完成的预约订单</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }

        $arrActive = array('','','','','','');
        $arrActive[2] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('customerHeader', $data);
        $this->load->view('customerBikeBook', $data);
        $this->load->view('customerFooter');

    }


    function gotoCustomerParkingspaceBook(){
        //customerInfo
        $this->load->model("customer_model");
        $customerResult = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $customerResult;

        //All stations
        $this->load->model('station_model');
        $stationResult = $this->station_model->stationSelectAll();
        $data['station'] = $stationResult;


        //search result
        $this->load->model('bike_model');
        $this->load->model('parkingspace_model');
        $this->load->model('parkingspace_book_model');

        $station = $this->station_model->stationSelect($stationResult[0]->station_id);
        $bikeCount = $this->bike_model->bikeAvailable($stationResult[0]->station_id);
        $parkingspaceCount = $this->parkingspace_model->parkingspaceAvailable($stationResult[0]->station_id);
        $arrParkingspaceBook = $this->parkingspace_book_model->check($this->session->userdata('currentCustomerId'));

        $canReserve = 0;

        if(count($bikeCount) == 0){
            $canReserve = 0;
        }else{
            $canReserve = 1;
        }

        if(count($arrParkingspaceBook) != 0){
            $canReserve = 2;
        }


        $searchResult = array(
            "stationName"=>$station[0]->station_name,
            "stationAddress"=>$station[0]->station_address,
            "stationPhoneNum"=>$station[0]->station_phone_number,
            "bikeCount"=>count($bikeCount),
            "parkingspaceCount"=>count($parkingspaceCount),
            "stationId"=>$station[0]->station_id,
            "canReserve"=> $canReserve
        );

        $data['search'] = $searchResult;


        //hint
        if(count($bikeCount)){
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: green\">可预约自行车停车位数量充足，欢迎使用</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }elseif(count($bikeCount) >= 3){
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: orange\">可预约自行车停车位数量有限，请尽快完成预约</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }else{
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: red\">如果需要，请马上完成预约</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }

        if($canReserve == 2){
            $data['hint'] = "<div class=\"row\">
                    <div class=\"span9\">

                        <div class=\"widget\">

                            <div class=\"widget-header\">
                                <i class=\"icon-check\"></i>
                                <h3 style=\"color: red\">不可以同时创建两个预约订单，请先完成未完成的预约订单</h3>

                            </div>
                        </div>
                    </div>
                </div>";
        }

        $arrActive = array('','','','','','');
        $arrActive[3] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('customerHeader', $data);
        $this->load->view('customerParkingspaceBook', $data);
        $this->load->view('customerFooter');
    }

    function gotoCustomerUnfinishedOrder(){

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

    function gotoCustomerHistoricalOrder(){

        $this->load->model("customer_model");
        $result = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $result;

        $arrActive = array('','','','','','');
        $arrActive[5] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->model('bike_book_model');
        $this->load->model('parkingspace_book_model');
        $this->load->model('bike_rent_model');
        $this->load->model('station_model');

        //getOrders

        $arrBikeBook = $this->bike_book_model->get($this->session->userdata('currentCustomerId'));
        $arrParkingspaceBook = $this->parkingspace_book_model->get($this->session->userdata('currentCustomerId'));
        $arrBikeRent = $this->bike_rent_model->get($this->session->userdata('currentCustomerId'));

        $bikeBook = array();
        $bikeRent = array();
        $parkingspaceBook = array();

        if(count($arrBikeBook) != 0){
            foreach($arrBikeBook as $row){
                $bikeBook[] = array(
                    "id" => $row->id,
                    "customer_id" => $result[0]->customer_id,
                    "name" => $result[0]->name,
                    "station_name" => $this->station_model->stationSelect($row->station_id)[0]->station_name,
                    "start_time" => $row->start_time,
                    "finish_time" => $row->finish_time
                );
            }
        }

        if(count($arrParkingspaceBook) != 0){
            foreach($arrParkingspaceBook as $row){
                $parkingspaceBook[] = array(
                    "id" => $row->id,
                    "customer_id" => $result[0]->customer_id,
                    "name" => $result[0]->name,
                    "station_name" => $this->station_model->stationSelect($row->station_id)[0]->station_name,
                    "start_time" => $row->start_time,
                    "finish_time" => $row->finish_time
                );
            }
        }

        if(count($arrBikeRent) != 0){
            foreach($arrBikeRent as $row){
                $bikeRent[] = array(
                    "id" => $row->id,
                    "customer_id" => $result[0]->customer_id,
                    "name" => $result[0]->name,
                    "rent_station_name" => $this->station_model->stationSelect($row->rent_station_id)[0]->station_name,
                    "return_station_name" => $this->station_model->stationSelect($row->return_station_id)[0]->station_name,
                    "start_time" => $row->start_time,
                    "finish_time" => $row->finish_time
                );
            }
        }

        $data['bike_book'] = $bikeBook;
        $data['parkingspace_book'] = $parkingspaceBook;
        $data['bike_rent'] = $bikeRent;

//        echo count($arrBikeBook);
//        echo count($arrParkingspaceBook);
//        echo count($bikeRent);

        $this->load->view('customerHeader', $data);
        $this->load->view('customerHistoricalOrder', $data);
        $this->load->view('customerFooter');

    }

}

?>