<?php
//sleep(1);
ob_start();
    require_once "scripts/php/includes/start_session.php";
    require_once "scripts/php/includes/functions.php";

    $error = "";

function __autoload($class_name){
    include "includes/" . $class_name . ".php";
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $us = $_POST["username"];
    $pas = $_POST["password"];
    if($_POST["username"] != NULL && $_POST["password"] != NULL){
        $username = trim(custom_mysql_prep($_POST["username"]));
        $password = trim(custom_mysql_prep($_POST["password"]));
        $hashPassword = sha1($password);
        checkDB($us, $pas);
    }
    else if($_POST["username"] == NULL && $_POST["password"] != NULL){
        $error = "please input username";
    }else if($_POST["password"] == NULL && $_POST["username"] != NULL){
        $error = "please input password";
    }else{
        $error = "please input username and password";
    }
}
    function checkDB($user, $pass){
        /*global $con;
        $query = "SELECT * ";
        $query .= "FROM admin ";
        $query .= "WHERE user = '{$user}}' ";
        $query .= "AND password = '{$pass}'";*/

        global $error;
        $result_set = DbHandler::select_cmd(['table' => 'admin',
                                            'col' => ['user', 'password'],
                                            'join' => ['AND'],
                                            'val' => ["{$user}", "{$pass}"],
                                           'type' => "equal"]);

        /*$result_set = mysqli_query($con, $query);*/
        if(!empty($result_set[0])){
            $error = "Authorization Granted";
            $found_user = $result_set[0];
            $_SESSION['user_id'] = $found_user['user_id'];
            $_SESSION['username'] = $found_user['user'];
            custom_redirect_to("http://webplayglobal.co.uk/MagicBrushAdmin/index.php");
            exit();
        }else{
            print_r($result_set[0]);
            $error = "Wrong Username and Password";
        }
    }
    ob_end_flush();
?>
