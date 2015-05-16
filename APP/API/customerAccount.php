<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 5/14/15
 * Time: 7:26 PM
 */

if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];

    // include db handler
    require_once('../Functions/LoginAndRegister.php');
    $db = new LoginAndRegister();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'get') {
        // Request type is check Login
        $customer_id = $_POST['customer_id'];

        // check for customer
        $customer = $db->getUser($customer_id);

        if ($customer != false) {
            // customer found
            $response["error"] = FALSE;
//            $response["customer"]["customer_id"] = $customer["customer_id"];
//            $response["customer"]["citizen_id"] = $customer["citizen_id"];
//            $response["customer"]["gender"] = $customer["gender"];
//            $response["customer"]["create_time"] = $customer["create_time"];
//            $response["customer"]["break_count"] = $customer["break_count"];
//            $response["customer"]["birthdate"] = $customer["birthdate"];
//            $response["customer"]["name"] = $customer["name"];
//            $response["customer"]["balance"] = $customer["balance"];
//            $response["customer"]["level"] = $customer["level"];
            $response['customer'] = $customer;
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "can not found this customer";
            echo json_encode($response);
        }
    } else if ($tag == 'changePassword') {
        // Request type is Register new customer
        $customer_id = $_POST['customer_id'];
        $old_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);

        $arr = array($customer_id, $old_password, $new_password);

        // update password
        if($db->changePassword($arr)){
            $response['error'] = FALSE;
            echo json_encode($response);
        }else{
            $response['error'] = TRUE;
            $response['error_msg'] = "wrong password";
            echo json_encode($response);
        }


    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'get' or 'changePassword'";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}