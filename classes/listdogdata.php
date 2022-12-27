<?php

function guid() {
    return sprintf( '%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 16384, 20479 ), mt_rand( 32768, 49151 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ), mt_rand( 0, 65535 ) );
}

if ( ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) && $_SERVER['HTTP_X_REQUESTED_WITH'] ) {

    session_start();

    define( 'ACCESS_RESTRICTED_PASS_658963', TRUE );

    include 'myAutoLoader.php';

    try {
        $obj = new dbconnection;

        $breed = $_POST['breed'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $behaviour = $_POST['behaviour'];
        $age = $_POST['age'];
        $color = $_POST['color'];
        $image_url = guid() . '-' . ( new DateTime() )->format( 'YmdHis' );
        $filename = $image_url;

        $test = explode( '.', $_FILES['file']['name'] );
        $location = '../database/' . $filename .'.png';
        move_uploaded_file( $_FILES['file']['tmp_name'], $location );

        if ( $obj->list_dog( $breed, $height, $weight, $behaviour, ( int )$age, $color, $filename ) == 'true' ) {
            echo 'true';
        } else {
            echo $obj->list_dog( $breed, $height, $weight, $behaviour, ( int )$age, $color, $filename );
        }

        exit();
    } catch ( Exception $ex ) {
        echo 'error'.$ex;
    }

} else {
    header( 'location: ../error.php' );
}
?>
