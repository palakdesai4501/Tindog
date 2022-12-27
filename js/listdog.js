function readURL(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
         $(".file-upload-wrapper").css("display", "none");
         $(".card").css("display", "none");
         $(".card-body").css("display", "none");
         $("input[type=file]").css("display", "none");
         $(".uploaded_image_LD").css("display", "block");
         $('#file_preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
   }
}

$("#fileInput").change(function () {
   readURL(this);
});

function remove_image_click() {
   $("#fileInput").val('');
   $(".uploaded_image_LD").css("display", "none");
   $(".file-upload-wrapper").css("display", "block");
   $(".card").css("display", "block");
   $(".card-body").css("display", "block");
   $("input[type=file]").css("display", "block");
}

function submit_data_LD_click() {

   var breed = $("#breedInput").val();
   var height = $("#heightInput").val();
   var weight = $("#weightInput").val();
   var behaviour = $("#behaviourInput").val();
   var age = $("#ageInput").val();
   var color = $("#colorInput").val();
   var file = $("#fileInput").get(0).files[0];

   if (breed.length == 0 || height.length == 0 || weight.length == 0 || behaviour.length == 0 || age.length == 0 || color.length == 0) {
      alert("All fields are mandatory!");
      return;
   } else if (!$("#fileInput").val()) {
      alert("All fields are mandatory including image!");
   } else {
      var file_name = file.name;
      var file_extension = file_name.split('.').pop().toLowerCase();
      var file_size = file.size;
      if (jQuery.inArray(file_extension, ['jpeg', 'jpg', 'png']) == -1) {
         alert("Only jpeg, jpg, png images allowed!");
      } else if (file_size > 5000000) {
         alert("Too big image (MAX-LIMIT = 5mb)!");
      } else {
         var form_data = new FormData();
         form_data.append('file', file);
         form_data.append('breed', breed);
         form_data.append('height', height);
         form_data.append('weight', weight);
         form_data.append('behaviour', behaviour);
         form_data.append('age', age);
         form_data.append('color', color);

         $.ajax({
            method: 'POST',
            url: 'classes/listdogdata.php',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
               $("#status_LD").html("Submitting...Please wait!");
            },
            complete: function () {
               $("#status_LD").html("");
            },
            success: function (html) {
               if (html.trim() == "true") {
                  alert("Your dog listed successfully!");
                  $("#breedInput").val('');
                  $("#heightInput").val('');
                  $("#weightInput").val('');
                  $("#behaviourInput").val('');
                  $("#ageInput").val('');
                  $("#colorInput").val('');
                  $("#fileInput").val('');
                  remove_image_click();
               } else {
                  alert(html);
               }
            }
         });

      }
   }

}
