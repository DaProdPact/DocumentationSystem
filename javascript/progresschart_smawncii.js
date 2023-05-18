$(document).ready(function(){
    $('#printcertsmawncii_basic').hide();
    $('#printcertsmawncii_common').hide();
    $('#printcertsmawncii_core').hide();
    $('#printcertsmawncii_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertsmawncii_basic').hide();
    $('#printcertsmawncii_common').hide();
  $('#printcertsmawncii_core').hide();
  $('#printcertsmawncii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertsmawncii_progresschart').show();
    $('#printcertsmawncii_common').hide();
  $('#printcertsmawncii_core').hide();
  $('#printcertsmawncii_basic').hide();


    window.print();

    console.log('wow')

  })
})