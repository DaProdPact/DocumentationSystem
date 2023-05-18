$(document).ready(function(){
    $('#printcertsmawnci_basic').hide();
    $('#printcertsmawnci_common').hide();
    $('#printcertsmawnci_core').hide();
    $('#printcertsmawnci_progresschart').hide();

    


    
    
  $('body').click(function(){
    $('#printcertsmawnci_basic').hide();
    $('#printcertsmawnci_common').hide();
  $('#printcertsmawnci_core').hide();

  $('#printcertsmawnci_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertsmawnci_progresschart').show();
    $('#printcertsmawnci_common').hide();
  $('#printcertsmawnci_core').hide();

  $('#printcertsmawnci_basic').hide();


    window.print();

    console.log('wow')

  })
})