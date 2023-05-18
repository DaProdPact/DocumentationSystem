$(document).ready(function () {

    var tr
    
    let lastPage;
    let pageNum;
    let student_count;
    
    
    let pagehigh;
    let pagelow;
    
    
    let pagedivlast = 5;
    let pagedivfirst = 1;
        $('#addqualification').on('click',function(){
            console.log('whoops')
          $('#addModal').modal('show')
        })
    
         
    
        $('#addqualificationbtn').on('click',function(){
            console.log('whoopiues')
            var details = $('#details').val();
            var unit_code = $('#unit_code').val();
            var unit_count = $('#unit_count').val();
            var qualiname = $('#qualiname').val();
            var compname = $('#compname').val();
    
            console.log(details)
            console.log(unit_code)
            console.log(unit_count)
            console.log(qualiname)
            console.log(compname)
    
            let add = 'add';
            $.ajax({
              url:'adminunitofcompetenciesaction.php',
              method:'post',
              data:{
                add:add,
                details:details,
                unit_code:unit_code,
                unit_count:unit_count,
                qualiname:qualiname,
                compname:compname,
    
              },
              success:function(res){
                $('#addModal').modal('hide')
                $('#successAddedModal').modal('show');
                setTimeout(
                  function() 
                  {
                    window.location.href ='http://localhost/DocumentationSystem/admin/adminunitofcompetencies.php'
        
                  }, 1000);
        
              }
            })
        
          })
    
    
        //     // var addqualificationname = $('#addqualificationname').val();
        //     // var addqualificationcode = $('#addqualificationcode').val();
        
        //     // console.log(addqualificationname);
        //     // console.log(addqualificationcode);
        
        //     // let add = 'add';
        //     // $.ajax({
        //     //   url:'adminqualificationlistaction.php',
        //     //   method:'post',
        //     //   data:{
        //     //     add:add,
        //     //     addqualificationname:addqualificationname,
        //     //     addqualificationcode:addqualificationcode,
        //     //   },
        //     //   success:function(res){
        //     //     $('#successAddedModal').modal('show');
        //     //     setTimeout(
        //     //       function() 
        //     //       {
        //     //         window.location.href ='http://localhost/DocumentationSystem/admin/adminqualificationlist.php'
        
        //     //       }, 1000);
        
        //     //   }
        //     // })
        
        //   })
    
            qualipage(1);
            pagination();
        
             lastPage = 1;
             pageNum;
             student_count;
        
        
             pagehigh;
             pagelow;
        
        
             pagedivlast = 5;
             pagedivfirst = 1;
        
            var firstname = '';
      
              
              function qualipage(page) {
              let gettrainer = 'gettrainer'
              $.ajax({ 
              
               url: "adminelementsaction.php?page=" + page,
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
      
                      rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
                      <td style="width:25%;">${request.lmar_element_name}</td>
                      <td>${request.lmar_element_hours}</td>
                      <td>${request.lmar_element_percount}</td>
                      <td>${request.lmar_unit_name}</td>
                      <td>${request.competencies_name}</td>
                      <td>${request.qualification_title}</td>

                      

                      
      
                       <td> 
                       <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 pe-1 edit_data" name="view" id="${request.lmar_element_id} "></i>
                       <i style="font-size:18px;" value="view" class="fas fa-trash-alt text-danger p-0 delete_data" name="view" id="${request.lmar_element_id}"></i>
               
                         </td>
                   </tr>`
                
              
           
      
                 }
                 $("#table_body").html(rows);
        
      
        
                 $('.delete_data').on('click',function(){
                  var remove = $(this).attr('id')
                  console.log(remove)
        
                  $('#removeModal').modal('show')
        
                  var deletedarea = "";
                  deletedarea += `
                  <div class="modal-header bg-danger">
                  <h5 class="modal-title text-white" id="exampleModalLabel">Delete Certification Details</h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Are you sure you want to delete this Unit of Competencies? </div>
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
                        url:'adminunitofcompetenciesaction.php',
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
                            window.location.href ='http://localhost/DocumentationSystem/admin/adminunitofcompetencies.php'
            
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
                    url:'adminunitofcompetenciesaction.php',
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
      
                      <div class="row">
                      <div class="col-12 mb-4">
         
                      <div class="">
                       <textarea class="form-control" rows="4" id="details" placeholder="certification_details">${edit.lmar_unit_name}</textarea>
                     </div>
                     
                  </div>
                  </div>
                  <div class="row">
                  <div class="col-12 my-1">
         
                  <div class="mb-3">
                   <input type="text" class="form-control" id="unit_code" placeholder="Nttcno." value="${edit.lmar_unit_code}">
                 </div>
                 
              </div>
              </div>
      
              <div class="row">
              <div class="col-12 my-1">
      
              <div class="mb-3">
               <input type="text" class="form-control" id="unit_count" placeholder="Nttcno." value="${edit.lmar_unit_count}">
             </div>
             
          </div>
          </div>
      
      
      
                  
                  <div class="row">
                  
      
                  <div class="col-12 my-2">
      
                  <input type="hidden" id="comps" value="${edit.lmar_unit_comp}">
                  <input type="hidden" id="qualification_register" value="${edit.lmar_unit_qualification}">


                      
                   </div>
      
      
                   </div>
      
      
                     <div class="row">
                  
      
                      <div class="col-12">
        
      

                          
                       </div>
        
      
                       </div>
      
                       
      
      
      
      
        
                       </div>
                     
                        <div
                        class="modal-footer rounded-0 py-2"
                        style="background-color: rgb(112 108 251 / 75%);"
                      >
                      <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.lmar_unit_id}">Update Unit Of Competencies</button>
                      </div>
                      
                      `
      
           
        
                   
        
                      }
        
                      $('#data_detail').html(rows)
      
                      $('.update_detail').on('click',function(){
                        var upd = $(this).attr('id')
                        console.log(upd)
                        var qualification_register = $('#qualification_register').val()
                       
      
                        var details = $('#details').val()
                        var comps = $('#comps').val()
                        var unit_count = $('#unit_count').val()
                        var unit_code = $('#unit_code').val()
                        console.log(details)
                        console.log(unit_code)
                        console.log(unit_count)
                        console.log(qualification_register)
                        console.log(comps)
      
      
                        let update = 'update'
        
                        $.ajax({
                          url:'adminunitofcompetenciesaction.php',
                          method:'post',
                          data:{
                            update:update,
                            upd:upd,
                            qualification_register:qualification_register,
                            details:details,
                            comps:comps,
                            unit_count:unit_count,
                            unit_code:unit_code,
                       
                          },
                          success:function(response){
                            console.log(response)
                              $('#dataModal').modal('hide')
                              $('#successUpdateModal').modal('show');
                              setTimeout(
                                function() 
                                {
                                  window.location.href ='http://localhost/DocumentationSystem/admin/adminunitofcompetencies.php'
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
                   url: 'adminelementsaction.php',
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