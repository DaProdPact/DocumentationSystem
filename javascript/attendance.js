$(document).ready(function () {
    // $('#logoutModal').modal('show');
    $('#attendanceprint').hide();
    $('#attendancedetails').hide();
    
    
  
  
  
    $('body').on('click',function(){
      $('#attendanceprint').hide();
      $('#attendancedetails').hide();
    })
  

  
    $('#dropdown_logout').on('click',function(){
      $('#logoutModal').modal('show');
    })
  
      $("#printdetails").on("click", function(){
      $('#attendancedetails').show();
      $('#attendanceprint').hide();
      
  
  
  
      // $('#attendanceprint').show();
        window.print();
  
  
    })
  
      $("#templateprint").on("click", function(){
        $('#attendanceprint').show();
        $('#attendancedetails').hide();
          window.print();
  
  
      })
   
  
      $('#import').on('click',function(){
          $('#csvselection').modal('show')
      })
  
  
  
  
  
      $('#importing').on('submit',function(){
        $.ajax({
          url: "./php/importcsv.php",
          method: "post",
          data:
          new FormData(this),
          dataType: "json",
          contentType: false,
          cache: false,
          processData: false,
  
          success: function (importsuccess) {
            console.log(importsuccess)
            // if (importsuccess == 1) {
            //   window.location.href = "php/tipattendance.php";
  
            // } 
            // else if(importsuccess == 2){
  
            //   console.log('probleminimporting')
  
            // }
            // else {
            //   console.log('probleminimporting')
  
            // }
          },
        });
      })
  
  
  
  
  
  
      trainees(1);
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
  return (date + " " + time);  
             }
  
  function trainees(page) {
  $.ajax({ 
   url: "traineesconnection.php?page=" + page,
   method: "GET",
   success: function (res) {
     console.log(res);
     if(res == 2){
           
     $("#table_body").html(`<tr class="table-active">
     <td colspan="6" class="text-center"> No Record Found </td>
     </tr>`);
  
     }
     else{
     let users = JSON.parse(res);
  
  
     let rows = "";
     for (user of users) {
  
       rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
           <td >${user.FirstName} ${user.MiddleName} ${user.LastName}</td>
           <td>${user.Contact_Number}</td>
           <td>${user.Email_Address}</td>
           <td>${user.Date_of_Birth}</td>
           <td>${user.Qualification_Program_Title}</td>
  
           <td> 
           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 view_data" name="view" id="${user.attendance_id} "></i>
           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${user.attendance_id} "></i>
                 </td>
       </tr>`;
     }
     $("#table_body").html(rows);


     $('#searchtrainees').on('keyup',function(){
      var search = $('#searchtrainees').val()
      console.log(search)
      $.ajax({
        url: "traineesconnection.php",
        method: "post",
        data: {
          search: search,
        },
        success: function (response) {
          console.log(response)
          if(response == 2){
           
            $("#table_body").html(`<tr class="table-active">
            <td colspan="6" class="text-center"> No Record Found </td>
            </tr>`);
         
            }
            else if (search == ''){
              window.location.href ='trainees.php'
              console.log('s')
             }
            else{
            let users = JSON.parse(response);
         
         
            let rows = "";
            for (user of users) {
         
              rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
                  <td >${user.FirstName} ${user.MiddleName} ${user.LastName}</td>
                  <td>${user.Contact_Number}</td>
                  <td>${user.Email_Address}</td>
                  <td>${user.Date_of_Birth}</td>
                  <td>${user.Qualification_Program_Title}</td>
                  <td>
                  <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 view_data" name="view" id="${user.attendance_id} "></i>
                  <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${user.attendance_id} "></i>
                        </td>
              </tr>`;
            }
            $("#table_body").html(rows);

            $('.view_data').on('click',function(){
              var traineesId = $(this).attr('id')
       
              console.log(traineesId)
              let edit = 'edit';
              $.ajax({
                url: "traineesconnection.php",
                method: "post",
                data: {
                   edit:edit,
                  traineesId: traineesId,
                },
                success: function (response) {
                  $('#dataModal').modal('show')
                  console.log(response)
         
                  let edits = JSON.parse(response)
                  let rows = "";     
                  for(edit of edits){
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
             
                  <div class="col-3">
       
                       <div class="mb-3">
                       <label class="ms-1">First Name</label>
                        <input type="text" class="form-control" id="fname" placeholder="First Name" value="${edit.FirstName}">
                      </div>
                      
                   </div>
       
                   <div class="col-3">
       
                   <div class="mb-3">
                   <label class="ms-1">Middle Name</label>
                    <input type="text" class="form-control" id="mname" placeholder="Middle Name" value="${edit.MiddleName}">
                  </div>
                  
               </div>
                 <div class="col-4">
       
                 <div class="mb-3">
                 <label class="ms-1">Last Name</label>
                 <input type="text" class="form-control" id="lname" placeholder="Last Name" value="${edit.LastName}">
               </div>
               
             </div>
       
                 <div class="col-2">
         
                 <div class="mb-3">
                 <label class="ms-1">Suffix Name</label>
                 <input type="text" class="form-control" id="ename" placeholder="Extension Name" value="${edit.Extension_Name}">
               </div>
               
               </div>
               </div>
       
               
               <div class="row">
       
       
             <div class="col-6">
         
             <div class="mb-3">
             <label class="ms-1">Email Address</label>
             <input type="text" class="form-control" id="email" placeholder="Email Address" value="${edit.Email_Address}">
           </div>
           
           </div>
           <div class="col-6">
         
           <div class="mb-3">
           <label class="ms-1">Contact Number</label>
           <input type="text" class="form-control" id="cnumber" placeholder="Contact Number" value="${edit.Contact_Number}">
         </div>
         
         </div>
       
       
           </div>
       
           <div class="row">
           <div class="col-2">
       
           <div class="mb-3">
           <label class="ms-1">Street Number</label>
           <input type="text" class="form-control" id="street" placeholder="Street No." value="${edit.Street_No}">
         </div>
         
         </div>
             
           <div class="col-3">
       
                <div class="mb-3">
                <label class="ms-1">Barangay</label>
                 <input type="text" class="form-control" id="barangay" placeholder="Barangay" value="${edit.Barangay}">
               </div>
               
            </div>
       
            <div class="col-3">
       
            <div class="mb-3">
            <label class="ms-1">Municipality</label>
             <input type="text" class="form-control" id="municipality" placeholder="Municipality" value="${edit.Municipality}">
           </div>
           
        </div>
          <div class="col-4">
       
          <div class="mb-3">
          <label class="ms-1">Province</label>
          <input type="text" class="form-control" id="province" placeholder="Province" value="${edit.Permanent_Province}">
        </div>
        
       </div>
       
       
        </div>
       
        <div class="row">
       
          
        <div class="col-3">
       
             <div class="mb-3">
             <label class="ms-1">Date of Birth</label>
              <input type="text" class="form-control" id="birth" placeholder="Birth Date" value="${edit.Date_of_Birth}">
            </div>
            
         </div>
         <div class="col-2">
       
         <div class="mb-3">
         <label class="ms-1">Age</label>
         <input type="text" class="form-control" id="age" placeholder="Age" value="${edit.Age}">
        </div>
        
        </div>
         <div class="col-3">
       
         <div class="mb-3">
         <label class="ms-1">Higher Educational</label>
          <input type="text" class="form-control" id="hea" placeholder="Higher Educational Attaintment" value="${edit.Higher_Educational_Attaintment}">
        </div>
        
       </div>
       <div class="col-4">
       
       <div class="mb-3">
       <label class="ms-1">Messenger Account</label>
       <input type="text" class="form-control" id="messenger" placeholder="Messenger Account" value="${edit.MessengerAccount}">
       </div>
       
       </div>
       
       
       </div>
       
       <div class="row">
       
       
       <div class="col-6">
       
       <div class="mb-3">
       <label class="ms-1">FullName (Guardian)</label>
       <input type="text" class="form-control" id="fnguardian" placeholder="FullName (Guardian)" value="${edit.Guardian}">
       </div>
       
       </div>
       <div class="col-6">
       
       <div class="mb-3">
       <label class="ms-1">Contact Number (Guardian)</label>
       <input type="text" class="form-control" id="cnguardian" placeholder="Contact Number (Guardian)" value="${edit.ContactGuardian}">
       </div>
       
       </div>
       
       
       </div>
       
       
       
       
                  </div>
                
                   <div
                   class="modal-footer rounded-0 py-2"
                   style="background-color: rgb(112 108 251 / 75%);"
                 >
                 <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                 <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.attendance_id}">Update Trainees Information</button>
                 </div>
                    `
         
                  }
         
                  
            $('#data_detail').html(rows)
         
            $('.update_detail').on('click',function(){
           
             var updateId = $(this).attr('id')
             var fname = $('#fname').val();
             var mname = $('#mname').val();
             var lname =  $('#lname').val();
             var ename = $('#ename').val();
             var email = $('#email').val();
             var cnumber = $('#cnumber').val();
             var street = $('#street').val();
             var barangay = $('#barangay').val();
             var municipality = $('#municipality').val();
             var province =  $('#province').val();
             var birth = $('#birth').val();
             var age = $('#age').val();
             var hea = $('#hea').val();
             var messenger = $('#messenger').val();
             var fnguardian = $('#fnguardian').val();
             var cnguardian = $('#cnguardian').val();
       
             console.log(updateId)
             console.log(fname)
             let upId = 'upId'
             $.ajax({
               url: "traineesconnection.php",
               method: "post",
               data: {
                 updateId: updateId,
                 upId:upId,
                 fname:fname,
                 mname:mname,
                 lname:lname,
                 ename:ename,
                 email:email,
                 cnumber:cnumber,
                 street:street,
                 barangay:barangay,
                 municipality:municipality,
                 province:province,
                 birth:birth,
                 age:age,
                 hea:hea,
                 messenger:messenger,
                 fnguardian:fnguardian,
                 cnguardian:cnguardian
               },
               success: function(res){
                 console.log(res)
                 $('#dataModal').modal('hide')
       
                 $('#successUpdateModal').modal('show');
                 setTimeout(
                   function() 
                   {
                     window.location.href ='http://localhost/DocumentationSystem/php/trainees.php'
         
                   }, 1000);
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
              <h5 class="modal-title text-white" id="exampleModalLabel">Remove Trainees</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Are you sure you want to remove this trainees ? </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary text-danger" data-mdb-dismiss="modal">Close</button>
              <button type="button" id="${remove}"class="btn btn-danger deletequali">remove</button>
            </div>
          `;
        
            $("#remove_details").html(deletedarea); 
        
            $('.deletequali').on('click',function(){
              var remove = $(this).attr('id');
              console.log(remove)
              let deletes = 'deletes'  
              $('#removeModal').modal('hide');
        
              $.ajax({
                    url:'traineesconnection.php',
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
                        window.location.href ='http://localhost/DocumentationSystem/php/trainees.php'
        
                      }, 1000);
                    }
                  })
        
             })
             })


            
         
                }
              })
            })
          }
        }
      })
     })
  
  
     $('.view_data').on('click',function(){
       var traineesId = $(this).attr('id')

       console.log(traineesId)
       let edit = 'edit';
       $.ajax({
         url: "traineesconnection.php",
         method: "post",
         data: {
            edit:edit,
           traineesId: traineesId,
         },
         success: function (response) {
           $('#dataModal').modal('show')
           console.log(response)
  
           let edits = JSON.parse(response)
           let rows = "";     
           for(edit of edits){
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
      
           <div class="col-3">

                <div class="mb-3">
                <label class="ms-1">First Name</label>
                 <input type="text" class="form-control" id="fname" placeholder="First Name" value="${edit.FirstName}">
               </div>
               
            </div>

            <div class="col-3">

            <div class="mb-3">
            <label class="ms-1">Middle Name</label>
             <input type="text" class="form-control" id="mname" placeholder="Middle Name" value="${edit.MiddleName}">
           </div>
           
        </div>
          <div class="col-4">

          <div class="mb-3">
          <label class="ms-1">Last Name</label>
          <input type="text" class="form-control" id="lname" placeholder="Last Name" value="${edit.LastName}">
        </div>
        
      </div>

          <div class="col-2">
  
          <div class="mb-3">
          <label class="ms-1">Suffix Name</label>
          <input type="text" class="form-control" id="ename" placeholder="Extension Name" value="${edit.Extension_Name}">
        </div>
        
        </div>
        </div>

        
        <div class="row">


      <div class="col-6">
  
      <div class="mb-3">
      <label class="ms-1">Email Address</label>
      <input type="text" class="form-control" id="email" placeholder="Email Address" value="${edit.Email_Address}">
    </div>
    
    </div>
    <div class="col-6">
  
    <div class="mb-3">
    <label class="ms-1">Contact Number</label>
    <input type="text" class="form-control" id="cnumber" placeholder="Contact Number" value="${edit.Contact_Number}">
  </div>
  
  </div>


    </div>

    <div class="row">
    <div class="col-2">

    <div class="mb-3">
    <label class="ms-1">Street Number</label>
    <input type="text" class="form-control" id="street" placeholder="Street No." value="${edit.Street_No}">
  </div>
  
  </div>
      
    <div class="col-3">

         <div class="mb-3">
         <label class="ms-1">Barangay</label>
          <input type="text" class="form-control" id="barangay" placeholder="Barangay" value="${edit.Barangay}">
        </div>
        
     </div>

     <div class="col-3">

     <div class="mb-3">
     <label class="ms-1">Municipality</label>
      <input type="text" class="form-control" id="municipality" placeholder="Municipality" value="${edit.Municipality}">
    </div>
    
 </div>
   <div class="col-4">

   <div class="mb-3">
   <label class="ms-1">Province</label>
   <input type="text" class="form-control" id="province" placeholder="Province" value="${edit.Permanent_Province}">
 </div>
 
</div>


 </div>

 <div class="row">

   
 <div class="col-3">

      <div class="mb-3">
      <label class="ms-1">Date of Birth</label>
       <input type="text" class="form-control" id="birth" placeholder="Birth Date" value="${edit.Date_of_Birth}">
     </div>
     
  </div>
  <div class="col-2">

  <div class="mb-3">
  <label class="ms-1">Age</label>
  <input type="text" class="form-control" id="age" placeholder="Age" value="${edit.Age}">
 </div>
 
 </div>
  <div class="col-3">

  <div class="mb-3">
  <label class="ms-1">Higher Educational</label>
   <input type="text" class="form-control" id="hea" placeholder="Higher Educational Attaintment" value="${edit.Higher_Educational_Attaintment}">
 </div>
 
</div>
<div class="col-4">

<div class="mb-3">
<label class="ms-1">Messenger Account</label>
<input type="text" class="form-control" id="messenger" placeholder="Messenger Account" value="${edit.MessengerAccount}">
</div>

</div>


</div>

<div class="row">


<div class="col-6">

<div class="mb-3">
<label class="ms-1">FullName (Guardian)</label>
<input type="text" class="form-control" id="fnguardian" placeholder="FullName (Guardian)" value="${edit.Guardian}">
</div>

</div>
<div class="col-6">

<div class="mb-3">
<label class="ms-1">Contact Number (Guardian)</label>
<input type="text" class="form-control" id="cnguardian" placeholder="Contact Number (Guardian)" value="${edit.ContactGuardian}">
</div>

</div>


</div>




           </div>
         
            <div
            class="modal-footer rounded-0 py-2"
            style="background-color: rgb(112 108 251 / 75%);"
          >
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.attendance_id}">Update Trainees Information</button>
          </div>
             `
  
           }
  
           
     $('#data_detail').html(rows)
  
     $('.update_detail').on('click',function(){
    
      var updateId = $(this).attr('id')
      var fname = $('#fname').val();
      var mname = $('#mname').val();
      var lname =  $('#lname').val();
      var ename = $('#ename').val();
      var email = $('#email').val();
      var cnumber = $('#cnumber').val();
      var street = $('#street').val();
      var barangay = $('#barangay').val();
      var municipality = $('#municipality').val();
      var province =  $('#province').val();
      var birth = $('#birth').val();
      var age = $('#age').val();
      var hea = $('#hea').val();
      var messenger = $('#messenger').val();
      var fnguardian = $('#fnguardian').val();
      var cnguardian = $('#cnguardian').val();

      console.log(updateId)
      console.log(fname)
      let upId = 'upId'
      $.ajax({
        url: "traineesconnection.php",
        method: "post",
        data: {
          updateId: updateId,
          upId:upId,
          fname:fname,
          mname:mname,
          lname:lname,
          ename:ename,
          email:email,
          cnumber:cnumber,
          street:street,
          barangay:barangay,
          municipality:municipality,
          province:province,
          birth:birth,
          age:age,
          hea:hea,
          messenger:messenger,
          fnguardian:fnguardian,
          cnguardian:cnguardian
        },
        success: function(res){
          console.log(res)
          $('#dataModal').modal('hide')

          $('#successUpdateModal').modal('show');
          setTimeout(
            function() 
            {
              window.location.href ='http://localhost/DocumentationSystem/php/trainees.php'
  
            }, 1000);
        }
      })


     })
  
         }
       })
     
  
       // $(this).parent().siblings().eq(1).text('Arjhen')
       // console.log($(this).attr('id'))
  
  
    
     })






     $('.delete_data').on('click',function(){
      var remove = $(this).attr('id')
      console.log(remove)

      $('#removeModal').modal('show')

      var deletedarea = "";
      deletedarea += `
      <div class="modal-header bg-danger">
      <h5 class="modal-title text-white" id="exampleModalLabel">Remove Trainees</h5>
      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">Are you sure you want to remove this trainees ? </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary text-danger" data-mdb-dismiss="modal">Close</button>
      <button type="button" id="${remove}"class="btn btn-danger deletequali">remove</button>
    </div>
  `;

    $("#remove_details").html(deletedarea); 

    $('.deletequali').on('click',function(){
      var remove = $(this).attr('id');
      console.log(remove)
      let deletes = 'deletes'  
      $('#removeModal').modal('hide');

      $.ajax({
            url:'traineesconnection.php',
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
                window.location.href ='http://localhost/DocumentationSystem/php/trainees.php'

              }, 1000);
            }
          })

     })
     })


     $('.update_detail').on('click',function(){
    
       var updateId = $(this).attr('id')

       console.log(updateId)
  

     })
  
  }   
  
  
  
   },
  });
  }
  function pagination() {
     $.ajax({
         url: 'trainesscount.php',
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
           trainees(lastPage);
  
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
          
           trainees(lastPage);
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
           trainees(pagehigh+1);
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
           trainees(pagelow-5);
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
         trainees(page);
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