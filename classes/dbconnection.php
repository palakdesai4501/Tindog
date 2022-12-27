<?php

//declare( strict_types = 1 );

if(defined('ACCESS_RESTRICTED_PASS_658963') || defined('ACCESS_RESTRICTED_PASS_6677')) {

error_reporting( E_ERROR | E_WARNING | E_PARSE );

class dbconnection {

    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'tindog';
    protected $conn;

    //----------------------------------------------------------
    //----------------------------------------------------------
    //-----------------## connection method ##------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    protected function connection() {
        $this->conn = new mysqli( $this->hostname, $this->username, $this->password, $this->dbname );

        if ( $this->conn == false ) {
            die( 'connection error: ' . mysqli_connect_error() );
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //----------------## die_connection method ##---------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    protected function die_connection() {
        mysqli_close( $this->conn );
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //-----------------## authenticate method ##----------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function authenticate( $username,  $password ) {

        $this->connection();

        $query = "SELECT user_id FROM user_master WHERE email=? AND password=? AND account_status='1'";

        error_reporting( E_ERROR | E_WARNING | E_PARSE );

        try {
            $stmt = $this->conn->prepare( $query );
            $stmt->bind_param( 'ss', $username, md5( $password ) );
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();

            if ( isset( $data['user_id'] ) ) {
                return $data['user_id'];
            } else {
                return 'false';
            }
        } catch ( Exception $ex ) {
            return 'Something went wrong';
        }
        finally {
            $this->die_connection();
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //-----------------## authenticate method ##----------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function add_user(  $firstname,  $lastname,  $email,  $phone,  $password ) {

        $this->connection();

        $query = "SELECT user_id FROM user_master WHERE email='$email' AND account_status='1'";

        $row = mysqli_query( $this->conn, $query );

        if ( mysqli_num_rows( $row ) == 0 ) {

            $query = 'INSERT INTO user_master (firstname, lastname, email, phone, password, account_status, creation_date, updation_date) VALUES (?,?,?,?,?,?,?,?)';

            $dateTimeNow = ( new DateTime( 'now', new DateTimeZone( 'Asia/Kolkata' ) ) )->format( 'Y-m-d H:i:s' );
            $password = md5( $password );
            $active_status = '1';

            error_reporting( E_ERROR | E_WARNING | E_PARSE );

            try {
                $stmt = $this->conn->prepare( $query );
                $stmt->bind_param( 'ssssssss', $firstname, $lastname, $email, $phone, $password, $active_status, $dateTimeNow, $dateTimeNow );
                if ( $stmt->execute() ) {
                    $query = "SELECT user_id FROM user_master WHERE email=? AND account_status='1'";

                    error_reporting( E_ERROR | E_WARNING | E_PARSE );

                    try {
                        $stmt = $this->conn->prepare( $query );
                        $stmt->bind_param( 's', $email );
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $data = $result->fetch_assoc();

                        $_SESSION['user_id'] = $data['user_id'];
                        return 'true';

                    } catch ( Exception $ex ) {
                        return 'Error' . $ex;
                    }
                }
            } catch ( Exception $ex ) {
                return 'Error' . $ex;
            }
            finally {
                $this->die_connection();
            }
        } else {
            $this->die_connection();
            return 'Exist';
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //-------------------## add dog data ##---------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function list_dog(  $breed,  $height,  $weight,  $behaviour, $age,  $color,  $image_url ) {

        $this->connection();

        $userid = $_SESSION['user_id'];
        $active_status = 1;
        $query = 'INSERT INTO dog_master (user_id, breed, height, weight, behaviour, age, color, image_url, active_status) VALUES (?,?,?,?,?,?,?,?,?)';

        error_reporting( E_ERROR | E_WARNING | E_PARSE );

        try {
            $stmt = $this->conn->prepare( $query );
            $stmt->bind_param( 'issssissi', $userid, $breed, $height, $weight, $behaviour, $age, $color, $image_url, $active_status );
            if ( $stmt->execute() ) {
                return 'true';
            }
        } catch ( Exception $ex ) {
            return 'Error' . $ex;
        }
        finally {
            $this->die_connection();
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //-------------------## check password ##-------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function check_password(  $password ) {
        try {
            $this->connection();

            $userid = $_SESSION['user_id'];

            $query = "SELECT password FROM user_master WHERE user_id = '" . $userid . "'";
            if ( $data = mysqli_query( $this->conn, $query ) ) {
                $row = mysqli_fetch_assoc( $data );
                if ( md5( $password ) == $row['password'] ) {
                    return 'match';
                } else {
                    return 'no_match';
                }
            } else {
                return 'error';
            }
        } catch( Exception $ex ) {
            return 'Error occured!';
        }
        finally {
            $this->die_connection();
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //-------------------## delete account ##-------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function delete_account() {
        try {
            $this->connection();

            $userid = $_SESSION['user_id'];

            $query = "UPDATE user_master SET account_status = '0' WHERE user_id = '" . $userid . "'";
            if ( mysqli_query( $this->conn, $query ) ) {
                return 'true';
            } else {
                return 'Some error occured! Try again';
            }
        }
        finally {
            $this->die_connection();
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //------------------## get cards length ##------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function get_total_card_length() {
        $this->connection();
        $getData = "SELECT dog_id FROM dog_master WHERE active_status = '1' ORDER BY dog_id DESC";

        $getDataCmd = mysqli_query( $this->conn, $getData );

        return $getDataCmd;
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //------------## get selected cards length ##---------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function get_selected_card_length($id) {
        $this->connection();
        $getData = "SELECT dog_id FROM dog_master WHERE active_status = '1' AND user_id = '$id' ORDER BY dog_id DESC";

        $getDataCmd = mysqli_query( $this->conn, $getData );

        return $getDataCmd;
    }
   
    //----------------------------------------------------------
    //----------------------------------------------------------
    //-------------------## get cards data ##-------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function get_cards_data($dogid) {
        $this->connection();
        $getData = "SELECT d.dog_id, u.firstname, u.lastname, d.breed, d.image_url, d.active_status FROM user_master u JOIN dog_master d ON (u.user_id = d.user_id) WHERE d.dog_id = '$dogid'";

        $getDataCmd = mysqli_query( $this->conn, $getData );
        $data = mysqli_fetch_assoc( $getDataCmd );

        return $data;
    }
   
    //----------------------------------------------------------
    //----------------------------------------------------------
    //-------------## get seleced cards data ##-----------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function get_selected_cards_data($dogid) {
        $this->connection();
        $getData = "SELECT dog_id, breed, image_url FROM dog_master WHERE dog_id = '$dogid'";

        $getDataCmd = mysqli_query( $this->conn, $getData );
        $data = mysqli_fetch_assoc( $getDataCmd );

        return $data;
    }
   
    //----------------------------------------------------------
    //----------------------------------------------------------
    //------------------## get more details ##------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function get_dog_details($dogid) {
        $this->connection();
        $getData = "SELECT d.dog_id, u.firstname, u.lastname, u.email, u.phone, d.breed, d.height, d.weight, d.behaviour, d.age, d.color, d.image_url FROM user_master u JOIN dog_master d ON (u.user_id = d.user_id) WHERE d.dog_id = '$dogid'";

        $getDataCmd = mysqli_query( $this->conn, $getData );
        $data = mysqli_fetch_assoc( $getDataCmd );

        return $data;
    }
   
    //----------------------------------------------------------
    //----------------------------------------------------------
    //--------------------## delete card ##--------------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function delete_card( $dogid ) {
        $this->connection();

        $query = "UPDATE dog_master SET active_status = '0' WHERE dog_id = '$dogid'";
        if ( mysqli_query( $this->conn, $query ) ) {
            return 'true';
        } else {
            return 'error';
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //---------------## get last updated date ##----------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function last_updated_date( $userid ) {
        $this->connection();

        $query = "SELECT updation_date FROM user_master WHERE user_id = '" . $userid . "'";
        if ( $data = mysqli_query( $this->conn, $query ) ) {
            $row = mysqli_fetch_assoc( $data );
            return ( string )$row['updation_date'];
        }
    }

    //----------------------------------------------------------
    //----------------------------------------------------------
    //---------------## get last updated date ##----------------
    //----------------------------------------------------------
    //----------------------------------------------------------

    public function update_account( $firstname, $lastname, $email, $phone, $password ) {
        $this->connection();

        $user_id = $_SESSION['user_id'];

        $flag = false;
        $done = false;

        $query = "SELECT user_id FROM user_master WHERE email='$email' AND account_status='1'";

        $row = mysqli_query( $this->conn, $query );
        $data = mysqli_fetch_assoc( $row );

        if ( mysqli_num_rows( $row ) != 0 ) {
            if ( $data['user_id'] == $user_id ) {
                $done = true;
            } else {
                echo "You can't use this email address";
                return;
            }
        } else {
            $done = true;
        }

        if ( $done == true ) {
            if ( !empty( $firstname ) ) {
                $query = "UPDATE user_master SET firstname = '$firstname' WHERE user_id = '$user_id'";
                if ( mysqli_query( $this->conn, $query ) )
                $flag = true;
                else
                $flag = false;
            }

            if ( !empty( $lastname ) ) {
                $query = "UPDATE user_master SET lastname = '$lastname' WHERE user_id = '$user_id'";
                if ( mysqli_query( $this->conn, $query ) )
                $flag = true;
                else
                $flag = false;
            }

            if ( !empty( $email ) ) {
                $query = "UPDATE user_master SET email = '$email' WHERE user_id = '$user_id'";
                if ( mysqli_query( $this->conn, $query ) )
                $flag = true;
                else
                $flag = false;
            }

            if ( !empty( $phone ) ) {
                $query = "UPDATE user_master SET phone = '$phone' WHERE user_id = '$user_id'";
                if ( mysqli_query( $this->conn, $query ) )
                $flag = true;
                else
                $flag = false;
            }

            if ( !empty( $password ) ) {
                $password = md5( $password );
                $query = "UPDATE user_master SET password = '$password' WHERE user_id = '$user_id'";
                if ( mysqli_query( $this->conn, $query ) )
                $flag = true;
                else
                $flag = false;
            }

            $dateTimeNow = ( new DateTime( 'now', new DateTimeZone( 'Asia/Kolkata' ) ) )->format( 'Y-m-d H:i:s' );
            $query = "UPDATE user_master SET updation_date = '$dateTimeNow' WHERE user_id = '$user_id'";
            if ( mysqli_query( $this->conn, $query ) )
            $flag = true;
            else
            $flag = false;

            if ( $flag == false ) {
                return 'Some error occured! Try again';
            } else {
                return 'true';
            }
        }

    }
}
} else {
   header('location: ../error.php');
}

?>
