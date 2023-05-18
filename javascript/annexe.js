$(document).ready(function(){

    $('#printdeclaration').hide();
    $('#printsalaysay').hide();
    $('#printboth').hide();

    
    $('#viewdeclarationbtn').on('click',function(){


      $('#viewdeclaration').modal('show')
   
    })
    
    $('#viewsalaysaybtn').on('click',function(){

      $('#viewsalaysay').modal('show')

    })

    $('#viewbothbtn').on('click',function(){

      console.log('nyes')
      $('#viewboth').modal('show')

    })

    

    

    $('body').click(function(){
      $('#printdeclaration').hide();
      $('#printsalaysay').hide();
      $('#printboth').hide();

       
      // $('#salaysaybtn').hide();
      // $('#declarationbtn').hide();
      // $('#salaysayshow').css("border", "0px solid black");

      // $('#scholarshow').css("border", "0px solid black");
      
    })

    
    // $('#salaysaybtn').hide();
    // $('#declarationbtn').hide();

    


    // $('#printdeclaration').hide();


    // $(".bordered").css("border", "1px solid black");



    $('#declarationbtn').on('click',function(){
      var counts = 1;
      var declaration = $('#declaration_count').val()
      while(counts < declaration){
      $('#printdeclaration').append(`<img src="../img/layout1.png" class="my-3" alt=""> <br>; `)
      counts++;
      }
      $('#printdeclaration').show();
      window.print();
        window.location.href = "annex_e.php";

  
    //   $.ajax({
    //   url: "printcount.php",
    //   method: "post",
    //   data: {
    //     declaration_count: $('#declaration_count').val(),
    //   },
    //   success: function (res) {
    //     $('#printdeclaration').show();
    //     window.print();
    //     $('#printdeclaration').hide();
    //     window.location.href = "annex_e.php";


    //   }
    // })
  })
    $('#salaysaybtn').on('click',function(){
        // $('#printsalaysay').show();
        //   window.print();

          var counts = 1;
          var salaysay = $('#salaysay_count').val()
          while(counts < salaysay){
          $('#printsalaysay').append(`<img src="../img/layout1.png" class="my-3" alt=""> <br>; `)
          counts++;
          }
          $('#printsalaysay').show();
          window.print();
            window.location.href = "annex_e.php";
        })


        $('#printbothbtn').on('click',function(){
          // $('#printsalaysay').show();
          //   window.print();
  
          console.log('wews')
            var counts = 1;
            var both = $('#printboth_count').val()
            while(counts < both){
            $('#printboth').append(`<img src="../img/layout1.png" class="my-3" alt=""> <br>
            <img src="../img/layout2.png" alt=""> `)
            counts++;
            }
            $('#printboth').show();
            window.print();
              window.location.href = "annex_e.php";
          })
  

        
    
    
  })