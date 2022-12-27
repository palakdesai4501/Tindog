<?php

if ( ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) && $_SERVER['HTTP_X_REQUESTED_WITH'] ) {

    session_start();

    define( 'ACCESS_RESTRICTED_PASS_658963', TRUE );

    unset( $_SESSION['user_id'] );
    session_destroy();

    echo 'redirect';

} else {
    header( 'location: ../error.php' );
}

?>