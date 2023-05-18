$(document).ready(function () {

    $('#registrationcourseprint').hide()
    // $('#registrationtemplatecourseprint').hide()

  
  
  
    $('body').on('click',function(){
  
      $('#registrationcourseprint').hide();
    })
  

  
    $('#dropdown_logout').on('click',function(){
      $('#logoutModal').modal('show');
    })
  
      $("#Print").on("click", function(){
      $('#registrationcourseprint').show();

        window.print();
  
  
    })

    // $("#TemplatePrint").on("click", function(){
    //   console.log('wow')
    //   $('#registrationtemplatecourseprint').show();

    //     window.print();
  
  
    // })

  
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
           <td> ${user.LastName}, ${user.FirstName} ${user.MiddleName[0]}.</td>
           <td>${user.Contact_Number}</td>
           <td>${user.Email_Address}</td>
           <td>${user.Date_of_Birth}</td>
           <td>${user.Qualification_Program_Title}</td>
       </tr>`;
     }
     $("#table_body").html(rows);
  
  
     $('.view_data').on('click',function(){
       var traineesId = $(this).attr('id')
       $.ajax({
         url: "traineesview.php",
         method: "post",
         data: {
           traineesId: traineesId,
  
         },
         success: function (response) {
           $('#viewModal').modal('show')
           console.log(response)
  
           let trainees = JSON.parse(response)
           let rows = "";     
           for(beneficiary of trainees){
               rows += `
               <div
           class="modal-header py-2"
           style="background-color: rgba(72, 157, 253, 0.747)"
         >
         <span
         class="text-white float-start fw-bold"
         style="font-size: 15px"
         ><img src="../img/logo.png" class="bg-white rounded-circle"  width="20px" alt="" />
         trainees Details</span
       >
         </div>
         
         <div class="modal-body" id="data_detail" style="background-color: rgba(225, 249, 255, 0.678)">
              
           <div class="row">
           <div class="col-12">
  
             <div class="row mt-1">
               <div class="col-2">
                 <img
                   src="../img/logo.png"
                   class="ms-4 rounded-circle"
  
                   width="50"
                   height="50"
                   style="background-color: rgba(0, 162, 255, 0.671)"
                 />
               </div>
               <div class="col mt-1">
                 <p
                   class="h5 text-secondary mb-0"
                   style="font-size: 20px"
                 >
                 ${beneficiary.firstname} ${beneficiary.lastname}
                 </p>
                 <p
                   class="_responsive-description-detail myf-custome6-font h5 text-secondary mb-0"
                   style="font-size: 12px"
                 >
                 ${beneficiary.barangay} ${beneficiary.municipality} 
                 </p>
                 
               </div>
               <hr class="mt-2 ms-4 text-primary border-1" style="width: 80%" />
             </div>
  
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
               Fullname : ${beneficiary.firstname} ${beneficiary.middlename} ${beneficiary.lastname}
             </p>
  
  
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
               Birthdate : ${beneficiary.birthdate}
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
               Baranggay :  ${beneficiary.barangay}
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Municipality/City : ${beneficiary.municipality}
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Contact Number :  ${beneficiary.contact} 
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Occupation : ${beneficiary.occupation} 
             </p>
            
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Gender : ${beneficiary.sex}
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Civil Status :  ${beneficiary.civil} 
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Age : ${beneficiary.age} 
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Dependent (Name of Beneficiary of the Micro insurance Holder) : ${beneficiary.dependent} 
             </p>
             <p class="text-muted ms-3 myf-custome6-font fw-bold mt-0" style="font-size: 13px">
             Remarks : ${beneficiary.Remarks} 
             </p>
           </div>
           </div>
           </div>
           <div
           class="modal-footer rounded-0 py-0"
           style="background-color: rgba(49, 145, 224, 0.5)"
         >
       <span class="text-white float-end" style="font-size: 12px"
         >
  
       >
         </div>
             `
  
           }
  
           
     $('#view_detail').html(rows)
  
     
  
         }
       })
     
  
       // $(this).parent().siblings().eq(1).text('Arjhen')
       // console.log($(this).attr('id'))
  
  
    
     })
     $('.delete_data').on('click',function(){
       var traineesId = $(this).attr('id')
       $('#delModal').modal('show')
         var remove = $(this).closest('tr');
        
         $('#deletetrainees').on('click',function(){
           $.ajax({
         url: "traineesdelete.php",
         method: "post",
         data: {
           traineesId: traineesId,
  
         },
         success: function(resdelete){
           if(resdelete == 1){
  
             $('#delModal').modal('hide')
             remove.remove();
           }
         }
       })
         })
  
     })
     $('.update_data').on('click',function(){
     
       var update = $(this);
       var traineesId = $(this).attr('id')
  
         $('#updateModal').modal('show');
         
  
       $.ajax({
         url: "traineesupdate.php",
         method: "post",
         data: {
           traineesId: traineesId,
  
         },
         success: function (response) {
           $('#updateModal').modal('show');
           console.log(response)
  
           let trainees = JSON.parse(response)
           let ups = "";     
           for(upbeneficiary of trainees){
             ups += ` 
             <div
             class="modal-header py-2"
             style="background-color: rgba(40,121,211)"
           >
           <span
           class="text-white float-start fw-bold"
           style="font-size: 15px"
           ><img src="../img/logo.png" class="bg-white rounded-circle" width="20px" alt="" />
           Update trainees</span
         >
           </div>
           
           <div class="modal-body" style="background-color: #f8f9fa6b">
               
             <div class="row">
             <div class="col border border-5 border-primary border-opacity-50 ms-0 ">
             <p class="text-center text-primary mt-1">Update Details</p>
               
                 <div class="row mt-3">
              
                 <div class="col-4">
  
                 <div class="ms-1 form-helper" style="font-size: .8rem;">Firstname</div>
                   <input type="text" id="fname" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.firstname}"/>
                 
                
       
                 </div>
  
                       
                 <div class="col-4">
  
                 <div class="ms-1 form-helper" style="font-size: .8rem;">Middlename</div>
                   <input type="text" id="mname" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.middlename}"/>
                 
                
       
                 </div>
  
  
                 <div class="col-4">
  
                 <div class="ms-1 form-helper" style="font-size: .8rem;">Lastname</div>
                   <input type="text" id="lname" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.lastname}"/>
                 
                
       
                 </div>
               </div>
  
               <div class="row mt-3 me-2">
               <div class="col-3">
  
                 <div class="ms-1 form-helper" style="font-size: .8rem;">Birthdate</div>
                 <input type="text" id="bdate" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1" value=" ${upbeneficiary.birthdate}"/>
  
  
  
                 </div>
          
                 <div class="col-3">
  
                 <div class="ms-1 form-helper" style="font-size: .8rem;">Age</div>
                 <input type="text" id="age" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1" value=" ${upbeneficiary.age}"/>
       
                 </div>
  
                 <div class="col-3">
  
                 <div class="ms-1 form-helper" style="font-size: .8rem;">Gender</div>
                 <input type="text" id="sex" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1" value=" ${upbeneficiary.sex}"/>
  
               </div>
  
               <div class="col-3">
  
               <div class="ms-1 form-helper" style="font-size: .8rem;">Civil Status</div>
                 <input type="text" id="civil" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1"value=" ${upbeneficiary.civil}"/>
  
               </div>
                   </div>
   
                   <div class="row mt-3">
              
              <div class="col-4">
  
              <div class="ms-1 form-helper" style="font-size: .8rem;">Barangay</div>
                <input type="text" id="barangay" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.barangay}"/>
              
             
    
              </div>
  
                    
              <div class="col-4">
  
              <div class="ms-1 form-helper" style="font-size: .8rem;">Municipality/City</div>
                <input type="text" id="city" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.municipality}"/>
              
             
    
              </div>
  
  
              <div class="col-4">
  
              <div class="ms-1 form-helper" style="font-size: .8rem;">Contact Number</div>
                <input type="text" id="contact" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.contact}"/>
              
             
    
              </div>
            </div>
  
     <div class="row mt-3">
     <div class="col-4">
  
   <div class="ms-1 form-helper" style="font-size: .8rem;">Occupation</div>
     <input type="text" id="occ" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.occupation}"/>
  
  
  
   </div>
   <div class="col-4">
  
   <div class="ms-1 form-helper" style="font-size: .8rem;">Dependent</div>
     <input type="text" id="dep" class="bg-secondary bg-opacity-25 border border-1 py-1 border-primary rounded-1 w-100" value=" ${upbeneficiary.dependent}"/>
  
  
  
   </div>
  
   <div class="col-4">
  
   <div class="ms-1 form-helper" style="font-size: .8rem;">Remarks</div>
   <div class="form-outline">
  
   <select class="form-select form-select-sm start_time py-2" id="remarks">
   
   <option value="${upbeneficiary.Remarks}">${upbeneficiary.Remarks}</option>
   <option value="none">none</option>
   <option value="OK">OK</option>
   <option value="Not Answer">Not Answer</option>
  
  
   </select>
  
   </div>
  
   </div>
                 
  
   </div>
  
  
  
   <div class="row mt-3 mb-2 float-end">
     <div class="col">
     
     <button type="button" class="btn text-white p-2 text-capitalize" data-mdb-dismiss="modal" style="font-size:12px; background-color: rgb(98 98 98)">
       Close
     </button>
     <button type="button" class="btn text-white p-2 text-capitalize" id="updatetrainees"
     style="background-color: rgb(20 125 255);  font-size:12px;">
       Update trainees
     </button>
  
  
  
     </div>
  
   </div>
  
   </div>
  
  
  
             </div>
             </div>
       
             <div
             class="modal-footer rounded-0 py-0"
             style="background-color: rgba(40,121,211)"
           >
         <span class="text-white float-end" style="font-size: 12px"
           >.</span
         >
           </div>
  
  </div>
  </div>
             `
  
           }
  
           
     $('#update_detail').html(ups)
  
  
  
     
  $('#updatetrainees').on('click',function(){
  
  var remarks = $("#remarks  option:selected").text();
  console.log(remarks)
  console.log(traineesId)
  var fname = $('#fname').val();
  var mname = $('#mname').val();
  var lname = $('#lname').val();
  var bdate = $('#bdate').val();
  var age = $('#age').val();
  var sex = $('#sex').val();
  var civil = $('#civil').val();
  var barangay = $('#barangay').val();
  var city = $('#city').val();
  var contact = $('#contact').val();
  var occ = $('#occ').val();
  var dep = $('#dep').val();
  
  
  
  
  
  console.log(fname)
  
  
  
  $.ajax({
  url: "updatedtrainees.php",
  method: "post",
  data: {
  traineesId:traineesId,
  fname: fname,
  mname: mname,
  lname: lname,
  bdate: bdate,
  age: age,
  sex:sex,
  civil: civil,
  barangay: barangay,
  city: city,
  contact: contact,
  occ: occ,
  dep: dep,
  remarks:remarks,
  },
  success: function (updates) {
  console.log(updates)
  if(updates == 1){
  
  
  
  $('.success').toast('show');
  $('#updateModal').modal('hide');
  
  
       // console.log($(this).attr('id'))
  
  console.log(fname)
  
  update.parent().siblings().eq(0).text(fname)
  update.parent().siblings().eq(1).text(lname)
  update.parent().siblings().eq(2).text(bdate)
  update.parent().siblings().eq(3).text(contact)
  update.parent().siblings().eq(4).text(remarks)
  
  
  
  }
  if(updates == 2){
  
  console.log('wow')
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