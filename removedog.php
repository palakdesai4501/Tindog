<?php
   
session_start();

define('ACCESS_RESTRICTED_PASS_658963', TRUE);

include 'classes/dbconnection.php';

if(!isset($_SESSION['user_id'])) {
   session_destroy();
   header("location: login.html");
   exit();
}

?>

<!DOCTYPE html>

<html>

<head>
   <title>Tindog</title>
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <link type="image/icon" rel="icon" href="resources/logoSVG.svg" />
   <link type="text/css" rel="stylesheet" href="css/index.css" />
   <link type="text/css" rel="stylesheet" href="css/removedog.css" />
   <link type="text/css" rel="stylesheet" href="css/fonts.css" />
   <script src="https://kit.fontawesome.com/ffb41c23b7.js" crossorigin="anonymous"></script>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   <div class="loader_IN">
      <img src="resources/loader.gif">
   </div>
   <div class="main_container_IN">
      <nav class="nav_container_IN">
         <div class="logo_container_IN">
            <i class="fa fa-bars menuIcon" id="menuBtn" onclick="menu_click()"></i>
            <i class="fa fa-arrow-left menuIcon" id="backBtn" onclick="back_click()"></i>
            <p>Tindog</p>
         </div>
         <div class="nav_menu_IN">
            <a class="page_navigation" id="FstPage">Adopt dog</a>
            <a class="page_navigation" id="SndPage">List your dog</a>
            <a class="page_navigation active" id="TrdPage">Your dogs</a>
            <a class="page_navigation" id="FthPage">Update account</a>
            <div class="btnSignoutBlock">
               <button onclick="signout_click()">Sign out</button>
            </div>
         </div>
      </nav>

      <div class="content_container_IN">

         <?php
         $user_id = $_SESSION['user_id'];

         $obj = new dbconnection();
         $dog_total_id = $obj->get_selected_card_length($user_id);

         error_reporting(E_ERROR | E_WARNING | E_PARSE);

         if(mysqli_num_rows($dog_total_id) > 0) {
            
         ?>
         
         <div class="main_container_AD">
            
         <?php
            
            while($line = mysqli_fetch_assoc($dog_total_id)) {
               $data = $obj->get_selected_cards_data((int)$line['dog_id']);
         ?>

         <!------------------cards here---------------------->
         <div class="card_AD" id="<?php echo $line['dog_id'];?>_card" onclick="card_click_remove(this)">
            <div class="image_container_AD">
               <img src="database/<?php echo $data['image_url']?>.png">
            </div>
            <div class="breed_name_container_AD">
               <p><?php echo $data['breed'];?></p>
            </div>
         </div>
         <!------------------cards here---------------------->

         <?php 
         }
         ?>
         </div>
         <?php
         } else {
         ?>
         
         <div class="blank_dogImg_cover">
            <img src="resources/noDogFound.png"/>
         </div>
         
         <?php
         }
         ?>
         
      </div>
   </div>

   <div id="moreInfoRD">
      <div class="loading_cover">
         <p>Loading please wait</p>
      </div>
   </div>
   
   <!------------------java script------------------->
   <script type="text/javascript" src="js/index.js"></script>
   <script type="text/javascript" src="js/removedog.js"></script>

</body>

</html>
