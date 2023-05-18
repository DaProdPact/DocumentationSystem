<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="icon" href="../img/adminlogo.png" type="image/x-icon">
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<body>
    <div class="container-main">
        <div class="row1 animation"> 
            
            
            <div class="hrow1">
                <img src="../img/tesdalogo.png" class="img1" width="55px">
            </div>
            <div class="hrow2">
                <p class="ttl"><span>R</span>egional <span>T</span>raining <span>C</span>enter <span>C</span>entral <span>L</span>uzon </p>
            </div>
                <div class="hrow3">
                    

             
            </div>
        </div>
        <div class="row3">
           
                <div class="brow1 animation">
                <img src="../img/TESDA-Logo.png" class="img1" width="650px">

                    
                </div>
                <div class="brow2 animation">
                    <p class="login"> ADMIN LOGIN</p>
     
                   
                    <div class="form-outline h-15 w-75" style="margin-left:4rem;" >
                        <input type="text" id="typeEmail" class="form-control"  />
                        <label class="form-label" for="form12">Email Address</label>
                      </div>
                      <div class="form-outline h-15 w-75 mt-3" style="margin-left:4rem;"> 
                        <input type="password" id="typePassword" class="form-control "  />
                        <label class="form-label" for="typePassword">Password</label>
                      </div>

                    <!-- Showing Password Checkbox -->
                    <input class="cb" type="checkbox">Show Password <br>
                    <button class="li">LOG-IN</button>
                </div>
                <div class="brow3"></div>

        </div>
        <div class="row4"><p class="r4">Created by <span>Student of Bulacan State University-Meneses Campus</span></p></div>
    </div>


    <div class="mb-2 position-absolute position-fixed end-0 bottom-0 me-1">
        <div class="toast success">
          <div class="toast-header bg-danger bg-opacity-75">
          <strong class="me-auto text-danger text-danger-75"><i class="fas fa-key"></i>Login Details</strong>
          <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body bg-danger bg-opacity-50">
          <p class="text-white">Invalid Credentials</p>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   
   <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>


   <script>

document.querySelectorAll('.form-outline').forEach((formOutline) => {
new mdb.Input(formOutline).init();
})

$(document).ready(function(){
    console.log('wow')


    var type = $("#typePassword");


    $('.cb').click(function(){


      if (type.prop("type") == "password") {
        type.attr("type", "text");

      } else {
        type.attr("type", "password");

      }
    })

    $('.li').on('click',function(){
        var email = $('#typeEmail').val();
        var pass = $("#typePassword").val();
        console.log(email)

        if(email == 'admin' && pass == 'adminpass'){
            window.location.href ='http://localhost/DocumentationSystem/admin/admindashboard.php'
        }
        else{

            $('.success').toast('show');
    
        }
    })

 

})




//       function myFunction() {
//   var x = document.getElementById("typePassword");
 
//   if (x.type === "password") {
//       x.type = "text";
//     } 
//   else {
//       x.type = "password";
//     }
// }

    </script>
    
</body>
</html>