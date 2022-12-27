function card_click_remove(e) {

   var card_id = $(e).attr("id");

   $.ajax({
      method: "POST",
      url: "classes/removedog.php",
      data: {
         card_id: card_id
      },
      cache: false,
      beforeSend: function () {
         $(".main_container_IN").css({
            "-webkit-filter": "blur(50px)",
            "-moz-filter": "blur(50px)",
            "-o-filter": "blur(50px)",
            "-ms-filter": "blur(50px)",
            "filter": "blur(50px)"
         });
         $(".loading_cover").css("display", "block");
      },
   }).done(function (html) {
      $("#moreInfoRD").html(html);
      $(".loading_cover").css("display", "none");
      $(".detail_view_cover").css("display", "block");
      $(".detail_view_AD").css("display", "block");
   });
}


function close_details() {

   $(".detail_view_cover").css("display", "none");
   $(".detail_view_AD").css("display", "none");
   $(".main_container_IN").css({
      "-webkit-filter": "blur(0)",
      "-moz-filter": "blur(0)",
      "-o-filter": "blur(0)",
      "-ms-filter": "blur(0)",
      "filter": "blur(0)"
   });
};

function delete_dog_click(e) {
   var card_id = $(e).attr("id");

   var conf = confirm("Are you sure you want to delete?");

   if (conf == true) {
      $.ajax({
         method: "POST",
         url: "classes/deletecard.php",
         data: {
            card_id: card_id
         },
         cache: false,
         success: function (response) {
            if(response.trim() == "true") {
               alert('Your dog unlisted successfully!');
               location.reload(true);
            }
         }
      });
   }
}
