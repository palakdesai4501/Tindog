<?php
   
session_start();

if(!isset($_SESSION['user_id'])) {
   header("location: login.html");
   exit();
}

?>

<!DOCTYPE html>

<html>

<head>
   <title>Tindog</title>
   <link type="image/icon" rel="icon" href="resources/logoSVG.svg" />
   <link type="text/css" rel="stylesheet" href="css/listdog.css" />
   <link type="text/css" rel="stylesheet" href="css/index.css" />
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
            <a class="page_navigation active" id="SndPage">List your dog</a>
            <a class="page_navigation" id="TrdPage">Your dogs</a>
            <a class="page_navigation" id="FthPage">Update account</a>
            <div class="btnSignoutBlock">
               <button onclick="signout_click()">Sign out</button>
            </div>
         </div>
      </nav>

      <div class="content_container_IN">
      
   <div class="main_container_LD">
      <div class="fileUpload_LD">
         <div class="file-upload-wrapper">
            <div class="card card-body">
               <div class="file-upload-text">
                  <div class="subFile-upload-text">
                     <i class="fas fa-cloud-upload-alt fileIcon"></i>
                     <p>Upload a picture of dog</p>
                  </div>
               </div>
               <input type="file" id="fileInput" class="file_upload">
            </div>
         </div>

         <div class="uploaded_image_LD">
            <img id="file_preview" src="">
            <i id="removeImage" onclick="remove_image_click()" class="far fa-trash-alt"></i>
         </div>
      </div>
      <div class="detailsInput_LD">

         <input class="form-control" type="text" id="breedInput" placeholder="Enter breed">

         <input class="form-control textMargin" type="text" id="heightInput" placeholder="Enter dog's height">

         <input class="form-control textMargin" type="text" id="weightInput" placeholder="Enter dog's weight">

         <input class="form-control textMargin" type="text" id="behaviourInput" placeholder="Enter behaviour">

         <input class="form-control textMargin" type="number" id="ageInput" placeholder="Enter age in years">

         <input class="form-control textMargin" type="text" id="colorInput" placeholder="Enter dog's color">

         <p id="status_LD"></p>
         
         <button type="button" class="btn btn-outline-primary btn-lg btn-block btnMargin" onclick="submit_data_LD_click()">Submit</button>
      </div>
   </div>
         
         </div>
   </div>
   <!------------------java script------------------->
   <script type="text/javascript" src="js/index.js"></script>
   <script type="text/javascript" src="js/listdog.js"></script>
   <script type="text/javascript" src="js/jquery.min.js"></script>

</body></html>
