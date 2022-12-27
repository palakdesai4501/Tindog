<?php
   
session_start();

if(!isset($_SESSION['user_id'])) {
   unset($_SESSION['user_id']);
   header("location: login.html");
   exit();
}

?>

<!DOCTYPE html>

<html>

<head>
   <title>Tindog</title>
   <link type="image/icon" rel="icon" href="resources/logoSVG.svg" />
   <link type="text/css" rel="stylesheet" href="css/index.css" />
   <link type="text/css" rel="stylesheet" href="css/updateaccount.css" />
   <link type="text/css" rel="stylesheet" href="css/fonts.css" />
   <script src="https://kit.fontawesome.com/ffb41c23b7.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
            <a class="page_navigation" id="TrdPage">Your dogs</a>
            <a class="page_navigation active" id="FthPage">Update account</a>
            <div class="btnSignoutBlock">
               <button onclick="signout_click()">Sign out</button>
            </div>
         </div>
      </nav>

      <div class="content_container_IN">
         <div class="main_container_UA">
            <div class="left_container_UA">

               <div class="inline_text_block">
                  <fieldset class="inline_UA">
                     <legend>First Name</legend>
                     <input type="text" id="firstname_UA">
                  </fieldset>
                  <fieldset class="inline_UA">
                     <legend>Last Name</legend>
                     <input type="text" id="lastname_UA">
                  </fieldset>
               </div>
               <fieldset>
                  <legend>Email id</legend>
                  <input type="text" id="email_UA">
               </fieldset>
               <fieldset>
                  <legend>Phone no</legend>
                  <input type="number" id="phone_UA" maxlength="10">
               </fieldset>
               <fieldset>
                  <legend>Password</legend>
                  <input type="password" id="password_UA">
               </fieldset>
               <input type="submit" value="Update" id="update_account_UA" onclick="update_acc_click()">
               <p class="redirection_UA"><button id="delete_Box" onclick="delete_box_click()">Delete Profile</button></p>

            </div>
            <div class="right_container_UA">
               <fieldset>
                  <legend>Enter current password</legend>
                  <input type="password" id="del_acc_pass_UA">
               </fieldset>

               <input type="submit" value="Delete" onclick="delete_profile_click()" id="delete_account_UA">
               <p class="redirection_UA"><button id="update_box" onclick="update_box_click()">Update Profile</button></p>
            </div>
         </div>
      </div>
   </div>

   <!------------------java script------------------->
   <script type="text/javascript" src="js/index.js"></script>
   <script type="text/javascript" src="js/updateaccount.js"></script>
   <script type="text/javascript" src="js/jquery.min.js"></script>

</body></html>
