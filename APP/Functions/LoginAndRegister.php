<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/25/15
 * Time: 4:09 PM
 */

class LoginAndRegister{

    private $db;

    /*
     * constructor
     */

    function __construct(){
        require_once('../DB_Util/DB_Connect.php');
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    /*
     * destructor
     */

    function __destruct(){

    }

    /*
     * create a new cusotmer
     */

    public function newCustomer($arr){

        $time = date('Y-m-d G:i:s', time());

        $sql = "INSERT INTO t_customer (customer_id, password, citizen_id, gender, create_time, break_count, birthdate, t_customer.name, balance, t_customer.level)
                VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]','$time', 0, '$arr[4]', '$arr[5]', 0, 0)";

        $result = mysql_query($sql);

        if($result){
            $selectSQL = "SELECT * FROM t_customer WHERE customer_id = '$arr[0]'";
            $customer = mysql_query($selectSQL);
            return mysql_fetch_array($customer);
        }else{
            return false;
        }


    }

    /*
     * Get Customer by customer_id & password
     */

    public function getCustomer($customerId, $password){

        $passwd = md5($password);
        $sql = "SELECT * FROM t_customer WHERE customer_id = '$customerId' AND password = '$passwd'";
        $result = mysql_query($sql);

        $num_of_rows = mysql_num_rows($result);

        if($num_of_rows > 0){
            return mysql_fetch_array($result);
        }else{
            return false;
        }

    }

    /*
     * check customer is existed or not
     */

    public function isCustomerExisted($customerId){
        $sql = "SELECT * FROM t_customer WHERE customer_id = '$customerId'";
        $result = mysql_query($sql);

        $num_of_rows = mysql_num_rows($result);

        if($num_of_rows > 0){
            //customer exist
            return true;
        }else{
            //customer not exist
            return false;
        }
    }

    public function getUser($id){
        $sql = "SELECT * FROM t_customer WHERE customer_id = '$id'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }

    public function changePassword($arr){

        $checkSQL = "SELECT * FROM t_customer WHERE customer_id = '$arr[0]' and password = '$arr[1]'";
        $result = mysql_query($checkSQL);
        $num_of_rows = mysql_num_rows($result);

        if($num_of_rows == 0){
            return false;
        }else {
            $sql = "UPDATE t_customer SET password = '$arr[2]' WHERE customer_id = '$arr[0]'";
            mysql_query($sql);
            return true;
        }
    }
}