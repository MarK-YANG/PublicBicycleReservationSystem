<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/24/15
 * Time: 11:38 PM
 */

class CustomerParkingspaceBook extends CI_Controller{

    function index(){
        //search result
        $this->load->model('customer_model');
        $this->load->model('station_model');
        $this->load->model('bike_model');
        $this->load->model('parkingspace_model');
        $this->load->model('parkingspace_book_model');

        $station = $this->station_model->stationSelect($_POST['stationId']);
        $bikeCount = $this->bike_model->bikeAvailable($_POST['stationId']);
        $parkingspaceCount = $this->parkingspace_model->parkingspaceAvailable($_POST['stationId']);
        $arrParingspaceBook = $this->parkingspace_book_model->check($this->session->userdata('currentCustomerId'));

        $canReserve = 0;

        if(count($bikeCount) == 0){
            $canReserve = 0;
        }else{
            $canReserve = 1;
        }

        if(count($arrParingspaceBook) != 0){
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


        //customerInfo
        $customerResult = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $customerResult;

        //All stations
        $stationResult = $this->station_model->stationSelectAll();
        $data['station'] = $stationResult;

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




        //class active
        $arrActive = array('','','','','','');
        $arrActive[3] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $this->load->view('customerHeader', $data);
        $this->load->view('customerParkingspaceBook', $data);
        $this->load->view('customerFooter');
    }

    function parkingspaceBook($stationId){
        $this->load->model("parkingspace_book_model");
        $this->load->model("parkingspace_model");
        $this->load->model("customer_model");
        $this->load->model("station_model");

        //station info
        $arrStation = $this->station_model->stationSelect($stationId);
        $data['station'] = $arrStation;

        //available parkingspace
        $arrParkingspace = $this->parkingspace_model->parkingspaceAvailable($stationId);

        $chars = md5(uniqid(mt_rand(), true));
        $uuid  = "PB".date('Ymd',time()).substr($chars,0,8);

        $order = array(
            "id" => $uuid,
            "customer_id" => $this->session->userdata('currentCustomerId'),
            "station_id" => $stationId,
            "parkingspace_id" => $arrParkingspace[0]->parkingspace_id,
            "start_time" => date('Y-m-d G:i:s',time()),
            "finish_time" => "null",
            "operate_by" => "admin"
        );

        $this->parkingspace_model->changeAvailable($arrParkingspace[0]->parkingspace_id, 0);

        $this->parkingspace_book_model->insert($order);


        //customerInfo
        $customerResult = $this->customer_model->customerSelect($this->session->userdata('currentCustomerId'));
        $data['customer'] = $customerResult;

        //class active
        $arrActive = array('','','','','','');
        $arrActive[3] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        $data['parkingspaceBook'] = $order;

        $this->load->view('customerHeader', $data);
        $this->load->view('customerParkingspaceBookSuccess', $data);
        $this->load->view('customerFooter');

    }


    function parkingspaceBookCancel($id){

        $this->load->model('parkingspace_book_model');
        $this->load->model('parkingspace_model');

        $parkingspaceBookOrder = $this->parkingspace_book_model->select($id);

        $arrCancel = array("finish_time" => "2000-01-01 00:00:00");
        $this->parkingspace_book_model->update($id, $arrCancel);
        $this->parkingspace_model->changeAvailable($parkingspaceBookOrder[0]->parkingspace_id, 1);

        //reload CustomerHref.php gotoParkingspaceBook
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
}