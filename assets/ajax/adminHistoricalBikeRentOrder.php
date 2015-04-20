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
    $bikeRentSql = $bikeRentSql . "((id like '%" . $row . "%')
            or (customer_id like'%" . $row . "%')
            or (rent_station_id like'%" . $row . "%')
            or (bike_id like'%" . $row . "%')
            or (parkingspace_id like'%" . $row . "%')
            or (start_time like'%" . $row . "%')
            or (finish_time like'%" . $row . "%')
            or (return_station_id like'%" . $row . "%')
            or (citizen_id like'%" . $row . "%')
            or (name like'%" . $row . "%')
            or (rent_station_name like'%" . $row . "%')
            or (rent_station_phone_number like'%" . $row . "%')
            or (return_station_name like'%" . $row . "%')
            or (return_station_phone_number like'%" . $row . "%')
            or (operate_by like'%" . $row . "%')) and ";
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
                        <th>租车服务站名称</th>
                        <th>订单创建时间</th>
                        <th>订单状态</th>
                        <th></th>
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
        if($row['finish_time'] == "1999-01-01 00:00:00"){
            echo "<td style='color: red'>超时订单</td>";
        }elseif($row['finish_time'] == "2000-01-01 00:00:00"){
            echo "<td style='color: dodgerblue'>客户取消订单</td>";
        }elseif($row['finish_time'] == "null"){
            echo "<td style='color: orange'>未完成订单</td>";
        }else{
            echo "<td style='color: green'>完成订单</td>";
        }
        echo "<td class=\"action-td\"><a href=\"index.php/adminHistoricalOrder/bikeRent/" . $row['id'] . "\"><i>详细信息</i></a></td>";
    }

    echo "</tbody></table></div>";
}


mysql_close($conn);