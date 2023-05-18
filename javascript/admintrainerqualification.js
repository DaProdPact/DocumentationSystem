$(document).ready(function () {


  $('#backunit').on('click',function(){
    window.history.back();
  })


  $('#addqualification').on('click',function(){
    $('#addModal').modal('show')

  })
  var trainers = $('.trainersid').attr('id')
  console.log(trainers)
  // $('#addqualificationbtn').on('click',function(){
  //   var addqualificationname = $('#addqualificationname').val();
  //   var addqualificationcode = $('#addqualificationcode').val();

  //   console.log(addqualificationname);
  //   console.log(addqualificationcode);

  //   let add = 'add';
  //   $.ajax({
  //     url:'adminqualificationlistaction.php',
  //     method:'post',
  //     data:{
  //       add:add,
  //       addqualificationname:addqualificationname,
  //       addqualificationcode:addqualificationcode,
  //     },
  //     success:function(res){
  //       $('#successAddedModal').modal('show');
  //       setTimeout(
  //         function() 
  //         {
  //           window.location.href ='http://localhost/DocumentationSystem/admin/adminqualificationlist.php'

  //         }, 1000);

  //     }
  //   })

  // })
  

    qualipage(1);
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

      var get_date_format = function(input){
      var d = new Date(Date.parse(input.replace(/-/g, "/")));
      var month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
      var date =  d.getFullYear() + "/" + month[d.getMonth()] +"/" +d.getDate() ;
      return (date);  
                  }
      
      function qualipage(page) {
      let gettrainer = 'gettrainer'
      $.ajax({ 
      
       url: "admintrainerqualificationaction.php?page=" + page,
       method: "GET",
       data:{
          gettrainer:gettrainer,
          trainers:trainers,
       },
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

          var vdate = my_date_format(request.validity_date);
          var verification = request.verification;
          
      
              rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
              <td>${request.qualification_title}</td>
              <td>${request.trainer_list_nttcno}</td>
              <td>${vdate}</td>`
              if(verification == '1'){
                rows += `<td class="text-success">Approve</td>`
              }
              else if(verification == '2'){
                rows += `<td class="text-danger">Finished</td>`

              }
              
              else{
                rows += `<td class="text-warning">Pending</td>`
              }
              rows += `
               <td> 
               <i style="font-size:18px;" value="view" class="fas fa-eye text-success p-0 pe-1 view_data" name="view" id="${request.tl_id} "></i>
               <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 pe-1 edit_data" name="view" id="${request.tl_id} "></i>
               <i style="font-size:18px;" value="view" class="fas fa-trash-alt text-danger p-0 delete_data" name="view" id="${request.tl_id}"></i>
       
                 </td>
           </tr>`
          }

         
         $("#table_body").html(rows);

         $('.view_data').on('click',function(){
          var views = $(this).attr('id')
          console.log(views)
          let view_com = 'view_com'
          $.ajax({
            url:'admintrainerqualificationaction.php',
            method:'post',
            data:{
              view_com:view_com,
              views:views,
            },
            success:function(response){
                window.location.href ='http://localhost/DocumentationSystem/admin/adminbatchlist.php'  
            }
          })
         })


         $('.delete_data').on('click',function(){
          var remove = $(this).attr('id')
          console.log(remove)

          $('#removeModal').modal('show')

          var deletedarea = "";
          deletedarea += `
          <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Delete Trainer Qualification</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Are you sure you want to delete this Trainer Qualification ? </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-danger" data-mdb-dismiss="modal">Close</button>
          <button type="button" id="${remove}"class="btn btn-danger deletequali">Delete</button>
        </div>
      `;
    
        $("#remove_details").html(deletedarea); 

        $('.deletequali').on('click',function(){
          var remove = $(this).attr('id');
          console.log(remove)
          let deletes = 'deletes'  
          $('#removeModal').modal('hide');

          $.ajax({
                url:'admintrainerqualificationaction.php',
                method:'post',
                data:{
                  remove:remove,
                  deletes:deletes,
                },
                success:function(response){
                
                $('#successdeleteModal').modal('show');
                setTimeout(
                  function() 
                  {
                    window.location.href ='http://localhost/DocumentationSystem/admin/admintrainerlistqualification.php'
    
                  }, 1000);
                }
              })

         })
         })

        
         


         $('.edit_data').on('click',function(){
          var editid = $(this).attr('id')
          console.log(editid)
          $('#dataModal').modal('show')

          let edit = 'edit';
          $.ajax({
            url:'admintrainerqualificationaction.php',
            method:'post',
            data:{
              edit:edit,
              editid:editid,
            },
            success:function(response){
              console.log(response)

              let edits = JSON.parse(response);

              let rows = "";
              for (edit of edits){
                var vgetdate = get_date_format(edit.validity_date);
                var verification = edit.verification
                if(verification == '0'){
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
              <div class="modal-body" id="data_detail" style="background-color: rgb(217 217 217 / 75%);">

              <div class="row">
          
             
              <div class="col-12">
              <h3 class="text-center">${edit.trainer_firstname} ${edit.trainer_middlename} ${edit.trainer_lastname} ${edit.trainer_extensionname}
              </h3>
                  
               </div>


               </div>




               <div class="row">
          
               <div class="col-12">
 
                    <div class="mb-3">
                     <input type="text" class="form-control" id="qualification_nttcno" placeholder="Nttcno." value="${edit.trainer_list_nttcno}">
                   </div>
                   
                </div>
 


                </div>



                <div class="row mb-3">
          

                <div class="col-12">
                <input type="text" class="form-control" id="validity_update" placeholder="Validity Date" value="${edit.validity_date}">
                    
                 </div>
  
  
                 </div>


                <div class="row">
          

                <div class="col-12">
  

                <select class="form-select form-select-sm py-2 border-2 border-secondary" id="verify" name="qualification_register">

                <option value="0">Pending</option>
                <option value="1">Approve</option>
                <option value="2">Finished</option>
              </select>
                    
                 </div>
  

                 </div>

               </div>
             
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.tl_id}">Update Trainer Qualification</button>
              </div>
              
              `

              }
              else if(verification == '2'){

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
              <div class="modal-body" id="data_detail" style="background-color: rgb(217 217 217 / 75%);">

              <div class="row">
          
             
              <div class="col-12">
              <h3 class="text-center">${edit.trainer_firstname} ${edit.trainer_middlename} ${edit.trainer_lastname} ${edit.trainer_extensionname}
              </h3>
                  
               </div>


               </div>




               <div class="row">
          
               <div class="col-12">
 
                    <div class="mb-3">
                     <input type="text" class="form-control" id="qualification_nttcno" placeholder="Nttcno." value="${edit.trainer_list_nttcno}">
                   </div>
                   
                </div>
 


                </div>

                <div class="row mb-3">
          

                <div class="col-12">
                <input type="text" class="form-control" id="validity_update" placeholder="Validity Date."  value="${edit.validity_date}">
                    
                 </div>
  
  
                 </div>

                <div class="row">
          

                <div class="col-12">
  

                <select class="form-select form-select-sm py-2 border-2 border-secondary" id="verify" name="qualification_register">
                
                <option value="2">Finished</option>
                <option value="1">Approve</option>
                <option value="0">Pending</option>

        
         
            
              
              </select>
                    
                 </div>
  

                 </div>

               </div>
             
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.tl_id}">Update Trainer Qualification</button>
              </div>
              
              `

              }
              else{

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
              <div class="modal-body" id="data_detail" style="background-color: rgb(217 217 217 / 75%);">

              <div class="row">
          
             
              <div class="col-12">
              <h3 class="text-center">${edit.trainer_firstname} ${edit.trainer_middlename} ${edit.trainer_lastname} ${edit.trainer_extensionname}
              </h3>
                  
               </div>


               </div>




               <div class="row">
          
               <div class="col-12">
 
                    <div class="mb-3">
                     <input type="text" class="form-control" id="qualification_nttcno" placeholder="Nttcno." value="${edit.trainer_list_nttcno}">
                   </div>
                   
                </div>
 


                </div>

                <div class="row mb-3">
          

                <div class="col-12">
                <input type="text" class="form-control" id="validity_update" placeholder="Validity Date."  value="${edit.validity_date}">
                    
                 </div>
  
  
                 </div>

                <div class="row">
          

                <div class="col-12">
  

                <select class="form-select form-select-sm py-2 border-2 border-secondary" id="verify" name="qualification_register">

                <option value="1">Approve</option>
                <option value="0">Pending</option>
                <option value="2">Finished</option>


        
         
            
              
              </select>
                    
                 </div>
  

                 </div>

               </div>
             
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.tl_id}">Update Trainer Qualification</button>
              </div>
              
              `

              }

           

              }

              $('#data_detail').html(rows)

              $('.update_detail').on('click',function(){
                var upd = $(this).attr('id')
                console.log(upd)
                var nttcno = $('#qualification_nttcno').val()
                var validity = $('#validity_update').val()
                var verify = $('#verify').val()


                console.log(nttcno)
                console.log(validity)
                console.log(verify)



                let update = 'update'

                $.ajax({
                  url:'admintrainerqualificationaction.php',
                  method:'post',
                  data:{
                    update:update,
                    upd:upd,
                    nttcno:nttcno,
                    validity:validity,
                    verify:verify,
                  },
                  success:function(response){
                      $('#dataModal').modal('hide')
                      $('#successUpdateModal').modal('show');
                      setTimeout(
                        function() 
                        {
                          window.location.href ='http://localhost/DocumentationSystem/admin/admintrainerlistqualification.php'
                        }, 1000);

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
             url: 'admintrainerqualificationaction.php',
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
          qualipage(lastPage);
 
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
         
          qualipage(lastPage);
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
          qualipage(pagehigh+1);
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
          qualipage(pagelow-5);
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
        qualipage(page);
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