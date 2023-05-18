$(document).ready(function(){
    $('#printcertoapncii_basic').hide();
    $('#printcertoapncii_common').hide();
    $('#printcertoapncii_core').hide();
    $('#printcertoapncii_elective').hide();

    $('#printcertoapncii_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertoapncii_basic').hide();
    $('#printcertoapncii_common').hide();
  $('#printcertoapncii_core').hide();
      $('#printcertoapncii_elective').hide();

  $('#printcertoapncii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertoapncii_progresschart').show();
    $('#printcertoapncii_common').hide();
  $('#printcertoapncii_core').hide();
      $('#printcertoapncii_elective').hide();

  $('#printcertoapncii_basic').hide();


    window.print();

    console.log('wow')

  })
})