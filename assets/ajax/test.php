<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 11:24 PM
 */

$keyword = "e 2304";

$arrKey = explode(" ", $keyword);

$bikeBookSql = "select * from v_bike_book where";

foreach ($arrKey as $row) {
        $bikeBookSql = $bikeBookSql . "((id like '%" . $row . "%' and finish_time = 'null')
            or (customer_id like'%" . $row . "%' and finish_time = 'null')
            or (station_id like'%" . $row . "%' and finish_time = 'null')
            or (parkingspace_id like'%" . $row . "%' and finish_time = 'null')
            or (bike_id like'%" . $row . "%' and finish_time = 'null')
            or (start_time like'%" . $row . "%' and finish_time = 'null')
            or (citizen_id like'%" . $row . "%' and finish_time = 'null')
            or (name like'%" . $row . "%' and finish_time = 'null')
            or (station_name like'%" . $row . "%' and finish_time = 'null')
            or (station_phone_number like'%" . $row . "%' and finish_time = 'null')
            or (operate_by like'%" . $row . "%' and finish_time = 'null')) and ";
}
$bikeBookSql = substr($bikeBookSql, 0, -4);
$bikeBookSql = $bikeBookSql." ORDER BY start_time DESC";
echo $bikeBookSql;