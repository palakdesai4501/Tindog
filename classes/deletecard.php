<?php

if ( ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) && $_SERVER['HTTP_X_REQUESTED_WITH'] ) {

    session_start();

    define( 'ACCESS_RESTRICTED_PASS_6677', TRUE );

    include 'myAutoLoader.php';

    $data = $_POST['card_id'];

    $obj = new dbconnection();

    if ( $obj->delete_card( intval( $data ) ) == 'true' ) {
        echo 'true';
    }

} else {
    header( 'location: ../error.php' );
}

?>