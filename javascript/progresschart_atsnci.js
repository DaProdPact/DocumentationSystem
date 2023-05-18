$(document).ready(function(){
    $('#printcertatsnci_basic').hide();
    $('#printcertatsnci_common').hide();
    $('#printcertatsnci_core').hide();
    $('#printcertatsnci_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertatsnci_basic').hide();
    $('#printcertatsnci_common').hide();
  $('#printcertatsnci_core').hide();
  $('#printcertatsnci_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertatsnci_progresschart').show();
    $('#printcertatsnci_common').hide();
  $('#printcertatsnci_core').hide();
  $('#printcertatsnci_basic').hide();


    window.print();

    console.log('wow')

  })
})