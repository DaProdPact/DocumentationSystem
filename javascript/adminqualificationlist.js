$(document).ready(function () {


  $('#addqualification').on('click',function(){
    $('#addModal').modal('show')

  })



  $('#addqualificationbtn').on('click',function(){
    var addqualificationname = $('#addqualificationname').val();
    var gets = $('#qualification_registered option:selected').text();
    var addqualificationcode = $('#addqualificationcode').val();
    var qualification_registered = $('#qualification_registered').val();
    var qualinc = addqualificationname+" "+gets;

    

    console.log(qualinc);
    console.log(addqualificationcode);
    console.log(qualification_registered);


    let add = 'add';
    $.ajax({
      url:'adminqualificationlistaction.php',
      method:'post',
      data:{
        add:add,
        qualinc:qualinc,
        addqualificationcode:addqualificationcode,
        qualification_registered:qualification_registered
      },
      success:function(res){
      $('#addModal').modal('hide')

        $('#successAddedModal').modal('show');
        setTimeout(
          function() 
          {
            window.location.href ='http://localhost/DocumentationSystem/admin/adminqualificationlist.php'

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
      
      var my_date_format = function(input){
      var d = new Date(Date.parse(input.replace(/-/g, "/")));
      var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
      var date = month[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
      var time = d.toLocaleTimeString().toLowerCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
      return (date + " " + time);  
                 }
      
      function qualipage(page) {
   
      $.ajax({ 
       url: "adminqualificationlistaction.php?page=" + page,
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
      
           rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
               <td style="width:45%;">${request.qualification_title}</td>
               <td style="width:45%;">${request.qualification_code}</td> 
               <td> 
               <i style="font-size:18px;" value="view" class="fas fa-eye text-success p-0 pe-1 view_data" name="view" id="${request.qualification_id} "></i>
               <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 pe-1 edit_data" name="view" id="${request.qualification_id} "></i>
               <i style="font-size:18px;" value="view" class="fas fa-trash-alt text-danger p-0 delete_data" name="view" id="${request.qualification_id}"></i>
                 </td>
           </tr>`;
         }
         $("#table_body").html(rows);

         $('#searchtrainees').on('keyup',function(){
          var search = $('#searchtrainees').val()
          console.log(search)

          $.ajax({
            url: "adminqualificationlistaction.php",
            method: "post",
            data: {
              search: search,
            },
            success: function (res) {
              console.log(res)






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
               <td style="width:45%;">${request.qualification_title}</td>
               <td style="width:45%;">${request.qualification_code}</td> 
               <td> 
               <i style="font-size:18px;" value="view" class="fas fa-eye text-success p-0 pe-1 view_data" name="view" id="${request.qualification_id} "></i>
               <i style="font-size:18px;" value="view" class="fas fa-edit text-primary p-0 pe-1 edit_data" name="view" id="${request.qualification_id} "></i>
               <i style="font-size:18px;" value="view" class="fas fa-trash-alt text-danger p-0 delete_data" name="view" id="${request.qualification_id}"></i>
                 </td>
           </tr>`;
         }
         $("#table_body").html(rows);





         $('.delete_data').on('click',function(){
          var remove = $(this).attr('id')
          console.log(remove)

          $('#removeModal').modal('show')

          var deletedarea = "";
          deletedarea += `
          <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="exampleModalLabel">Delete Qualification</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Are you sure you want to delete this qualification ? </div>
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
                url:'adminqualificationlistaction.php',
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
                    window.location.href ='http://localhost/DocumentationSystem/admin/adminqualificationlist.php'
    
                  }, 1000);
                }
              })

         })
         })


         $('.view_data').on('click',function(){
          var views = $(this).attr('id')
          console.log(views)
          let view_com = 'view_com'
          $.ajax({
            url:'adminqualificationlistaction.php',
            method:'post',
            data:{
              view_com:view_com,
              views:views,
            },
            success:function(response){
                window.location.href ='http://localhost/DocumentationSystem/admin/admincompetencies.php'
                // console.log('grr',response)

            }
          })
         })
         


         $('.edit_data').on('click',function(){
          var editid = $(this).attr('id')
          var edited = $(this);


          console.log(editid)
          $('#dataModal').modal('show')

          let edit = 'edit';
          $.ajax({
            url:'adminqualificationlistaction.php',
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
                    <input type="text" class="form-control" id="qualificationname" placeholder="Qualification Name" value="${edit.qualification_title}">
                  </div>
                  
               </div>

               <div class="col-12">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="qualificationcode" placeholder="Qualification Code" value="${edit.qualification_code}">
                  </div>
               </div>

               </div>
             
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.qualification_id}">Update Qualification</button>
              </div>
              
              `

           

              }

              $('#data_detail').html(rows)








              $('.update_detail').on('click',function(){
                var upd = $(this).attr('id')
                console.log(upd)

                var qualificationname = $('#qualificationname').val();
                var qualificationcode = $('#qualificationcode').val();

                console.log(qualificationname)
                console.log(qualificationcode)



                let update = 'update'

                $.ajax({
                  url:'adminqualificationlistaction.php',
                  method:'post',
                  data:{
                    update:update,
                    upd:upd,
                    qualificationname:qualificationname,
                    qualificationcode:qualificationcode,
                    
                  },
                  success:function(response){
                      $('#dataModal').modal('hide')
                      edited.parent().siblings().eq(0).text(qualificationname)
                      edited.parent().siblings().eq(1).text(qualificationcode)
      
                      edited.closest('tr').animate({
                        backgroundColor: '#75c2e6',
                      },2000).animate({
                        backgroundColor: 'white',
                      },2000).appendTo($('#table_body'));

                  }
                })
              })

              

            }
          })

         })
      
    
    
      
      }   







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
          <h5 class="modal-title text-white" id="exampleModalLabel">Delete Qualification</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Are you sure you want to delete this qualification ? </div>
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
                url:'adminqualificationlistaction.php',
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
                    window.location.href ='http://localhost/DocumentationSystem/admin/adminqualificationlist.php'
    
                  }, 1000);
                }
              })

         })
         })


         $('.view_data').on('click',function(){
          var views = $(this).attr('id')
          console.log(views)
          let view_com = 'view_com'
          $.ajax({
            url:'adminqualificationlistaction.php',
            method:'post',
            data:{
              view_com:view_com,
              views:views,
            },
            success:function(response){
                window.location.href ='http://localhost/DocumentationSystem/admin/admincompetencies.php'
                // console.log('grr',response)

            }
          })
         })
         


         $('.edit_data').on('click',function(){
          var editid = $(this).attr('id')
          var edited = $(this);


          console.log(editid)
          $('#dataModal').modal('show')

          let edit = 'edit';
          $.ajax({
            url:'adminqualificationlistaction.php',
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
                    <input type="text" class="form-control" id="qualificationname" placeholder="Qualification Name" value="${edit.qualification_title}">
                  </div>
                  
               </div>

               <div class="col-12">
                  <div class="mb-3">
                    <input type="text" class="form-control" id="qualificationcode" placeholder="Qualification Code" value="${edit.qualification_code}">
                  </div>
               </div>

               </div>
             
                <div
                class="modal-footer rounded-0 py-2"
                style="background-color: rgb(112 108 251 / 75%);"
              >
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary update_detail" name="get_details" id="${edit.qualification_id}">Update Qualification</button>
              </div>
              
              `

           

              }

              $('#data_detail').html(rows)








              $('.update_detail').on('click',function(){
                var upd = $(this).attr('id')
                console.log(upd)

                var qualificationname = $('#qualificationname').val();
                var qualificationcode = $('#qualificationcode').val();

                console.log(qualificationname)
                console.log(qualificationcode)



                let update = 'update'

                $.ajax({
                  url:'adminqualificationlistaction.php',
                  method:'post',
                  data:{
                    update:update,
                    upd:upd,
                    qualificationname:qualificationname,
                    qualificationcode:qualificationcode,
                    
                  },
                  success:function(response){
                      $('#dataModal').modal('hide')
                      edited.parent().siblings().eq(0).text(qualificationname)
                      edited.parent().siblings().eq(1).text(qualificationcode)
      
                      edited.closest('tr').animate({
                        backgroundColor: '#75c2e6',
                      },2000).animate({
                        backgroundColor: 'white',
                      },2000).appendTo($('#table_body'));

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
             url: 'adminqualificationlistcount.php',
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