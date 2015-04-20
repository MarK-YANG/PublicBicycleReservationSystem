<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/25/15
 * Time: 4:24 PM
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
    if ($tag == 'login') {
        // Request type is check Login
        $customer_id = $_POST['customer_id'];
        $password = $_POST['password'];


        // check for customer
        $customer = $db->getCustomer($customer_id, $password);

        if ($customer != false) {
            // customer found
            $response["error"] = FALSE;
            $response["customer"]["customer_id"] = $customer["customer_id"];
            $response["customer"]["citizen_id"] = $customer["citizen_id"];
            $response["customer"]["gender"] = $customer["gender"];
            $response["customer"]["create_time"] = $customer["create_time"];
            $response["customer"]["break_count"] = $customer["break_count"];
            $response["customer"]["birthdate"] = $customer["birthdate"];
            $response["customer"]["name"] = $customer["name"];
            $response["customer"]["balance"] = $customer["balance"];
            $response["customer"]["level"] = $customer["level"];
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "Incorrect customer_id or password!";
            echo json_encode($response);
        }
    } else if ($tag == 'register') {
        // Request type is Register new customer
        $customer_id = $_POST['customer_id'];
        $citizen_id = $_POST['citizen_id'];
        $gender = $_POST['gender'];
        $name = $_POST['name'];
        $birthdate = $_POST['birthdate'];
        $password = md5($_POST['password']);

        $arr = array($customer_id, $password, $citizen_id, $gender, $birthdate, $name);

        // check if customer is already existed
        if ($db->isCustomerExisted($customer_id)) {
            // user is already existed - error response
            $response["error"] = TRUE;
            $response["error_msg"] = "Customer already existed";
            echo json_encode($response);
        } else {
            // store user
            $customer = $db->newCustomer($arr);

            if ($customer != false) {
                // customer stored successfully
                $response["error"] = FALSE;
                $response["customer"]["customer_id"] = $customer["customer_id"];
                $response["customer"]["citizen_id"] = $customer["citizen_id"];
                $response["customer"]["gender"] = $customer["gender"];
                $response["customer"]["create_time"] = $customer["create_time"];
                $response["customer"]["break_count"] = $customer["break_count"];
                $response["customer"]["birthdate"] = $customer["birthdate"];
                $response["customer"]["name"] = $customer["name"];
                $response["customer"]["balance"] = $customer["balance"];
                $response["customer"]["level"] = $customer["level"];
                echo json_encode($response, JSON_UNESCAPED_UNICODE);
            } else {
                // customer failed to store
                $response["error"] = TRUE;
                $response["error_msg"] = "Error occurred in Registration";
                echo json_encode($response);
            }
        }
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'login' or 'register'";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}