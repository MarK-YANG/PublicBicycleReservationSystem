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
                        <th>余额</th>
                        <th>帐户状态</th>
                        <th>充值</th>
                        <th>解冻</th>
                    </tr>
                    </thead>

                    <tbody>";
    foreach($resultArr as $row){
        echo "<tr>";
        echo "<td>" . $row['customer_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>￥ " . number_format($row['balance'], 2) . "</td>";
        if($row['break_count'] >= 5){
            echo "<td>冻结</td>";
            echo "<td class=\"action-td\">
                            <a href=\"index.php/adminAccountManage/addBalance/".$row['customer_id']."\" class=\"btn btn-small  btn-success\">
                                <i class=\"icon-ok\"></i>
                            </a>
                        </td>";
            echo "<td class=\"action-td\">
                            <a href=\"index.php/adminAccountManage/refresh/".$row['customer_id']."\" class=\"btn btn-small btn-warning\">
                                <i class=\"icon-ok\"></i>
                            </a>
                        </td>";
        }else{
            echo "<td>正常</td>";
            echo "<td class=\"action-td\">
                            <a href=\"index.php/adminAccountManage/addBalance/".$row['customer_id']."\" class=\"btn btn-small  btn-success\">
                                <i class=\"icon-ok\"></i>
                            </a>
                        </td>";
            echo "<td class=\"action-td\">
                            <a href=\"javascript:;\" class=\"btn btn-small\">
                                <i class=\"icon-ok\"></i>
                            </a>
                        </td>";
        }



    }

    echo "</tbody></table></div>";
}


mysql_close($conn);
