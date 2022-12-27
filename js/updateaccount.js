function delete_box_click() {
   $(".left_container_UA").css("display", "none");
   $(".right_container_UA").css("display", "block");
}

function update_box_click() {
   $(".left_container_UA").css("display", "block");
   $(".right_container_UA").css("display", "none");
}

function update_acc_click() {

   var firstname = $("#firstname_UA").val();
   var lastname = $("#lastname_UA").val();
   var email = $("#email_UA").val();
   var phone = $("#phone_UA").val();
   var password = $("#password_UA").val();
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

   if (firstname.length == 0 && lastname.length == 0 && email.length == 0 && phone.length == 0 && password.length == 0) {
      alert("Aleast one field is neccessary!");
      return;
   }
   if (reg.test(email) == false && email.length != 0) {
      alert("Invalid email address!");
      return;
   }
   if (phone.length != 0) {
      if (phone.length != 10) {
         alert("Enter valid Phone no. (i.e 10 digits)");
         return;
      }
   }
   console.log("enter data");
   $.ajax({
      method: "POST",
      url: "classes/updateaccount.php",
      data: {
         firstname: firstname,
         lastname: lastname,
         email: email,
         phone: phone,
         password: password
      },
      cache: false,
      success: function (html) {
         alert(html);
      }
   });
}

function delete_profile_click() {

   var password = $("#del_acc_pass_UA").val();

   $.ajax({
      method: "POST",
      url: "classes/checkpassword.php",
      data: {
         password: password
      },
      cache: false,
      success: function (html) {
         console.log(html.trim());
         if (html.trim() == "match") {
            var conf = confirm("Are you sure you want to delete?");

            if (conf == true) {
               $.ajax({
                  method: "POST",
                  url: "classes/deleteaccount.php",
                  data: {
                     data: html.trim(),
                  },
                  cache: false,
                  success: function (response) {
                     console.log(response.trim());
                     if (response.trim() == "true") {
                        alert("Account successfully deleted!");
                        window.location.href = "login.html";
                     } else {
                        alert(response.trim());
                     }
                  }
               });
            }
         } else {
            alert("Wrong password! Try again");
         }
      }
   });
}
