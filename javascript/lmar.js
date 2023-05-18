$(document).ready(function(){



  var togs = 1;

  $('#lmarnavbtn').on('click',function(){
    $('#navbar').removeClass("d-none").show();
  })


  $('#navbar').on('click',function(){
    $('#navbar').addClass("d-none").show();

  })


  $('#colbtn').on('click',function(){
    var colvalue = $('#colvalue').val()
    $.ajax({
      url:'sessioncol.php',
      method:'post',
      data:{
        colvalue:colvalue,
      },
      success:function(res){
        if(res == 1){
          window.location.href = "lmar.php";

        }

      }
    })

  })

  
  

  // $('body').click(function(){
 
  //   $('#navbar').addClass("d-none").show();

  // })


  $(function () {
    $("td").dblclick(function () {
        var OriginalContent = $(this).text();

        var inputNewText = prompt("Enter new content for:", OriginalContent);

        if (inputNewText != null) {
            $(this).text(inputNewText)
        }
    });
});

$(function () {
  $("th").dblclick(function () {
      var OriginalContent = $(this).text();

      var inputNewText = prompt("Enter new content for:", OriginalContent);

      if (inputNewText != null) {
          $(this).text(inputNewText)
      }
  });
});


$("tr").not(':first').hover(
  function () {
    $(this).css("background","yellow");
  }, 
  function () {
    $(this).css("background","");
  }
);



    
        $('#lmarprintbtn').on('click',function(){
          $('#printlmar').show();
 
    
  
          window.print();
  
        })
  


  
  
  
  
//                 qualification
          
//           qualification(1);
//           pagination();
          
//           let lastPage = 1;
//           let pageNum;
//           let student_count;
      
      
//           let pagehigh;
//           let pagelow;
            
      
//           let pagedivlast = 5;
//           let pagedivfirst = 1;
      
//           var firstname = '';
      
//       var my_date_format = function(input){
//       var d = new Date(Date.parse(input.replace(/-/g, "/")));
//       var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
//       var date = month[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//       var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
//       return (date + " " + time);  
//                  }
      
//       function qualification(page) {
//       $.ajax({ 
//        url: "printcertificationconnection.php?page=" + page,
//        method: "GET",
//        success: function (res) {
//          console.log(res);
//          if(res == 2){
               
//          $("#table_body").html(`<tr class="table-active">
//          <td colspan="6" class="text-center"> No Record Found </td>
//          </tr>`);
      
//          }
//          else{
//          let certs = JSON.parse(res);
      
      
//          let rows = "";
//          for (cert of certs) {
  
  
  
//           if (cert.core1 == '1' && cert.core2 == '1' && cert.core3 == '1'){
            
//            rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
         
//            <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//            <td>${cert.CoPR_Number}</td>
//            <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//            <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//            <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//            <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
  
//            <td> 
//            <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//            <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//           </td>
//        </tr>`;
  
  
//         }
//         else if (cert.core1 == '1' && cert.core2 == '1' && cert.core3 != '1'){
//           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
         
//           <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//           <td>${cert.CoPR_Number}</td>
//           <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i>
//           </td>
  
  
//           <td> 
//           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//                 </td>
//       </tr>`;
//         }
//         else if (cert.core1 == '1' && cert.core2 != '1' && cert.core3 == '1'){
//           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
         
//           <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//           <td>${cert.CoPR_Number}</td>
//           <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
  
  
//           <td> 
//           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//                 </td>
//       </tr>`;
//         }
//         else if (cert.core1 != '1' && cert.core2 == '1' && cert.core3 == '1'){
//           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
        
//           <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//           <td>${cert.CoPR_Number}</td>
//           <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
  
  
//           <td> 
//           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//                 </td>
//       </tr>`;
//         }
//         else if (cert.core1 == '1' && cert.core2 != '1' && cert.core3 != '1'){
//           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
        
//           <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//           <td>${cert.CoPR_Number}</td>
//           <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
  
  
//           <td> 
//           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//                 </td>
//       </tr>`;
//         }
//         else if (cert.core1 != '1' && cert.core2 == '1' && cert.core3 != '1'){
//           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
        
//           <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//           <td>${cert.CoPR_Number}</td>
//           <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
  
  
//           <td> 
//           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//                 </td>
//       </tr>`;
//         }
//         else if (cert.core1 != '1' && cert.core2 != '1' && cert.core3 == '1'){
//           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
        
//           <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//           <td>${cert.CoPR_Number}</td>
//           <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-check text-primary fw-bolder"></i></td>
  
  
//           <td> 
//           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//                 </td>
//       </tr>`;
//         }
//         else {
              
//           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
         
//           <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
//           <td>${cert.CoPR_Number}</td>
//           <td>${cert.trainer_firstname} ${cert.trainer_middlename} ${cert.trainer_lastname} </td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
//           <td class="text-center"><i class="fas fa-times text-danger fw-bold"></i></td>
  
  
//           <td> 
//           <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 update_data" name="view" id="${cert.attendance_id} "></i>
//           <i style="font-size:18px;" value="view" class="fas fa-trash text-danger p-0 delete_data" name="view" id="${cert.attendance_id} "></i>
//                 </td>
//       </tr>`;
  
  
//         }
  
//           }
  
//          $("#table_body").html(rows);
  
     
  
//          $('.update_data').on('click',function(){
//           var trainessid = $(this).attr('id');
//           var ups = $(this);
//           console.log(trainessid)
          
  
  
//           let update = 'update';
//           $.ajax({
//             url: 'printaction.php',
//             method :'post',
//             data : {
//               update:update,
//               trainessid:trainessid,
//             },
  
//             success:function(res){
//               $('#updateModal').modal('show')
//               console.log(res)  
             
  
  
       
//               let viewtrs = JSON.parse(res)
//                     let rows = "";     
//                     for(viewtr of viewtrs){
//                       var middle = viewtr.MiddleName[0];
//                       if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
//                         rows += `  
                      
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
  
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                         </div>
//                       </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
//                     </div>`
//                       }
//                       else if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
//                         rows += `  
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                         </div>
//                       </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom">Update</button>
//                     </div>`
//                       }
//                       else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
//                         rows += `  
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                         </div>
//                       </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
//                     </div>`
//                       }
//                       else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
//                         rows += `  
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                         </div>
//                       </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
//                     </div>`
//                       }
//                       else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 != '1'){
//                         rows += `  
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                         </div>
//                       </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
//                     </div>`
//                       }
//                       else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
//                         rows += `  
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                         </div>
//                       </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
//                     </div>`
//                       }
//                       else if(viewtr.core1 != '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
//                         rows += `  
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                         </div>
//                         <br>
//                         <div class="form-check form-check-inline m-2">
//                         <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
//                         <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                         </div>
//                       </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
//                     </div>`
//                       }
//                       else{
//                         rows += `  
//                         <div class="modal-header p-2 px-3">
//                           <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
//                           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
//                         </div>
//                         <div class="modal-body">
  
                        
//                         <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
//                         <p class="text-primary text-center">( ${viewtr.CoPR_Number} )</p>
  
//                           <div class="form-check form-check-inline m-2">
//                           <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
//                           <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
//                           </div>
//                           <br>
//                           <div class="form-check form-check-inline m-2">
//                           <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
//                           <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
//                           </div>
//                           <br>
//                           <div class="form-check form-check-inline m-2">
//                           <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
//                           <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
//                           </div>
//                         </div>
//                         <div class="modal-footer">
//                           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
//                           <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
//                     </div>`
//                       }
                       
                        
//                       }
//                       $('#update_detail').html(rows)
//                       var com1 = ''; 
//                       var com2 = ''; 
//                       var com3 = ''; 
  
//                       $('#updatecom').on('click',function(){
//                         var isChecked = $('.myCheckbox1').is(':checked'); // returns true or false
  
   
//                         if(isChecked == true){
//                           com1 = '1'
//                         }
//                         else{
//                           com1 = '0'
//                         }
                  
//                         var isChecked = $('.myCheckbox2').is(':checked'); // returns true or false
  
   
//                         if(isChecked == true){
//                           com2 = '1'
//                         }
//                         else{
//                           com2 = '0'
//                         }
//                         var isChecked = $('.myCheckbox3').is(':checked'); // returns true or false
  
   
//                         if(isChecked == true){
//                           com3 = '1'
//                         }
//                         else{
//                           com3 = '0'
//                         }
//                         console.log(com1)
//                         console.log(com2)
//                         console.log(com3)
//                         console.log(trainessid)
  
//                         let edit = 'edit';
//                         $.ajax({
//                           url:'printaction.php',
//                           method:'post',
//                           data:{
//                             edit:edit,
//                             trainessid:trainessid,
//                             com1:com1,
//                             com2:com2,
//                             com3:com3,
                   
//                           },
//                           success:function(editres){
//                             console.log(editres)
//                             let editrs = JSON.parse(editres)
//                             console.log(editrs[0])
//                             editrs1 = editrs[0]
//                             editrs2 = editrs[1]
//                             editrs3 = editrs[2]
//                             $('#updateModal').modal('hide')
//                             $('.success').toast('show');
  
//                             if (editrs1 == 1){
//                               ups.parent().siblings().eq(3).html('<i class="fas fa-check text-primary fw-bolder"></i>')
//                             }
//                             else {
//                               console.log('nyaw')
//                               ups.parent().siblings().eq(3).html('<i class="fas fa-times text-danger fw-bold"></i>')
  
//                             }
  
//                             if (editrs2 == 1){
//                               ups.parent().siblings().eq(4).html('<i class="fas fa-check text-primary fw-bolder"></i>')
//                             }
//                             else {
//                               console.log('nyaw')
//                               ups.parent().siblings().eq(4).html('<i class="fas fa-times text-danger fw-bold"></i>')
  
//                             }
  
//                             if (editrs3 == 1){
//                               ups.parent().siblings().eq(5).html('<i class="fas fa-check text-primary fw-bolder"></i>')
//                             }
//                             else {
//                               console.log('nyaw')
//                               ups.parent().siblings().eq(5).html('<i class="fas fa-times text-danger fw-bold"></i>')
  
//                             }
  
                 
                       
  
//                           }
//                         })
  
  
  
  
//                       })
              
//             }
  
//           })
  
  
  
  
  
  
  
       
//         })
      
      
//       }   
      
      
      
//        },
//       });
//       }
  
  
//       function pagination() {
//         $.ajax({
//             url: 'trainesscount.php',
//             method: 'GET',
//             success: function (result) {
//                 pageNum = result / 10;
//                 pageNum = Math.ceil(pageNum);
//                 student_count = result;
     
//                 pagelow = Math.min(pageNum,pagedivfirst);
//                 pagehigh = Math.min(pageNum,pagedivlast);
     
     
//                 let pages = "";
     
//                 for (let i = pagelow; i <= pagehigh; i++) {
//                     pages += `<li class="page-item " id="page-${i}"> <a class="page-link" href="#">${i}</a></li>`;
//                     console.log(pagehigh);
//                     console.log(pagelow);
                    
//                 }
                
                
//                 if(pagehigh == pageNum) {
//                     $('#nextPage').hide()
     
//                 }
//                  if (pagehigh != pageNum){
//                     $('#nextPage').show()
                   
//                 }
//                  if (pagelow == 1){
//                     $('#prevPage').hide()
                    
//                  }
//                  if (pagelow != 1){
//                     $('#prevPage').show()
                    
                    
//                 }
//                 $('.page-list').first().next().after(pages);
//             }
     
        
//         })
     
//      }
     
     
     
//      $('ul').on('click', 'li', function (e) {
//         let page = $(this).text().trim();
     
//         if (page == 'Previous'){
//             lastPage--;
     
//             if (lastPage >= 1){
//               qualification(lastPage);
     
//                 if (pagelow > lastPage) {
//                     pagedivlast-=5;
//                     pagedivfirst-=5;
     
     
//                   for (let p = pagelow; p <= pagehigh; p++) {
//                     $("#page-"+p).hide();
//                   }
     
//                   pagination(pagedivfirst,pagedivlast);
     
//                 }
//             }
     
//             else {
//                 lastPage++;
//             }
     
//             $('.page-item').removeClass('active');
//             $('#page-'+lastPage).addClass('active');
//         }
     
//         else if (page == 'Next'){
     
//             lastPage++;
            
//             if (lastPage <= pageNum){
             
//               qualification(lastPage);
//                 $('.page-item').removeClass('active');
     
//                 if (pagehigh < lastPage) {
//                   pagedivlast+=5;
//                   pagedivfirst+=5;
     
//                   for (let n = pagelow; n <= pagehigh; n++) {
//                         $("#page-"+n).hide();
//                       }
//                    pagination(pagedivfirst,pagedivlast);
//                     }
//             }
     
//             else {
//                 lastPage--;
     
//             }
     
//             $('.page-item').removeClass('active');
//             $('#page-'+lastPage).addClass('active');
//         }
//         else if (page == '>'){
//           lastPage++;
//           pagedivfirst += 5;
//           pagedivlast += 5;
     
//             for (let x = pagelow; x <= pagehigh; x++) {
//               $("#page-"+x).hide();
//             }
//             if (lastPage <= pageNum){
//               qualification(pagehigh+1);
//                 pagination(pagedivfirst,pagedivlast);
     
//               }
//             else {
//               lastPage--;
//             }
//             $('.page-item').removeClass('active');
//               $('#page-'+lastPage).addClass('active');
     
//         }
//         else if (page == '<'){
//           lastPage--;
//           pagedivfirst -= 5;
//           pagedivlast -= 5;
     
//             for (let y = pagelow; y <= pagehigh; y++) {
//               $("#page-"+y).hide();
//             }
//             if (lastPage <= pageNum){
//               qualification(pagelow-5);
//                 pagination(pagedivfirst,pagedivlast);
     
     
//               }
//             else {
//               lastPage--;
//             }
//             $('.page-item').removeClass('active');
//             $('#page-'+lastPage).addClass('active');
//               //$('#page-'+lastPage).addClass('active').siblings().removeClass('active');
     
//         }
     
//         else {
//             lastPage = page;
//             qualification(page);
//             $(this).addClass('active').siblings().removeClass('active');
//         }
//      });
  
     
//      $('#import').on('click',function(){
//       $('#csvselection').modal('show')
//   })
  
  
  
  
  
//   $('#importing').on('submit',function(){
//     $.ajax({
//       url: "./php/importcsv.php",
//       method: "post",
//       data:
//       new FormData(this),
//       dataType: "json",
//       contentType: false,
//       cache: false,
//       processData: false,
  
//       success: function (importsuccess) {
//         console.log(importsuccess)
//         // if (importsuccess == 1) {
//         //   window.location.href = "php/tipattendance.php";
  
//         // } 
//         // else if(importsuccess == 2){
  
//         //   console.log('probleminimporting')
  
//         // }
//         // else {
//         //   console.log('probleminimporting')
  
//         // }
//       },
//     });
//   })
//       $('#dropdown_logout').on('click',function(){
//         $('#logoutModal').modal('show');
//       })
  
//   $('#logouts').on('click',function(){
//     $.ajax({
//         url: "logout.php",
//         success: function(data){
//           if(data == 1){
//                window.location.href ='http://localhost/DocumentationSystem/index.php'
//           }
//         }
//       })
//   })
  
     
     
     
  
          
      
      
    })