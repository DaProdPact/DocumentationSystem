<?php 



require('../link/header.html');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .checkmark{
      background-color:red;
      height:90px;
    }
  </style>
</head>
<body>
  <div class="row">

  <?php 
  $core1= 0;
  $core2 = 0;
  $core3 = 0;

  ?>


<div class="d-flex">
<?php
  if($core1 == 1) {?>
  <input type="checkbox" class="myCheckbox1" checked > 
  <span class="checkmark"></span>
 <?php } 
 else { ?>
  <input type="checkbox" class="myCheckbox1"> CORE 1

<?php } ?>


 </div>
<div class="d-flex">
<?php

if($core2 == 1) {?>

  <input type="checkbox" class="myCheckbox2" checked > CORE 2
 <?php } 
 else { ?>
  <input type="checkbox" class="myCheckbox2" > CORE 2

<?php } ?>
</div>

<div class="d-flex">
<?php

if($core3 == 1) {?>
  <input type="checkbox" class="myCheckbox3" checked > CORE 3
 <?php } 
 else { ?>
  <input type="checkbox"  class="myCheckbox3" > CORE 3

<?php } ?>
 </div>
  <div class="btn btn-primary" id="game">
    wow
  </div>



  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function(){

    var game = '';
    $('#game').on('click',function(){
      var isChecked = $('.myCheckbox1').is(':checked'); // returns true or false

 
      if(isChecked == true){
        game = '1'
      }
      else{
        game = '0'
      }

      console.log(game)

    })
  })
</script>
</html>