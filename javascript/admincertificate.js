$(document).ready(function () {


    $('#addqualification').on('click',function(){
      $('#addModal').modal('show')
  
    })
  
  
  
    $('#addqualificationbtn').on('click',function(){
      var qualiname = $('#qualiname').val();
      var compname = $('#compname').val();
      var details = $('#details').val();

      
      console.log(qualiname);
      console.log(compname);
      console.log(details);
  
      let add = 'add';
      $.ajax({
        url:'admincertificatection.php',
        method:'post',
        data:{
          add:add,
          qualiname:qualiname,
          compname:compname,
          details:details,
        },
        success:function(res){
          $('#addModal').modal('hide')
          $('#successAddedModal').modal('show');
          setTimeout(
            function() 
            {
              window.location.href ='http://localhost/DocumentationSystem/admin/admincertification.php'
  
            }, 1000);
  
        }
      })
  
    })
    
  
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
        
         url: "admincertificatection.php?page=" + page,
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
                <td>${request.certification_details}</td>
                <td>${request.qualification_title}</td>
                <td>${request.comp_name}</td>
                 <td> 
                 <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 pe-1 edit_data" name="view" id="${request.certification_id} "></i>
                 <i style="font-size:18px;" value="view" class="fas fa-trash-alt text-danger p-0 delete_data" name="view" id="${request.certification_id}"></i>
         
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
          <div class="modal-body">Are you sure you want to delete this Details ? </div>
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
                  url:'admincertificatection.php',
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
                      window.location.href ='http://localhost/DocumentationSystem/admin/admincertification.php'
      
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
              url:'admincertificatection.php',
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
                <div class="col-12">
   
                <div class="">
                 <textarea class="form-control" rows="4" id="details" placeholder="certification_details">${edit.certification_details}</textarea>
               </div>
               
            </div>
            </div>



               <div class="row">
            

                <div class="col-12">
  

                <select class="form-select form-select-sm py-2 border-2 border-secondary my-3" id="qualification_register" name="qualification_register">

                <option value="${edit.certification_qualification}">${edit.qualification_title}</option>
                <option value="1">ATS NC I</option>
                <option value="2">ATS NC II</option>
                <option value="3">ATS NC III</option>
                <option value="4">ATS NC IV</option>
                <option value="5">BHS NC II</option>
                <option value="6">DOW NC II</option>
                <option value="7">DRM NC II</option>
                <option value="8">DRV NC II</option>
                <option value="9">EIM NC II</option>
                <option value="10">EIM NC III</option>
                <option value="11">EIM NC IV</option>
                <option value="12">GTAW NC II</option>
                <option value="13">MCG NC I</option>
                <option value="14">OAP NC II</option>
                <option value="15">PVS NC II</option>
                <option value="16">PACU / CRE NC III</option>
                <option value="17">DOM RAC NC II</option>
                <option value="18">SMAW NC I</option>
                <option value="19">SMAW NC II</option>
                <option value="20">TM</option>
        
         
            
              
              </select>
                    
                 </div>
  

                 </div>

                 



                  <div class="row">
            

                  <div class="col-12">
    
  
                  <select class="form-select form-select-sm py-2 border-2 border-secondary" id="comps">
  
                  <option value="${edit.certification_competencies}">${edit.comp_name}</option>
                  <option value="1">core1</option>
                  <option value="2">core2</option>
                  <option value="3">core3</option>
                  <option value="4">core4</option>
                  <option value="5">core5</option>
                  <option value="6">core6</option>
                  <option value="7">elective1</option>
                  <option value="8">elective2</option>

                </select>
                      
                   </div>
    
  
                   </div>
  
                 </div>
               
                  <div
                  class="modal-footer rounded-0 py-2"
                  style="background-color: rgb(112 108 251 / 75%);"
                >
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.certification_id}">Update Certificate Details</button>
                </div>
                
                `

     
  
             
  
                }
  
                $('#data_detail').html(rows)

                $('.update_detail').on('click',function(){
                  var upd = $(this).attr('id')
                  console.log(upd)
                  var qualification_register = $('#qualification_register').val()
                  console.log(qualification_register)

                  var details = $('#details').val()
                  var comps = $('#comps').val()
                  console.log(details)
                  console.log(comps)


                  let update = 'update'
  
                  $.ajax({
                    url:'admincertificatection.php',
                    method:'post',
                    data:{
                      update:update,
                      upd:upd,
                      qualification_register:qualification_register,
                      details:details,
                      comps:comps,
                 
                    },
                    success:function(response){
                      console.log(response)
                        $('#dataModal').modal('hide')
                        $('#successUpdateModal').modal('show');
                        setTimeout(
                          function() 
                          {
                            window.location.href ='http://localhost/DocumentationSystem/admin/admincertification.php'
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
               url: 'admincertificatection.php',
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