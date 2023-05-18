$(document).ready(function(){
    $('#printcertgtawncii_basic').hide();
    $('#printcertgtawncii_common').hide();
    $('#printcertgtawncii_core').hide();
    $('#printcertgtawncii_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertgtawncii_basic').hide();
    $('#printcertgtawncii_common').hide();
  $('#printcertgtawncii_core').hide();
  $('#printcertgtawncii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertgtawncii_progresschart').show();
    $('#printcertgtawncii_common').show();
  $('#printcertgtawncii_core').hide();
  $('#printcertgtawncii_basic').hide();


    window.print();

    console.log('wow')

  })
})