<?php
/**
 * Created by PhpStorm.
 * User: mark
 * Date: 5/10/15
 * Time: 5:57 PM
 */

require_once('../Functions/station.php');


$email = "emp.yangchunyu@gmail.com";

//$emailFormat = "^(?(\"\")(\"\".+?\"\"@)|(([0-9a-zA-Z]((\\.(?!\\.))|[-!#\\$%&'\\*\\+/=\\?\\^`\\{\\}\\|~\\w])*)(?<=[0-9a-zA-Z])@))(?(\\[)(\\[(\\d{1,3}\\.){3}\\d{1,3}\\])|(([0-9a-zA-Z][-\\w]*[0-9a-zA-Z]\\.)+[a-zA-Z]{2,6}))$";

$reg= "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";

if(preg_match($reg, $email)){
    echo "success";
}else{
    echo "false";
}