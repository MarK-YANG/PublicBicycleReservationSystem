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
    require_once('../Functions/historicalOrder.php');
    $db = new historicalOrder();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'bike') {

        $customerId = $_POST['customer_id'];

        //get historical bike order
        if($db->bike($customerId) != false){

            $response["error"] = FALSE;
            $response["bike"] = $db->bike($customerId);
            echo json_encode($response,JSON_UNESCAPED_UNICODE);
        }else{
            //has no unfinished order
            $response["error"] = TRUE;
            $response["error_msg"] = "There is no historical bike book order!";
            echo json_encode($response);
        }

    } else if ($tag == 'parkingspace') {

        $customerId = $_POST['customer_id'];

        //get historical parkingspace order
        if($db->parkingspace($customerId) != false){

            $response["error"] = FALSE;
            $response["parkingspace"] = $db->parkingspace($customerId);
            echo json_encode($response,JSON_UNESCAPED_UNICODE);

        }else{
            //has no unfinished order
            $response["error"] = TRUE;
            $response["error_msg"] = "There is no unfinished parkingspace book order!";
            echo json_encode($response);
        }
    } else if ($tag == 'rent') {

        $customerId = $_POST['customer_id'];

        //get historical parkingspace order
        if($db->rent($customerId) != false){

            $response["error"] = FALSE;
            $response["rent"] = $db->rent($customerId);
            echo json_encode($response,JSON_UNESCAPED_UNICODE);

        }else{
            //has no unfinished order
            $response["error"] = TRUE;
            $response["error_msg"] = "There is no unfinished rent book order!";
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