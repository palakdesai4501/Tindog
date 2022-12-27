<?php

if(($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') && $_SERVER['HTTP_X_REQUESTED_WITH']) {

   define('ACCESS_RESTRICTED_PASS_658963', TRUE);
   
   session_start();

   include 'myAutoLoader.php';

   $password = $_POST['password'];

   $obj = new dbconnection();

   if($obj->check_password((string)$password) == "match") {
      echo "match";
   }
   
} else {
   header('location: ../error.php');
}

?>