<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 8:10 PM
 */


if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];

    // include db handler
    require_once('../Functions/parkingspaceBook.php');
    require_once('../Functions/LoginAndRegister.php');
    require_once('../Functions/station.php');
    $db = new parkingspaceBook();
    $user = new LoginAndRegister();
    $station = new station();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'add') {

        // create bike book order

        $customerId = $_POST['customer_id'];
        $stationId = $_POST['station_id'];

        if($db->isExisted($customerId)){
            //has unfinished order
            $response["error"] = TRUE;
            $response["error_msg"] = "cannot create another order with a unfinished order !";
            echo json_encode($response);
        }else{
            if($db->isAvailable($stationId)){

                //create order
                $order = $db->add($customerId, $stationId);
                $myCustomer = $user->getUser($order['customer_id']);
                $myStation = $station->getStation($order['station_id']);
                $response['error'] = FALSE;
                $arr = array(
                    'id' => $order['id'],
                    'customer_id' => $order['customer_id'],
                    'station_id' => $order['station_id'],
                    'start_time' => $order['start_time'],
                    'station_id' => $order['station_id'],
                    'customer_name' => $myCustomer['name'],
                    'station_name' => $myStation['station_name']
                );

                $response['order'] = $arr;
                echo json_encode($response, JSON_UNESCAPED_UNICODE);

            }else{
                //no available bikes;
                $response["error"] = TRUE;
                $response["error_msg"] = "There is no available bikes at this station!";
                echo json_encode($response);
            }
        }
    } else if ($tag == 'cancel') {
        // Request type is cancel
        $uuid = $_POST['UUID'];

        if ($db->cancel($uuid)) {
            //get the station info success
            $response["error"] = FALSE;
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            // cancel failed, error occurred
            $response["error"] = TRUE;
            $response["error_msg"] = "The bike book order don't exist!";
            echo json_encode($response);
        }
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'add' or 'cancel'";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}