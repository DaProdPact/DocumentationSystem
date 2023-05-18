$(document).ready(function(){
    $('#printcerteimciii_basic').hide();
    $('#printcerteimciii_common').hide();
    $('#printcerteimciii_core').hide();
    $('#printcertemnciii_progresschart').hide();

    console.log('wows')


    
    
  $('body').click(function(){
    $('#printcerteimciii_basic').hide();
    $('#printcerteimciii_common').hide();
  $('#printcerteimciii_core').hide();
  $('#printcertemnciii_progresschart').hide();



    
  })
$('#print_chart').on('click',function(){
    $('#printcertemnciii_progresschart').show();
    $('#printcerteimciii_common').hide();
  $('#printcerteimciii_core').hide();
  $('#printcertemnciii_basic').hide();


    window.print();

    console.log('wow')

  })
})