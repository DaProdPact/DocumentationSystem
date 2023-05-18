$(document).ready(function(){
  var get = $('#qualification_nttcno').val()

var requestname = $('.requestname').attr('id')
console.log(requestname)
var requestprofile = $('.requestprofile').attr('id')
console.log(requestprofile)
var requestid = $('.requestid').attr('id')
console.log(requestid)



  $('#send').on('click',function(){
   
    // qualification_register
    var qualification_register = $('#qualification_register').val()
    var nttcno = $('#qualification_nttcno').val()

    var vdate = $('#vdate').val()
  
    
    console.log(qualification_register);
    console.log(nttcno);
    console.log(vdate);


  

    $.ajax({
      url: "sendchecker.php",
      method: "post",
      data:{
        qualification_register:qualification_register,
        nttcno:nttcno,
        vdate:vdate,
        requestname:requestname,
        requestprofile:requestprofile,
        requestid:requestid,

      },

  
      success: function (response) {
        if(response == 1){
            window.location.href = "verification.php";
        }
        else{
          console.log('a')

        }




    },
    });
  

  })

  $('#verification_con').on('click',function(){
    console.log('wow')
    
    $.ajax({
      url: "verificationchecker.php",
      method: "post",
      data:{
        get:get,
      },

  
      success: function (response) {

        if(response == 1){
          console.log('lipat')
          window.location.href = "choosecourse.php";

        }
        else if(response == 2){
          $('.qdetails').toast('show');
        }

        // window.location.href = "verification.php";


    },
    });
  
  })

  $('#dropdown_logout').on('click',function(){
    $('#logoutModal').modal('show');
  })
  
  $('#logouts').on('click',function(){
    $.ajax({
        url: "logout.php",
        success: function(data){
          if(data == 1){
               window.location.href ='http://localhost/DocumentationSystem/index.php'
          }
        }
      })
  })




})