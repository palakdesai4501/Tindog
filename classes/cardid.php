<?php

function callThis($temp) {

   $obj = new dbconnection();

   $more = $obj->get_dog_details( intval($temp) );

   echo '
<div class="detail_view_cover">
   <div class="detail_view_AD">
      <div class="sub_detail_container_AD">
         <i class="fa fa-times close" onclick="close_details()"></i>
         <div class="detail_left_AD">
            <img src="database/' . $more['image_url'] .'.png">
         </div>
         <div class="detail_right_AD">

            <div class="about_dog_AD">
               <div class="lines">
                  <h5>Breed :</h5>
                  <p>'. $more['breed'] .'</p>
               </div>

               <div class="lines">
                  <h5>Height :</h5>
                  <p>'. $more['height'] .'</p>
               </div>

               <div class="lines">
                  <h5>Weight :</h5>
                  <p>'. $more['weight'] .'</p>
               </div>

               <div class="lines">
                  <h5>Behaviour :</h5>
                  <p>'. $more['behaviour'] .'</p>
               </div>

               <div class="lines">
                  <h5>Age :</h5>
                  <p>'. $more['age'] . ' years</p>
               </div>

               <div class="lines">
                  <h5>Color :</h5>
                  <p>'. $more['color'] .'</p>
               </div>

               <button class="swap_detail_AD" id="dogToOwnerSwap" onclick="show_owner_detail_click()">Show owner\'s details</button>
            </div>

            <div class="about_owner_AD">

               <div class="lines">
                  <h5>Name :</h5>
                  <p>'. $more['firstname'] . ' ' . $more['lastname'] .'</p>
               </div>

               <div class="lines">
                  <h5>Email :</h5>
                  <p>'. $more['email'] .'</p>
               </div>

               <div class="lines">
                  <h5>Contact no. :</h5>
                  <p>'. $more['phone'] .'</p>
               </div>

               <button class="swap_detail_AD" id="ownerToDogSwap" onclick="show_dog_detail_click()">Show dog\'s details</button>

            </div>

         </div>
      </div>
   </div>
</div>';
}

if(($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') && $_SERVER['HTTP_X_REQUESTED_WITH']) {

   include 'myAutoLoader.php';

   define( 'ACCESS_RESTRICTED_PASS_6677', TRUE );

   session_start();

   $_SESSION['dog_id'] = $_POST['card_id'];
   callThis(intval($_SESSION['dog_id']));

} else {
   header('location: ../error.php');
}

?>
