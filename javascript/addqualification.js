$(document).ready(function () {

  var requestname = $('.requestname').attr('id')
console.log(requestname)
var requestprofile = $('.requestprofile').attr('id')
console.log(requestprofile)
var requestid = $('.requestid').attr('id')
console.log(requestid)


    $('#addqualibtn').on('click',function(){
    
        $('#addbatchmodal').modal('show');
    })
    $('#added').on('click',function(){
    
    
        var qualification_added = $('#qualification_added').val();
        var qualification_text = $("#qualification_added  option:selected").text();
        var nttcno = $('#nttcno').val();
        var validity = $('#validity').val();

        var qc = $('#qcode').val();          
        // var getname = $('.getqualificationname').attr('id');
    
    
        console.log(qualification_added)
        console.log(qualification_text)
        console.log(validity)

        console.log(nttcno)

        $.ajax({
            url:"addingqualification.php",
            method:"post",
            data:{
              qualification_added:qualification_added,
              nttcno:nttcno,
              qualification_text:qualification_text,
              validity:validity,
              requestname:requestname,
              requestprofile:requestprofile,
              requestid:requestid,
     
            },
            success:function(response){
                console.log(response)
                $('#addbatchmodal').modal('hide');
                $('#successAddedModal').modal('show');
                setTimeout(
                  function() 
                  {
                    window.location.href ='http://localhost/DocumentationSystem/php/addqualification.php'
    
                  }, 1000);
            }
        })
    })
    
          qualification(1);
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
        console.log('wows')
        $('#expiredModal').modal('show')
        let expired = 'expired'
        $.ajax({ 
          url: "addqualificationconnection.php",
          method: "GET",
          data:{
            expired:expired,
          },
          success: function (res) {
            console.log(res);
            if(res == 2){
                  
            $("#table_modal_body").html(`<tr class="table-active">
            <td colspan="6" class="text-center"> No Record Found </td>
            </tr>`);
         
            }
            else{
            let courses = JSON.parse(res);

            let rows = "";
            for (course of courses) {
            var vdate = my_date_format(course.validity_date)
   
              rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
            
                  <td>${course.qualification_title}</td>
                  <td>${course.trainer_list_nttcno}</td>
                  <td>${vdate}</td>
                  <td class="text-danger">Finished</td>
   
              </tr>`;
   
             

            }
            $("#table_modal_body").html(rows);
         
         
       
       
         
         }   
         
         
         
          },
         });
      })
      
      function qualification(page) {
      $.ajax({ 
       url: "addqualificationconnection.php?page=" + page,
       method: "GET",
       success: function (res) {
         console.log(res);
         if(res == 2){
               
         $("#table_body").html(`<tr class="table-active">
         <td colspan="6" class="text-center"> No Record Found </td>
         </tr>`);
      
         }
         else{
         let courses = JSON.parse(res);
      

         
      
         let rows = "";
         for (course of courses) {
         var vdate = my_date_format(course.validity_date)

          var a = course.verification;
          

          if(course.verification == 1){

          

           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
         
               <td>${course.qualification_title}</td>
               <td>${course.trainer_list_nttcno}</td>
               <td>${vdate}</td>
               <td class="text-success">Approved</td>

               


           </tr>`;

          }
          else{
            
           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">

           <td>${course.qualification_title}</td>
           <td>${course.trainer_list_nttcno}</td>
           <td>${vdate}</td>
           <td class="text-warning">Pending</td>


          
       </tr>`;
          }
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
      $('#dropdown_logout').on('click',function(){
        console.log('wiw')
        $('#logoutModal').modal('show');
      })
      
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