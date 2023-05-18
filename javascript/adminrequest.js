$(document).ready(function () {






    request(1);
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
      
      function request(page) {
      $.ajax({ 
       url: "adminverificationrequestconnection.php?page=" + page,
       method: "GET",
       success: function (res) {
         console.log(res);
         if(res == 2){
               
         $("#table_body").html(`<tr class="table-active">
         <td colspan="6" class="text-center"> No Record Found </td>
         </tr>`);
      
         }
         else{
         let requests = JSON.parse(res);
      
      
         let rows = "";
         for (request of requests){
          var validity_date = my_date_format(request.validity_date);
      
           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
               <td >${request.trainer_firstname} ${request.trainer_middlename} ${request.trainer_lastname} ${request.trainer_extensionname}</td>
               <td>${request.qualification_title}</td>
               <td>${request.trainer_list_nttcno}</td>  
               <td>${validity_date}</td>  

               <td> 
               <i  style="font-size:18px;" value="view" class="fas fa-laptop-medical text-success p-0 pe-1 view_data" name="view" id="${request.tl_id} "></i>
               <i  style="font-size:18px;" value="view" class="fas fa-ban text-danger p-0 delete_data" name="view" id="${request.tl_id} "></i>
                     </td>
           </tr>`;
         }
         $("#table_body").html(rows);


         $('.view_data').on('click',function(){
          var viewid = $(this).attr('id')
          console.log(viewid)
          $('#dataModal').modal('show')

          let view = 'view';
          $.ajax({
            url:'adminrequestaction.php',
            method:'post',
            data:{
              view:view,
              viewid:viewid,
            },
            success:function(response){
              console.log(response)

              let views = JSON.parse(response);
      
      
              let rows = "";
              for (view of views){

              var view_date = my_date_format(view.validity_date);
  
                rows += `
                <div
                class="modal-header py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <span
              class="text-white float-start fw-bold"
              style="font-size: 15px"
              ><img src="../img/TESDA-Logo.png" width="30px" alt="" />
              Regional Training Center Central Luzon</span
            >
     
  
              </div>
              
              <div class="modal-body" id="data_detail" style="background-color: rgb(149 153 177 / 75%);">
              <div class="row">
              <div class="col-1">
                   <img
                      src="../php/profilepicture/${view.trainer_profile}"
                      class="ms-4 p-2  rounded-circle"
                      width="60"
                      height="60"
                      style="background-color: rgb(149 153 177 / 75%);"
                    />
              </div>
              
              <div class="col-7 ms-5">
                  <h5 class="pt-2 ps-2"> ${view.trainer_firstname} ${view.trainer_middlename} ${view.trainer_lastname} ${view.trainer_extensionname}</h5>
                  <p class="ps-2"style="font-size:13px; margin-top:-12px;">${view.trainer_email_address} </p>
  
              </div>
              </div>
              <input type="hidden" class="trid" id="${view.trainer_qualification_list}">
              <input type="hidden" class="qualid" id="${view.selected_qualification}">

              <div class="col-12 border border-5 border-primary mt-3 border-opacity-75 me-2 ">
                  <p class="text-center myf-custome6-font text-primary">Request Qualification</p>
                 
                  <p class="ms-3 fw-bold mt-0" style="font-size: 13px; letter-spacing:.1em; color:#0b253e;">
                    Qualification : ${view.qualification_title}
                  </p>
                  <p class="ms-3 fw-bold mt-0" style="font-size: 13px; letter-spacing:.1em; color:#0b253e;">
                    Nttc No. : ${view.trainer_list_nttcno}
                  </p>

                  <p class="ms-3 fw-bold mt-0" style="font-size: 13px; letter-spacing:.1em; color:#0b253e;">
                  Validity Date: ${view_date}
                </p>
               
                 
                  
                </div>
                </div>
  
                
                
                
               
                
              
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary get_detail" name="get_details" id="${view.tl_id}">Accept Trainer</button>
              </div>
              
              `

           

              }

              $('#data_detail').html(rows)

              $('.get_detail').on('click',function(){
                var qualid = $('.qualid').attr('id')
                var trid = $('.trid').attr('id')

                var getd = $(this).attr('id')
                console.log(getd)
                console.log(qualid)
                console.log(trid)
                let gets = 'gets'
                $.ajax({
                  url:'adminrequestaction.php',
                  method:'post',
                  data:{
                    gets:gets,
                    getd:getd,
                    qualid:qualid,
                    trid:trid,
                  },
                  success:function(response){
                    if(response == 1){
                      window.location.href ='http://localhost/DocumentationSystem/admin/adminverificationrequest.php'

                    }
                    else{
                      console.log(response)
                    }


                  }
                })
              })

            }
          })

         })
      
    
    
      
      }   
      
      
      
       },
      });
      }
      function pagination() {
         $.ajax({
             url: 'adminverificationrequestcount.php',
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
               request(lastPage);
      
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
              
               request(lastPage);
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
               request(pagehigh+1);
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
               request(pagelow-5);
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
             request(page);
             $(this).addClass('active').siblings().removeClass('active');
         }
      });
     
        $('#dropdown_logout').on('click',function(){
        console.log('wiw')
        $('#logoutModal').modal('show');
      })
      
      $('#logouts').on('click',function(){
  
          window.location.href ='http://localhost/DocumentationSystem/index.php'

      })

      
      
      })