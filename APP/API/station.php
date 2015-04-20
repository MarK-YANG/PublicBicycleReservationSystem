<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/29/15
 * Time: 4:27 PM
 */

if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // get tag
    $tag = $_POST['tag'];

    // include db handler
    require_once('../Functions/station.php');
    $db = new station();

    // response Array
    $response = array("tag" => $tag, "error" => FALSE);

    // check for tag type
    if ($tag == 'allStationStatus') {

        // get all stations status

        $allStationStatus = $db->getAllStationStatus();

        if ($allStationStatus != false) {
            // get success
            $response["error"] = FALSE;
//            $response["station"]["station_id"] = $allStationStatus["station_id"];
//            $response["station"]["station_name"] = $allStationStatus["station_name"];
//            $response["station"]["station_address"] = $allStationStatus["station_address"];
//            $response["station"]["station_phone_number"] = $allStationStatus["station_phone_number"];
//            $response["station"]["available_bike_count"] = $allStationStatus["available_bike_count"];
//            $response["station"]["available_parkingspace_count"] = $allStationStatus["available_parkingspace_count"];
            $response['stationStatus'] = $allStationStatus;
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            // error occour
            // echo json with error = 1
            $response["error"] = TRUE;
            $response["error_msg"] = "There is no stations in the system!";
            echo json_encode($response);
        }
    } else if ($tag == 'selectedStationStatus') {
        // Request type is selectedStationStatus
        $stationId = $_POST['station_id'];

        // search the selected station
        $selectStation = $db->getStationStatusById($stationId);

        if ($selectStation) {
            //get the station info success
            $response["error"] = FALSE;
            $response["station"] = $selectStation;
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            // station don't exist, error occurred
            $response["error"] = TRUE;
            $response["error_msg"] = "Selected station don't exist";
            echo json_encode($response);
        }
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown 'tag' value. It should be either 'allStationStatus' or 'selectStationStatus'";
        echo json_encode($response);
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameter 'tag' is missing!";
    echo json_encode($response);
}