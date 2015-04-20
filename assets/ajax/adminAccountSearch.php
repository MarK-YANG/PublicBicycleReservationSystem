<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 2/28/15
 * Time: 11:45 AM
 */


$keyword = $_GET['q'];

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


$customerSql = "select * from t_customer where (t_customer.name like '%".$keyword . "%')
                or (t_customer.citizen_id like '%".$keyword."%')
                or (t_customer.customer_id like '%".$keyword."%')
                or (t_customer.birthdate like '%".$keyword."%')";


$customerResult = mysql_query($customerSql);


while ($row = mysql_fetch_array($customerResult)) {
    $resultArr[] = $row;
}



if(count($resultArr) != 0){
    echo "<div class=\"faq-toc\">
                <table class=\"table table-striped table-bordered\">
                    <thead>
                    <tr>
                        <th>帐户名称</th>
                        <th>客户姓名</th>
                        <th>性别</th>
                        <th>身份证号码</th>
                        <th>出生日期</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>";
    foreach($resultArr as $row){
        echo "<tr>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        if($row['gender'] == 1){
            echo "<td>男</td>";
        }else{
            echo "<td>女</td>";
        }
        echo "<td>" . $row['citizen_id'] . "</td>";
        echo "<td>" . $row['birthdate'] . "</td>";
        echo "<td class=\"action-td\"><a href=\"index.php/adminAccountSearch/search/" . $row['customer_id'] . "\"><i>详细信息</i></a></td>";
    }

    echo "</tbody></table></div>";
}


mysql_close($conn);
