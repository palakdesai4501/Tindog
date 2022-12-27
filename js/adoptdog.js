function card_click(e) {

   var card_id = $(e).attr("id");

   $.ajax({
      method: "POST",
      url: "classes/cardid.php",
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
   }).done (function (html) {
      $("#moreInfo").html(html);
         show_dog_detail_click();
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

function show_owner_detail_click() {
   $(".about_dog_AD").css("display", "none");
   $(".about_owner_AD").css("display", "block");
}

function show_dog_detail_click() {
   $(".about_dog_AD").css("display", "block");
   $(".about_owner_AD").css("display", "none");
}
