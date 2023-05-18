$(document).ready(function(){
    $('#printcertemncii_basic').hide();
    $('#printcertemncii_common').hide();
    $('#printcertemncii_core').hide();
    $('#printcertemncii_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertemncii_basic').hide();
    $('#printcertemncii_common').hide();
  $('#printcertemncii_core').hide();
  $('#printcertemncii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertemncii_progresschart').show();
    $('#printcertemncii_common').show();
  $('#printcertemncii_core').hide();
  $('#printcertemncii_basic').hide();


    window.print();

    console.log('wow')

  })
})