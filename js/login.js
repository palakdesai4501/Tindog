(function (a) {
   (jQuery.browser = jQuery.browser || {}).mobile = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))
})(navigator.userAgent || navigator.vendor || window.opera);

if (jQuery.browser.mobile == true && $(window).width() <= 500) {} else {
   var x = Math.floor((Math.random() * 15) + 1);
   console.log(x);
   $('#imageRandom').attr("src", "resources/" + x + ".png");
}


//------------box change-------------

$("#redirect_to_signup").click(function () {
   $("#signup_box_SI").removeClass("hidden");
   $("#signin_box_SI").addClass("hidden");
});

$("#redirect_to_signin").click(function () {
   $("#signin_box_SI").removeClass("hidden");
   $("#signup_box_SI").addClass("hidden");
});

//-----------for signup-------------

function signup_btn_click() {

   var firstname = $("#firstname_SU").val();
   var lastname = $("#lastname_SU").val();
   var email = $("#email_SU").val();
   var phone = $("#phone_SU").val();
   var password = $("#password_SU").val();
   var confPassword = $("#confpassword_SU").val();
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

   if (firstname.length == 0 || lastname.length == 0 || email.length == 0 || phone.length == 0 || password.length == 0 || confPassword.length == 0) {
      alert("All fields are mandatory!");
   } else if (reg.test(email) == false) {
      alert("Enter valid Email address!");
   } else if (password !== confPassword) {
      alert("Password does not match!");
   } else if (phone.length !== 10) {
      alert("Enter valid Phone no. (i.e 10 digits)");
   } else {

      $.ajax({
         method: "POST",
         url: "classes/signup.php",
         data: {
            firstname: firstname,
            lastname: lastname,
            email: email,
            phone: phone,
            password: password
         },
         cache: false,
         success: function (html) {
            if (html.trim() == "redirect") {
               window.location.href = "index.php";
            } else {
               alert(html);
            }
         }
      });

   }
}

//-----------for signin-------------

function signin_btn_click() {

   var email = $("#email_SI").val();
   var password = $("#password_SI").val();
   var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

   if (email.length == 0 || password.length == 0) {
      alert("All fields are mandatory!");
   } else if (reg.test(email) == false) {
      alert("Enter valid Email address!");
   } else {
      $.ajax({
         method: "POST",
         url: "classes/signin.php",
         data: {
            email: email,
            password: password
         },
         cache: false,
         success: function (html) {
            if (html.trim() == "redirect") {
               window.location.href = "index.php";
            } else {
               alert(html);
            }
         }
      });
   }

}
