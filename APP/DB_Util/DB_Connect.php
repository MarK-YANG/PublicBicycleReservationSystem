<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 3/25/15
 * Time: 3:39 PM
 */

class DB_Connect{


    // constructor
    function __construct() {

    }

    // destructor
    function __destruct() {
        // $this->close();
    }

    public function connect() {
        require_once('Config.php');
        // connecting to mysql
        $con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());
        // selecting database
        mysql_select_db(DB_DATABASE) or die(mysql_error());

        mysql_query('set names utf8');

        date_default_timezone_set('Asia/Shanghai');

        // return database handler
        return $con;
    }

    // Closing database connection
    public function close() {
        mysql_close();
    }



}