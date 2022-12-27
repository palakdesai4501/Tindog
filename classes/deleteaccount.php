<?php

if ( ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) && $_SERVER['HTTP_X_REQUESTED_WITH'] ) {

    session_start();

    define( 'ACCESS_RESTRICTED_PASS_658963', TRUE );

    include 'myAutoLoader.php';

    $data = $_POST['data'];

    $obj = new dbconnection();

    if ( $data == 'match' ) {
        if ( $obj->delete_account() == 'true' ) {
            echo 'true';
        }
    }
   
} else {
    header( 'location: ../error.php' );
}

?>