<?php

if ( ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) && $_SERVER['HTTP_X_REQUESTED_WITH'] ) {

    session_start();

    define( 'ACCESS_RESTRICTED_PASS_658963', TRUE );

    include 'myAutoLoader.php';

    try {
        $obj = new dbconnection;
        if ( $obj->authenticate( ( string )$_POST['email'], ( string )$_POST['password'] ) == 'false' ) {
            echo 'Incorrect email or password';
        } else if ( $obj->authenticate( ( string )$_POST['email'], ( string )$_POST['password'] ) == 'Something went wrong' ) {
            echo 'Something went wrong! Try again later';
        } else {
            $_SESSION['user_id'] = $obj->authenticate( ( string )$_POST['email'], ( string )$_POST['password'] );
            echo 'redirect';
        }
        exit();
    } catch ( Exception $ex ) {
        echo 'error'.$ex;
    }

} else {
    header( 'location: ../error.php' );
}
?>