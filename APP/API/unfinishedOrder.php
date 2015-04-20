<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 8:32 PM
 */


if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];

    // include db handler
    require_once('../Functions/unfinishedOrder.php');
    $db = new unfinishedOrder();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'bike') {

        $customerId = $_POST['customer_id'];

        //get unfinished bike order
        if($db->bikeOrder($customerId) != false){

            $response["error"] = FALSE;
            $response["bike"] = $db->bikeOrder($customerId);
            echo json_encode($response,JSON_UNESCAPED_UNICODE);
        }else{
            //has no unfinished order
            $response["error"] = TRUE;
            $response["error_msg"] = "There is no unfinished bike book order!";
            echo json_encode($response);
        }

    } else if ($tag == 'parkingspace') {

        $customerId = $_POST['customer_id'];

        //get unfinished parkingspace order
        if($db->parkingspaceOrder($customerId) != false){

            $response["error"] = FALSE;
            $response["parkingspace"] = $db->parkingspaceOrder($customerId);
            echo json_encode($response,JSON_UNESCAPED_UNICODE);

        }else{
            //has no unfinished order
            $response["error"] = TRUE;
            $response["error_msg"] = "There is no unfinished parkingspace book order!";
            echo json_encode($response);
        }
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'bike' or 'parkingspace'";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}