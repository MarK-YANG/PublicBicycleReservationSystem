<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 11:45 AM
 */


$keyword = $_GET['q'];
$arrKey = explode(" ", $keyword);

$mysql_server_name = 'localhost';
$mysql_username = 'root';
$mysql_password = 'yang';
$mysql_database = 'PublicBicycleReservationSystem';

$conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);

mysql_select_db($mysql_database, $conn);

mysql_query('set names utf8');

$resultArr = array();

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}

$bikeRentSql = "select * from v_bike_rent where";

foreach ($arrKey as $row) {
    $bikeRentSql = $bikeRentSql . "((id like '%" . $row . "%' and finish_time = 'null')
            or (customer_id like'%" . $row . "%' and finish_time = 'null')
            or (rent_station_id like'%" . $row . "%' and finish_time = 'null')
            or (bike_id like'%" . $row . "%' and finish_time = 'null')
            or (parkingspace_id like'%" . $row . "%' and finish_time = 'null')
            or (start_time like'%" . $row . "%' and finish_time = 'null')
            or (finish_time like'%" . $row . "%' and finish_time = 'null')
            or (return_station_id like'%" . $row . "%' and finish_time = 'null')
            or (citizen_id like'%" . $row . "%' and finish_time = 'null')
            or (name like'%" . $row . "%' and finish_time = 'null')
            or (rent_station_name like'%" . $row . "%' and finish_time = 'null')
            or (rent_station_phone_number like'%" . $row . "%' and finish_time = 'null')
            or (return_station_name like'%" . $row . "%' and finish_time = 'null')
            or (return_station_phone_number like'%" . $row . "%' and finish_time = 'null')
            or (operate_by like'%" . $row . "%' and finish_time = 'null')) and ";
}

$bikeRentSql = substr($bikeRentSql, 0, -4);
$bikeRentSql = $bikeRentSql." ORDER BY start_time DESC";

$bikeRentResult = mysql_query($bikeRentSql);


while ($row = mysql_fetch_array($bikeRentResult)) {
    $resultArr[] = $row;
}



if(count($resultArr) != 0){
    echo "<div class=\"faq-toc\">
                <table class=\"table table-striped table-bordered\">
                    <thead>
                    <tr>
                        <th>订单编号</th>
                        <th>帐户名称</th>
                        <th>客户名称</th>
                        <th>租车服务站</th>
                        <th>订单创建时间</th>
                        <th>租用时间</th>
                        <th>完成订单</th>
                    </tr>
                    </thead>

                    <tbody>";
    foreach($resultArr as $row){
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['rent_station_name'] . "</td>";
        echo "<td>" . $row['start_time'] . "</td>";
        echo "<td style=\"color: orange\">";

        $start = strtotime($row['start_time']);
        $time = date('Y-m-d G:i:s', time());
        $end = strtotime($time);
        $left = floor(($end - $start) / 60);
        echo $left . "分钟";
        echo "</td>";
        echo "<td class=\"action-td\">
                            <a href=\"index.php/adminRentOrder/finish/" . $row['id'] . "\" class=\"btn btn-small btn-success\">
                                <i class=\"icon-ok\"></i>
                            </a>
                        </td>";
    }

    echo "</tbody></table></div>";
}

mysql_close($conn);