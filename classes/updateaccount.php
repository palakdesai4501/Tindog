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

    $obj = new dbconnection();

    if ( $obj->update_account( $firstname, $lastname, $email, $phone, $password ) == true )
    echo 'Account updated successfully!';
    exit();

} else {
    header( 'location: ../error.php' );
}

?>