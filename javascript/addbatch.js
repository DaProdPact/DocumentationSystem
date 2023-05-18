$(document).ready(function () {

$('#addbatchbtn').on('click',function(){

    $('#addbatchmodal').modal('show');
})

$('#archieve').on('click',function(){
  $('#expiredModal').modal('show')
  // table_modal_body
})
$('#added').on('click',function(){


    var batchname = $('#batchname').val();
    var year = $('#year').val();
    var vdate = $('#vdate').val();

    // var date_format = vdate;

    // console.log(date_format.getMonth()+'-'+ date_format.getDate()+'-'+date_format.getFullYear());

                
    var getname = $('.getqualificationname').attr('id');


    console.log(getname)
    console.log(vdate)
    console.log(batchname)
    console.log(year)


    
    $.ajax({
        url:"addingbatch.php",
        method:"post",
        data:{
            batchname:batchname,
            year:year,
            getname:getname,
        },
        success:function(response){
            console.log(response)
            $('#addbatchmodal').modal('hide');


            $('#successdeleteModal').modal('show');
            setTimeout(
              function() 
              {
                window.location.href ='addbatch.php'
  
              }, 1000);
  

        }
    })
})

      batch(1);
      pagination();
  
      let lastPage = 1;
      let pageNum;
      let student_count;
  
  
      let pagehigh;
      let pagelow;
        
  
      let pagedivlast = 5;
      let pagedivfirst = 1;
  
      var firstname = '';
  
  var my_date_format = function(input){
  var d = new Date(Date.parse(input.replace(/-/g, "/")));
  var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  var date = month[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
  var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
  return (date);  
             }
  

    $('#archieve').on('click',function(){
    $('#expiredModal').modal('show')
    let expired = 'expired'
    $.ajax({ 
      url: "addbatchconnection.php",
      method: "GET",
      data:{
        expired:expired,
      },
      success: function (res) {
        console.log(res);
        if(res == 2){
              
        $("#table_body").html(`<tr class="table-active">
        <td colspan="6" class="text-center"> No Record Found </td>
        </tr>`);
     
        }
        else{
        let batchs = JSON.parse(res);
     
     
        let rows = "";
        for (batch of batchs) {
         var datestart = my_date_format(batch.date_start);
         var dateend = my_date_format(batch.date_end);
   
         rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
         <td>${batch.qualification_title}</td>
        <td >${batch.batch_name}</td>
               <td>${batch.batch_year}</td> 
               <td>${datestart}</td> 
               <td>${dateend}</td> 
          </tr>`;
        }
        $("#table_modal_body").html(rows);
     
     
   
   
     
     }   
     
     
     
      },
     });

    $("#table_modal_body").html(`<tr class="table-active">
    <td colspan="6" class="text-center"> No Record Found </td>
    </tr>`);
  })










  function batch(page) {
  $.ajax({ 
   url: "addbatchconnection.php?page=" + page,
   method: "GET",
   success: function (res) {
     console.log(res);
     if(res == 2){
           
     $("#table_body").html(`<tr class="table-active">
     <td colspan="6" class="text-center"> No Record Found </td>
     </tr>`);
  
     }
     else{
     let batchs = JSON.parse(res);
  
  
     let rows = "";
     for (batch of batchs) {
      var datestart = my_date_format(batch.date_start);
      var dateend = my_date_format(batch.date_end);
  
      //  rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
      //       <td>${batch.qualification_title}</td>
      //      <td >${batch.batch_name}</td>
      //      <td>${batch.batch_year}</td>`
      //      if(batch.batch_validation == '0'){
      //       rows += `<td class="text-warning">Pending</td>`
      //      }
      //      else if(batch.batch_validation == '1'){
      //       rows += `<td class="text-success">Approve</td>`
      //      }
      //      rows += `

      rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
      <td>${batch.qualification_title}</td>
     <td >${batch.batch_name}</td>
            <td>${batch.batch_year}</td> 
            <td>${datestart}</td> 
            <td>${dateend}</td> 

       </tr>`;
     }
     $("#table_body").html(rows);
  
  


  
  }   
  
  
  
   },
  });
  }
  function pagination() {
     $.ajax({
         url: 'addbatchcount.php',
         method: 'GET',
         success: function (result) {
             pageNum = result / 10;
             pageNum = Math.ceil(pageNum);
             student_count = result;
  
             pagelow = Math.min(pageNum,pagedivfirst);
             pagehigh = Math.min(pageNum,pagedivlast);
  
  
             let pages = "";
  
             for (let i = pagelow; i <= pagehigh; i++) {
                 pages += `<li class="page-item " id="page-${i}"> <a class="page-link" href="#">${i}</a></li>`;
                 console.log(pagehigh);
                 console.log(pagelow);
                 
             }
             
             
             if(pagehigh == pageNum) {
                 $('#nextPage').hide()
  
             }
              if (pagehigh != pageNum){
                 $('#nextPage').show()
                
             }
              if (pagelow == 1){
                 $('#prevPage').hide()
                 
              }
              if (pagelow != 1){
                 $('#prevPage').show()
                 
                 
             }
             $('.page-list').first().next().after(pages);
         }
  
     
     })
  
  }
  
  
  
  $('ul').on('click', 'li', function (e) {
     let page = $(this).text().trim();
  
     if (page == 'Previous'){
         lastPage--;
  
         if (lastPage >= 1){
           batch(lastPage);
  
             if (pagelow > lastPage) {
                 pagedivlast-=5;
                 pagedivfirst-=5;
  
  
               for (let p = pagelow; p <= pagehigh; p++) {
                 $("#page-"+p).hide();
               }
  
               pagination(pagedivfirst,pagedivlast);
  
             }
         }
  
         else {
             lastPage++;
         }
  
         $('.page-item').removeClass('active');
         $('#page-'+lastPage).addClass('active');
     }
  
     else if (page == 'Next'){
  
         lastPage++;
         
         if (lastPage <= pageNum){
          
           batch(lastPage);
             $('.page-item').removeClass('active');
  
             if (pagehigh < lastPage) {
               pagedivlast+=5;
               pagedivfirst+=5;
  
               for (let n = pagelow; n <= pagehigh; n++) {
                     $("#page-"+n).hide();
                   }
                pagination(pagedivfirst,pagedivlast);
                 }
         }
  
         else {
             lastPage--;
  
         }
  
         $('.page-item').removeClass('active');
         $('#page-'+lastPage).addClass('active');
     }
     else if (page == '>'){
       lastPage++;
       pagedivfirst += 5;
       pagedivlast += 5;
  
         for (let x = pagelow; x <= pagehigh; x++) {
           $("#page-"+x).hide();
         }
         if (lastPage <= pageNum){
           batch(pagehigh+1);
             pagination(pagedivfirst,pagedivlast);
  
           }
         else {
           lastPage--;
         }
         $('.page-item').removeClass('active');
           $('#page-'+lastPage).addClass('active');
  
     }
     else if (page == '<'){
       lastPage--;
       pagedivfirst -= 5;
       pagedivlast -= 5;
  
         for (let y = pagelow; y <= pagehigh; y++) {
           $("#page-"+y).hide();
         }
         if (lastPage <= pageNum){
           batch(pagelow-5);
             pagination(pagedivfirst,pagedivlast);
  
  
           }
         else {
           lastPage--;
         }
         $('.page-item').removeClass('active');
         $('#page-'+lastPage).addClass('active');
           //$('#page-'+lastPage).addClass('active').siblings().removeClass('active');
  
     }
  
     else {
         lastPage = page;
         batch(page);
         $(this).addClass('active').siblings().removeClass('active');
     }
  });
  $('#logouts').on('click',function(){
    $.ajax({
        url: "logout.php",
        success: function(data){
          if(data == 1){
               window.location.href ='http://localhost/DocumentationSystem/index.php'
          }
        }
      })
  })
  
  
  })