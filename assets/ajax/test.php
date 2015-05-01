<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/3/15
 * Time: 11:24 PM
 */
//
//$keyword = "e 2304";
//
//$arrKey = explode(" ", $keyword);
//
//$bikeBookSql = "select * from v_bike_book where";
//
//foreach ($arrKey as $row) {
//        $bikeBookSql = $bikeBookSql . "((id like '%" . $row . "%' and finish_time = 'null')
//            or (customer_id like'%" . $row . "%' and finish_time = 'null')
//            or (station_id like'%" . $row . "%' and finish_time = 'null')
//            or (parkingspace_id like'%" . $row . "%' and finish_time = 'null')
//            or (bike_id like'%" . $row . "%' and finish_time = 'null')
//            or (start_time like'%" . $row . "%' and finish_time = 'null')
//            or (citizen_id like'%" . $row . "%' and finish_time = 'null')
//            or (name like'%" . $row . "%' and finish_time = 'null')
//            or (station_name like'%" . $row . "%' and finish_time = 'null')
//            or (station_phone_number like'%" . $row . "%' and finish_time = 'null')
//            or (operate_by like'%" . $row . "%' and finish_time = 'null')) and ";
//}
//$bikeBookSql = substr($bikeBookSql, 0, -4);
//$bikeBookSql = $bikeBookSql." ORDER BY start_time DESC";
//echo $bikeBookSql;

$citizenId = '230403199408060233';
$birthDate = '1994-08-06';
$gender = 1;

$birth = explode('-', $birthDate, 3);
$result = $birth[0] . $birth[1] . $birth[2];
$citizenDate = substr($citizenId, 6, 8);

if($citizenDate == $result){
    echo "true";
}else{
    echo "false";
}

$citizenGender = substr($citizenId, 16, 1);
if($citizenGender%2 == $gender){
    echo "true";
}else{
    echo "false";
}

$str = '230403199408060233';

$eachNum = str_split($str,1);
$weight = array(7, 9, 10, 5, 8 , 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);

$parity_bit = array(1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2);

$sum = 0;

for($i = 0; $i < 17; ++$i){
    $sum += $eachNum[$i] * $weight[$i];
}

$result_count = $sum%11;
$result_parity_bit = $parity_bit[$result_count];

if($result_parity_bit == $eachNum[17]){
    echo 'true';
}else{
    echo 'false';
}


