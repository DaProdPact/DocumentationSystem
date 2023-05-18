$(document).ready(function () {


    $('#addqualification').on('click',function(){
      $('#addModal').modal('show')
  
    })
  
  
  
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

        
        function qualipage(page) {
        let gettrainer = 'gettrainer'
        $.ajax({ 
        
         url: "admintraineraction.php?page=" + page,
         method: "GET",
         data:{
            gettrainer:gettrainer,
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
            var verification = request.verification;
        
                rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
                <td>${request.trainer_firstname} ${request.trainer_middlename} ${request.trainer_lastname} ${request.trainer_extensionname}</td>
                <td>${request.trainer_email_address}</td>
                <td>${request.trainer_contact_number}</td>
                 <td> 
                 <i style="font-size:18px;" value="view" class="fas fa-eye text-success p-0 pe-1 view_data" name="view" id="${request.trainer_id} "></i>
                 <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 pe-1 edit_data" name="view" id="${request.trainer_id} "></i>
                 <i style="font-size:18px;" value="view" class="fas fa-trash-alt text-danger p-0 delete_data" name="view" id="${request.trainer_id}"></i>
         
                   </td>
             </tr>`
            }

           
           $("#table_body").html(rows);
  
           $('.view_data').on('click',function(){
            var views = $(this).attr('id')
            console.log(views)
            let view_com = 'view_com'
            $.ajax({
              url:'admintraineraction.php',
              method:'post',
              data:{
                view_com:view_com,
                views:views,
              },
              success:function(response){
                  window.location.href ='http://localhost/DocumentationSystem/admin/admintrainerlistqualification.php'  
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
            <h5 class="modal-title text-white" id="exampleModalLabel">Remove Trainer</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Are you sure you want to remove this Trainer? </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary text-danger" data-mdb-dismiss="modal">Close</button>
            <button type="button" id="${remove}"class="btn btn-danger deletequali">Remove</button>
          </div>
        `;
      
          $("#remove_details").html(deletedarea); 
  
          $('.deletequali').on('click',function(){
            var remove = $(this).attr('id');
            console.log(remove)
            let deletes = 'deletes'  
            $('#removeModal').modal('hide');
  
            $.ajax({
                  url:'admintraineraction.php',
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
                      window.location.href ='http://localhost/DocumentationSystem/admin/admintrainers.php'
      
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
              url:'admintraineraction.php',
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


            
                 <div class="col-12">
   
                      <div class="mb-3">
                      <label class="ms-1">First Name</label>
                       <input type="text" class="form-control" id="tfname" placeholder="First Name." value="${edit.trainer_firstname}">
                     </div>
                     
                  </div>

                  <div class="col-12">
   
                  <div class="mb-3">
                  <label class="ms-1">Middle Name</label>
                   <input type="text" class="form-control" id="tmname" placeholder="Middle Name" value="${edit.trainer_middlename}">
                 </div>
                 
              </div>
                <div class="col-12">
    
                <div class="mb-3">
                <label class="ms-1">Last Name</label>
                <input type="text" class="form-control" id="tlname" placeholder="Last Name" value="${edit.trainer_lastname}">
              </div>
              
            </div>

                <div class="col-12">
        
                <div class="mb-3">
                <label class="ms-1">Extension Name</label>
                <input type="text" class="form-control" id="tename" placeholder="Extension Name" value="${edit.trainer_extensionname}">
              </div>
              
              </div>

              <div class="col-12">
        
              <div class="mb-3">
              <label class="ms-1">Contact Number</label>
              <input type="text" class="form-control" id="tcnumber" placeholder="Contact Number" value="${edit.trainer_contact_number}">
            </div>
            
            </div>

            <div class="col-12">
        
            <div class="mb-3">
            <label class="ms-1">Email Address</label>
            <input type="text" class="form-control" id="temail" placeholder="Email Address" value="${edit.trainer_email_address}">
          </div>
          
          </div>




                 </div>
               
                  <div
                  class="modal-footer rounded-0 py-2"
                  style="background-color: rgb(112 108 251 / 75%);"
                >
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.trainer_id}">Update Trainer Information</button>
                </div>
                
                `

  
             
  
                }
  
                $('#data_detail').html(rows)

                $('.update_detail').on('click',function(){
                  var upd = $(this).attr('id')
                  var tfname = $('#tfname').val()
                  var tmname = $('#tmname').val()
                  var tlname = $('#tlname').val()
                  var tename = $('#tename').val()
                  var tcnumber = $('#tcnumber').val()
                  var temail = $('#temail').val()



                  console.log(tfname)
                  console.log(tmname)
                  console.log(tlname)
                  console.log(tename)
                  console.log(tcnumber)
                  console.log(temail)


                  console.log(upd)
                  let update = 'update'
  
                  $.ajax({
                    url:'admintraineraction.php',
                    method:'post',
                    data:{
                      update:update,
                      upd:upd,
                      tfname:tfname,
                      tmname:tmname,
                      tlname:tlname,
                      tename:tename,
                      tcnumber:tcnumber,
                      temail:temail,

                    },
                    success:function(response){
                        $('#dataModal').modal('hide')
                        $('#successUpdateModal').modal('show');
                        setTimeout(
                          function() 
                          {
                            window.location.href ='http://localhost/DocumentationSystem/admin/admintrainers.php'
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
               url: 'admintraineraction.php',
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