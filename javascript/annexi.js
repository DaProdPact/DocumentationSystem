$(document).ready(function(){


    $('#printcommitment').hide();
    // $('#commitmentbtn').hide();
    
    $('body').on('click',function(){

      $('#printcommitment').hide();



      
    })

    $('#viewannexibtn').on('click',function(){


      console.log('a')
      $('#viewannexi').modal('show')
   
    })
    $('#annexibtn').on('click',function(){
      // $('#printsalaysay').show();
      //   window.print();

        var counts = 1;
        var annexi = $('#annexicount').val()
        console.log(annexi)
        while(counts < annexi){
        $('#printcommitment').append(`<img src="../img/layout3.png" alt=""> `)
        counts++;
        }
        $('#printcommitment').show();
        window.print();
          window.location.href = "annex_i.php";
      })
  })