$(document).ready(function(){

    // idaidagdag 
    var codesend = '';
    var versend = '';

    var emaildirection = '';

    
    $('#contactus').on('click',function(){
      $('#contactModal').modal('show');

    })
    $('#forgetpass').on('click',function(){
      console.log('hahah')
      $('#enteremailtoforget').modal('show');
    })

    
    $('#send_email').click(function(){
                var email= $('#sending_gmail').val()
                emaildirection = email;
                $.ajax({
                  url:'php/send_code.php',
                  method:'post',
                  data:{
                    email:email
                  },
                  success:function(data){
                    console.log(data);
                    if (data == 4){
                      $('#forgetemailalert').show();
                    }
                    else{
                    $('#sent_con').text("code sent!")   
                    $('#enteremailtoforget').modal('hide');
                    $('#codesending').modal('show');
                    codesend = data;
                    

                    }
                  }
                });
            })

            $('#btn_gmailcode').on('click',function(){
              var codetoreset = codesend;
              var inputcode = $('#send_gmailcode').val();

              if(inputcode == codetoreset){
                $('#codesending').modal('hide');
                $('#modalresetpassword').modal('show');

              }
              
              else{
                $('#wrong_code').show();
              }
            })

            $('#btn_resetpassword').on('click',function(){
              var inputnewpass= $('#send_newpass').val();
              var inputcnewpass= $('#send_cnewpass').val();
              console.log(emaildirection)
              var direction = emaildirection;


              if(inputnewpass != inputcnewpass){
                $('#passwordnotmatch').show();

              }
              
              else{
            $.ajax({
            url: "php/resetpassword.php",
            method: "post",
            data: {
              direction:direction,
              inputnewpass: inputnewpass
            },
            success: function (res) {
              $('#modalresetpassword').modal('hide');
              $('.resetsuccess').toast('show');
              
            },
          });
              }
            })

            
    //end
   
    $('#start').on('click',function(){
      $('#loginModal').modal('show')
     

    })


    

    $('#loginpasstoggle').click(function(){
      var passl = $("#password_login");

      if (passl.prop("type") == "password") {
        passl.attr("type", "text");
        $(this).addClass("fa-eye-slash");
      } else {
        passl.attr("type", "password");
  
        $(this).removeClass("fa-eye-slash");
      }
    })

    $("#passtoggle").click(function () {
    var passr = $("#password_register");

    if (passr.prop("type") == "password") {
      passr.attr("type", "text");
      $(this).addClass("fa-eye-slash");
    } else {
      passr.attr("type", "password");

      $(this).removeClass("fa-eye-slash");
    }
  });
  $("#cpasstoggle").click(function () {
    var repassa = $("#retype-password-register");

    if (repassa.prop("type") == "password") {
      $(this).addClass("fa-eye-slash");
      repassa.attr("type", "text");
    } else {
      repassa.attr("type", "password");
      $(this).removeClass("fa-eye-slash");
    }
  });


  $("#register-forms").on("submit", function (e) {
    e.preventDefault();
 
   
    $(".form-control").on("click", function () {
        $("#registerfillupfields").hide();
        $("#registersuccess").hide();
        $("#checkterms").hide();
        $("#doesnotmatchpassword").hide();
        $("#invalidcontact").hide();
        $("#registerinvalidemail").hide();
        $("#registerinvalidemail").hide();
    

        // $('.form-outline').removeClass('invalid');
      });

    var fname_register = $('#fname_register').val()
    var mname_register = $('#mname_register').val()
    var lname_register = $('#lname_register').val()
    var exname_register = $('#exname_register').val()
    var email_register = $('#email_register').val()
    var contact_number_register = $('#contact_number_register').val()
    var password_register = $('#password_register').val()
    var retype_password_register = $('#retype_password_register').val()


    console.log(fname_register);
    console.log(mname_register);
    console.log(lname_register);
    console.log(exname_register);
    console.log(email_register);
    console.log(contact_number_register);
    console.log(password_register);
    console.log(retype_password_register);

    $.ajax({
      url:'php/send_verification_register.php',
      method:'post',
      data:{
        email_register:email_register
      },
      success:function(data){
        console.log(data);
        versend = data;
        // $('#loginModal').modal('hide')

        $('#registerverify').modal('show')

        $('#send_register_verification').on('click',function(){
          var ver_reg = $('#ver_reg').val()
          console.log(ver_reg)
          send_register_verification
          if(ver_reg == versend){
    $.ajax({
      url: "./php/trainer_registration.php",
      method: "post",
      data:{
        fname_register:fname_register,
        mname_register:mname_register,
        lname_register:lname_register,
        exname_register:exname_register,
        email_register:email_register,
        contact_number_register:contact_number_register,
        password_register:password_register,
        retype_password_register:retype_password_register,
  
  
      },
  
   
  
      success: function (response) {
        console.log(response)
        if (response == 0) {
          $("#registerfillupfields").show();
        }
        if (response == 1) {
          $("#registerinvalidemail").show();
  
        }
        if (response == 2) {
          $("#registerinvalidemail").show();
  
        }
        if (response == 3) {
          $("#invalidcontact").show();
        }
        if (response == 4) {
          $("#doesnotmatchpassword").show();
        }
        if (response == 5) {
          $("#checkterms").show();
  
  
        }
        if (response == 7){
        $('#registerverify').modal('show')

          $("#registersuccess").show();
          $("#checkterms").hide();
          $("#register-forms")[0].reset();
          $('#loginModal').modal('hide')
          $('.success').show();
  
  
  
              
          }
          },
          });
          }
          else{
            console.log('wow')
            $('#incorrectotplalert').show();
          }

        })


        
      }
    });


   
    


        

        })






        $("#login-forms").on("submit", function (e) {
          e.preventDefault();
  
          var user = $("#email_login").val();
          var pass = $("#password_login").val();

          $(".form-control").on("focus", function () {
            $("#loginfillupfields").hide();
            $('#invalidcredentials').hide();
          });
  
          if (user == "" && pass == "") {
            $("#loginfillupfields").show();
          }
          else {
            $.ajax({
              url: "./php/trainer_login.php",
              method: "post",
              data: {
                username: user,
                password: pass,
              },
              success: function (res) {
                console.log(res)
                if (res == 1) {
                  window.location.href = "php/choosecourse.php";
                  console.log('loginsuccess')
                } 
                else if (res == 7){
                  window.location.href = "admin/admindashboard.php";
                }
                else if(res == 2){
                  window.location.href = "php/verification.php";
                }

                else {
                  $("#invalidcredentials").show();
                }
              },
            });
          }
        });


  })












