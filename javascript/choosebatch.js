$(document).ready(function(){





    $('.chooses').on('click',function(){

        var batch = $(this).attr('id');
        
        console.log(batch);
  
    
        $.ajax({
          url: "./batchsession.php",
          method: "post",
          data: {
            batch: batch,
          },
          success: function (res) {
              window.location.href = "trainees.php";
          },
        });
    
    })

    $('#dropdown_logout').on('click',function(){
      console.log('wiw')
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