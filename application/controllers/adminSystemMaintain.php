<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/9/15
 * Time: 12:14 PM
 */

class AdminSystemMaintain extends CI_Controller{

    function addAdmin(){

        $this->form_validation->set_rules('adminId', '管理员ID', 'required|is_unique[t_administrator.admin_id]');
        $this->form_validation->set_rules('name', '管理员名称', 'required');
        $this->form_validation->set_rules('password','密码','required|min_length[6]|max_length[12]|matches[rePassword]');
        $this->form_validation->set_rules('rePassword','确认密码','required');
        $this->form_validation->set_rules('privilege', '权限等级', 'required|integer');
        $this->form_validation->set_message('required','%s不能为空.');
        $this->form_validation->set_message('min_length','%s的长度不能少于6位.');
        $this->form_validation->set_message('max_length','%s的长度不能大于12位.');
        $this->form_validation->set_message('is_unique','该帐户已经存在.');
        $this->form_validation->set_message('matches','两次输入的密码不一致.');
        $this->form_validation->set_message('integer','请输入有效的权限等级.');

        if($this->form_validation->run()){

            //uuid
            $chars = md5(uniqid(mt_rand(), true));
            $uuid  = "SM".date('Ymd',time()).substr($chars,0,8);

            $password = md5($_POST['password']);
            $adminArr = array(
                'admin_id' => $_POST['adminId'],
                'name' => $_POST['name'],
                'password' => $password,
                'privilege' => $_POST['privilege']
            );

            $this->load->model('admin_model');
            $this->admin_model->insert($adminArr);

            $logArr = array(
                'id' => $uuid,
                'action_kind' => 1,
                'comment' => 'create a new admin',
                'operate_by' => $this->session->userdata('currentAdminId')
            );

            $this->load->model('maintain_log_model');
            $this->maintain_log_model->insert($logArr);


            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[0] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[0] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "<h3>添加管理员成功</h3>");
            $data['addAdmin'] = $addAdmin;

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

        }else{
            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[0] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[0] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "");
            $data['addAdmin'] = $addAdmin;

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


    }

    function stationSearch(){
        $this->load->model('station_model');
        $selectStation = $this->station_model->stationSelect($_POST['modifyStationId']);

        //get admin info
        $this->load->model('admin_model');
        $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
        $data['admin'] = $adminResult;

        //active class
        $arrActive = array('','','','','','','','','');
        $arrActive[5] = "class=\"active\"";
        $data['activeArr'] = $arrActive;

        //station info
        $this->load->model('station_model');
        $stationResult = $this->station_model->stationSelectAll();
        $data['allStation'] = $stationResult;

        $tabActive = array('','','','','','','');
        $tabActive[1] = "class=\"active\"";
        $data['tabActive'] = $tabActive;

        $tabActiveP = array('','','','','','','');
        $tabActiveP[1] = "active";
        $data['tabActiveP'] = $tabActiveP;

        $addAdmin = array("hint" => "");
        $data['addAdmin'] = $addAdmin;

        $data['modifyStation'] = array(
            "hint" => "",
            "station_id" => $selectStation[0]->station_id,
            "station_name" => $selectStation[0]->station_name,
            "station_address" => $selectStation[0]->station_address,
            "station_phone_number" => $selectStation[0]->station_phone_number
        );
        $data['addStation'] = array('hint' => "");

        $this->load->view('adminHeader', $data);
        $this->load->view('adminSystemMaintain', $data);
        $this->load->view('adminFooter');

    }

    function modifyStation(){
        $this->form_validation->set_rules('stationPhoneNum', '服务站电话', 'required');
        $this->form_validation->set_rules('stationName', '服务站名称', 'required');
        $this->form_validation->set_rules('stationAddress','服务站地址','required');
        $this->form_validation->set_message('required','%s不能为空.');

        if($this->form_validation->run()){

            //uuid
            $chars = md5(uniqid(mt_rand(), true));
            $uuid  = "SM".date('Ymd',time()).substr($chars,0,8);

            $stationArr = array(
                'station_name' => $_POST['stationName'],
                'station_address' => $_POST['stationAddress'],
                'station_phone_number' => $_POST['stationPhoneNum']
            );

            $this->load->model('station_model');
            $this->station_model->stationUpdate($_POST['stationId'], $stationArr);

            $logArr = array(
                'id' => $uuid,
                'action_kind' => 2,
                'comment' => 'modify the station',
                'operate_by' => $this->session->userdata('currentAdminId')
            );

            $this->load->model('maintain_log_model');
            $this->maintain_log_model->insert($logArr);


            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[1] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[1] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "");
            $data['addAdmin'] = $addAdmin;

            $newStation = $this->station_model->stationSelect($_POST['stationId']);

            $data['modifyStation'] = array(
                "hint" => '<h3>服务站信息修改成功</h3>',
                "station_id" => $newStation[0]->station_id,
                "station_name" => $newStation[0]->station_name,
                "station_address" => $newStation[0]->station_address,
                "station_phone_number" => $newStation[0]->station_phone_number
            );
            $data['addStation'] = array('hint' => "");

            $this->load->view('adminHeader', $data);
            $this->load->view('adminSystemMaintain', $data);
            $this->load->view('adminFooter');

        }else{
            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[1] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[1] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "");
            $data['addAdmin'] = $addAdmin;

            $data['modifyStation'] = array(
                "hint" => "",
                "station_id" => $_POST['stationId'],
                "station_name" => $_POST['stationName'],
                "station_address" => $_POST['stationAddress'],
                "station_phone_number" => $_POST['stationPhoneNum']
            );
            $data['addStation'] = array('hint' => "");

            $this->load->view('adminHeader', $data);
            $this->load->view('adminSystemMaintain', $data);
            $this->load->view('adminFooter');
        }
    }

    function addStation(){
        $this->form_validation->set_rules('stationId', '服务站编号', 'required|is_unique[t_station.station_id]');
        $this->form_validation->set_rules('stationPhoneNum', '服务站电话', 'required');
        $this->form_validation->set_rules('stationName', '服务站名称', 'required');
        $this->form_validation->set_rules('stationAddress','服务站地址','required');
        $this->form_validation->set_message('required','%s不能为空.');
        $this->form_validation->set_message('is_unique','该服务站编号已经存在.');

        if($this->form_validation->run()){

            $this->load->model('station_model');
            $stationArr = array(
                'station_id' => $_POST['aStationId'],
                'station_name' => $_POST['aStationName'],
                'station_address' => $_POST['aStationAddress'],
                'station_phone_number' => $_POST['aStationPhoneNum']
            );
            $this->station_model->stationInsert($stationArr);

            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[2] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[2] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "");
            $data['addAdmin'] = $addAdmin;

            $data['modifyStation'] = array(
                "hint" => "",
                "station_id" => '',
                "station_name" => '',
                "station_address" => '',
                "station_phone_number" => ''
            );
            $data['addStation'] = array('hint' => "<h3>添加服务站成功</h3>");

            $this->load->view('adminHeader', $data);
            $this->load->view('adminSystemMaintain', $data);
            $this->load->view('adminFooter');

        }else{
            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[2] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[2] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "");
            $data['addAdmin'] = $addAdmin;

            $data['modifyStation'] = array(
                "hint" => "",
                "station_id" => '',
                "station_name" => '',
                "station_address" => '',
                "station_phone_number" => ''
            );
            $data['addStation'] = array('hint' => "");

            $this->load->view('adminHeader', $data);
            $this->load->view('adminSystemMaintain', $data);
            $this->load->view('adminFooter');
        }
    }

    function deleteStation($id){
        if($id == -1){
            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            $tabActive = array('','','','','','','');
            $tabActive[1] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[1] = "active";
            $data['tabActiveP'] = $tabActiveP;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $data['addAdmin'] = array("hint" => "");

            $data['modifyStation'] = array(
                "hint" => '',
                "station_id" => "",
                "station_name" => "",
                "station_address" => "",
                "station_phone_number" => ""
            );

            $data['addStation'] = array('hint' => "");

            $this->load->view('adminHeader', $data);
            $this->load->view('adminSystemMaintain', $data);
            $this->load->view('adminFooter');
        }else{

            $this->load->model('station_model');
            $this->station_model->stationDelete($id);

            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            $tabActive = array('','','','','','','');
            $tabActive[1] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[1] = "active";
            $data['tabActiveP'] = $tabActiveP;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $data['addAdmin'] = array("hint" => "");

            $data['modifyStation'] = array(
                "hint" => '<h3 style="color: red">删除成功</h3>',
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
    }

    function modifyBike(){
        $this->form_validation->set_rules('mbSelectBikeId', '', 'required');
        $this->form_validation->set_rules('stationName', '服务站名称', 'required');
        $this->form_validation->set_rules('stationAddress','服务站地址','required');
        $this->form_validation->set_message('required','%s不能为空.');

        $bikeId = $_POST['mbSelectBikeId'];
        $available = $_POST['mbAvailable'];
        $parkingspaceId = $_POST['mbParkingspaceId'];
        $stationId = $_POST['mbStationId'];

        if($this->form_validation->run()){

            //uuid
            $chars = md5(uniqid(mt_rand(), true));
            $uuid  = "SM".date('Ymd',time()).substr($chars,0,8);

            $stationArr = array(
                'station_name' => $_POST['stationName'],
                'station_address' => $_POST['stationAddress'],
                'station_phone_number' => $_POST['stationPhoneNum']
            );

            $this->load->model('station_model');
            $this->station_model->stationUpdate($_POST['stationId'], $stationArr);

            $logArr = array(
                'id' => $uuid,
                'action_kind' => 2,
                'comment' => 'modify the station',
                'operate_by' => $this->session->userdata('currentAdminId')
            );

            $this->load->model('maintain_log_model');
            $this->maintain_log_model->insert($logArr);


            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[1] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[1] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "");
            $data['addAdmin'] = $addAdmin;

            $newStation = $this->station_model->stationSelect($_POST['stationId']);

            $data['modifyStation'] = array(
                "hint" => '<h3>服务站信息修改成功</h3>',
                "station_id" => $newStation[0]->station_id,
                "station_name" => $newStation[0]->station_name,
                "station_address" => $newStation[0]->station_address,
                "station_phone_number" => $newStation[0]->station_phone_number
            );
            $data['addStation'] = array('hint' => "");

            $this->load->view('adminHeader', $data);
            $this->load->view('adminSystemMaintain', $data);
            $this->load->view('adminFooter');

        }else{
            //get admin info
            $this->load->model('admin_model');
            $adminResult = $this->admin_model->select($this->session->userdata('currentAdminId'));
            $data['admin'] = $adminResult;

            //active class
            $arrActive = array('','','','','','','','','');
            $arrActive[5] = "class=\"active\"";
            $data['activeArr'] = $arrActive;

            //station info
            $this->load->model('station_model');
            $stationResult = $this->station_model->stationSelectAll();
            $data['allStation'] = $stationResult;

            $tabActive = array('','','','','','','');
            $tabActive[1] = "class=\"active\"";
            $data['tabActive'] = $tabActive;

            $tabActiveP = array('','','','','','','');
            $tabActiveP[1] = "active";
            $data['tabActiveP'] = $tabActiveP;

            $addAdmin = array("hint" => "");
            $data['addAdmin'] = $addAdmin;

            $data['modifyStation'] = array(
                "hint" => "",
                "station_id" => $_POST['stationId'],
                "station_name" => $_POST['stationName'],
                "station_address" => $_POST['stationAddress'],
                "station_phone_number" => $_POST['stationPhoneNum']
            );
            $data['addStation'] = array('hint' => "");

            $this->load->view('adminHeader', $data);
            $this->load->view('adminSystemMaintain', $data);
            $this->load->view('adminFooter');
        }
    }
}