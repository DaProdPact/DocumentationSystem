$(document).ready(function(){
    $('#printcertracncii_basic').hide();
    $('#printcertracncii_common').hide();
    $('#printcertracncii_core').hide();
    $('#printcertracncii_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertracncii_basic').hide();
    $('#printcertracncii_common').hide();
  $('#printcertracncii_core').hide();
  $('#printcertracncii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertracncii_progresschart').show();
    $('#printcertracncii_common').hide();
  $('#printcertracncii_core').hide();
  $('#printcertracncii_basic').hide();


    window.print();

    console.log('wow')

  })
})