$(document).ready(function(){
    $('#printcertdrmncii_basic').hide();
    $('#printcertdrmncii_common').hide();
    $('#printcertdrmncii_core').hide();
    $('#printcertdrmncii_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertdrmncii_basic').hide();
    $('#printcertdrmncii_common').hide();
  $('#printcertdrmncii_core').hide();
  $('#printcertdrmncii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertdrmncii_progresschart').show();
    $('#printcertdrmncii_common').hide();
  $('#printcertdrmncii_core').hide();
  $('#printcertdrmncii_basic').hide();


    window.print();

    console.log('wow')

  })
})