<?php

if ( ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) && $_SERVER['HTTP_X_REQUESTED_WITH'] ) {

    session_start();

    define( 'ACCESS_RESTRICTED_PASS_658963', TRUE );

    include 'myAutoLoader.php';

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    try {
        $obj = new dbconnection();
        if ( $obj->add_user( $firstname, $lastname, $email, $phone, $password ) == 'true' ) {
            echo 'redirect';
            return;
        } else if ( $obj->add_user( $firstname, $lastname, $email, $phone, $password ) == 'Error' ) {
            echo 'Some error occured!';
        } else if ( $obj->add_user( $firstname, $lastname, $email, $phone, $password ) == 'Exist' ) {
            echo 'Account already exist!';
        }
        exit();
    } catch ( Exception $ex ) {
        echo 'error: '.$ex;
    }

} else {
    header( 'location: ../error.php' );
}
?>
