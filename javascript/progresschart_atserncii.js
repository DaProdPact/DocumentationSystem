$(document).ready(function(){
    $('#printcertatserncii_basic').hide();
    $('#printcertatserncii_common').hide();
    $('#printcertatserncii_core').hide();
    $('#printcertatserncii_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertatserncii_basic').hide();
    $('#printcertatserncii_common').hide();
  $('#printcertatserncii_core').hide();
  $('#printcertatserncii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertatserncii_progresschart').show();
    $('#printcertatserncii_common').hide();
  $('#printcertatserncii_core').hide();
  $('#printcertatserncii_basic').hide();


    window.print();

    console.log('wow')

  })
})