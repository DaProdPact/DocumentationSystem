$(document).ready(function(){
  
    $('#printcertatserncii_basic').hide();
    $('#printcertatserncii_common').hide();
    $('#printcertatserncii_core').hide();



    
  $('body').click(function(){
    $('#printcertatserncii_basic').hide();
      $('#printcertatserncii_common').hide();
    $('#printcertatserncii_core').hide();


  })


  // printcertemncii_basic
  $('#print_basic').on('click',function(){
    $('#printcertatserncii_basic').hide();
    $('#printcertatserncii_common').show();
    $('#printcertatserncii_core').hide();


    window.print();

    console.log('wow')

  })


      qualification
      
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
  return (date + " " + time);  
             }

  function qualification(page) {
    var getcommon = 'getcommon'
  $.ajax({ 

   url: "connection_progresschart_atserncii.php?page=" + page,
   method: "GET",
   data:{
    getcommon:getcommon,
   },
   success: function (res) {
     console.log(res);
   
  
     if(res == 2){
           
     $("#table_body").html(`<tr class="table-active">
     <td colspan="6" class="text-center"> No Record Found </td>
     </tr>`);
  
     }
     else{
     let certs = JSON.parse(res);
  
  
     let rows = "";
     for (cert of certs) {


      console.log(cert.attendance_id);

       rows += `<tr class="table-active p-0 update_data" style="height: 9px; width:50px; font-size:11px;"  id="${cert.attendance_id} ">
       <td colspan="3 fw-bold">${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>

       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common1_1}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common1_2}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common1_3}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common1_4}</td>


       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common2_1}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common2_2}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common2_3}</td>


       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common3_1}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common3_2}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common3_3}</td>
 
       
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common4_1}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common4_2}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common4_3}</td>

       
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common5_1}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common5_2}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common5_3}</td>


       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common6_1}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common6_2}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common6_3}</td>
       

       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common7_1}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common7_2}</td>
       <td class="text-center fw-bold p-3" style="width:10px;">${cert.lmar_atserncii_common7_3}</td>




      </tr>`;


    



      }

     $("#table_body").html(rows);





     $('.update_data').on('click',function(){
      var trainessid = $(this).attr('id');
      console.log(trainessid)


      let updatecommon = 'updatecommon';
      $.ajax({
        url: 'connection_progresschart_atserncii.php',
        method :'post',
        data : {
        updatecommon:updatecommon,
          trainessid:trainessid,
        },success:function(response){
          console.log(response)
          let data = "";
  
          let trainess = JSON.parse(response);
          for (trainee of trainess){
            
          
          $('#updateModal').modal('show')
      
     

    
          data += `<div class="modal-header p-2 px-3">

          <h5 class="modal-title text-primary" id="exampleModalLabel">  Common Competencies</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
  
  
        
          
        <div class="form-check form-check-inline d-flex row bg-primary rounded-1 ms-2 sticky-top ps-3 py-2 rounded-3">
        <div class="col-11 pt-1">
        <p class="text-white fw-bold" style="font-size:25px;">${trainee.FirstName} ${trainee.MiddleName[0]} ${trainee.LastName}</p>
        </div>
        <div class="col-1 ps-3 pt-1 justify-content-end">
        <input class="form-check-input p-2 checkall" type="checkbox" style="height:30px; width:30px;"/>
        </div>

       

        </div>


                          
        <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
        <div class="col-11 pt-1">
        <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">I. VALIDATE VEHICLE SPECIFICATION</p>	
        </div>
        <div class="col-1 ps-3 pt-1 justify-content-end">
        <input class="form-check-input p-2 checkall1" type="checkbox" style="height:30px; width:30px;"/>
        </div>

       

        </div>
  
        
  
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common1_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Check body type of
          the vehicle  
          </label>
          </div>
  
          <br>
          

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common1_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Use Check vehicle
          engine type
</label>
          </div>
  
          <br>
  
  
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common1_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Check vehicle
          specifications

          </label>
          </div>
  
  
          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common1_4" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.4 Complete
          validation of vehicle specification

          </label>
          </div>
  
  
          <br>
    

        <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
        <div class="col-11 pt-1">
        <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">II. MOVE AND POSITION VEHICLE</p>	
        </div>
        <div class="col-1 ps-3 pt-1 justify-content-end">
        <input class="form-check-input p-2 checkall2" type="checkbox" style="height:30px; width:30px;"/>
        </div>


        </div>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common2_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Prepare vehicle for
          operation </label>
          </div>
  
  

          <br>
    

  
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common2_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Position vehicle  </label>
          </div>


          <br>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common2_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Park and stop the
          vehicle

          </label>
          </div>





          <br>
  
  
  

          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">III. UTILIZE AUTOMOTIVE TOOLS </p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall3" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
  
          </div>
  
  
  

          
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common3_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Prepare
          automotive tools </label>
          </div>




          <br>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common3_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Use automotive
          tools

          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common3_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Maintain
          automotive tools

          </label>
          </div>

          <br>

    
          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">IV PERFORM MENSURATION AND CALCULATION </p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall4" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
  
          </div>

        
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common4_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Select measuring
          instruments
 
          </label>
          </div>

          <br>
    

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common4_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Carry out
          measurements and calculation

          </label>
          </div>

          <br>
    
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common4_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Maintain
          measuring instruments

          interests
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">V.UTILIZE WORKSHOP FACILITIES AND EQUIPMENT </p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall5" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
  
          </div>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common5_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Perform pre-operation activities

          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common5_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Use facilities and equipment
          </label>
          </div>

          <br>
    
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common5_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Conduct postoperation activities 

          </label>
          </div>

          <br>

          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">VI.PREPARE SERVICING PARTS AND CONSUMABLES </p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall6" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
  
          </div>
                

  

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common6_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Identify parts and consumables
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common6_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Retrieve and withdraw parts and consumables
          </label>
          </div>

          <br>
    
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common6_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Complete work process
          </label>
          </div>

          <br>


          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">VII. PREPARE VEHICLE FOR SERVICING AND RELEASING </p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall7" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
  
          </div>

  

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common7_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Receive vehicle 
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common7_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Prepare vehicle for servicing  
          </label>
          </div>

          <br>
    
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_atserncii_common7_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Prepare vehicle for releasing
          </label>
          </div>

          <br>

    
  
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
      </div>
      `
    


    // if(cert = ' lmar_atserncii_common1_2/'){
    //   $(".lmar_eimncii_common1_2").prop("checked", true);
    //   console.log('now')
    // }
    // else{
    //   $(".lmar_eimncii_basic1_2").prop("checked", false);
    //   console.log('nows')
    // }

        }

    $("#update_detail").html(data);
    
    var checkall = $('.checkall'); 

    checkall.on('change',function(){
      if (this.checked) {
        $('.checkall1').prop("checked", true);
        $(".lmar_atserncii_common1_1").prop("checked", true);
        $(".lmar_atserncii_common1_2").prop("checked", true);
        $(".lmar_atserncii_common1_3").prop("checked", true);
        $(".lmar_atserncii_common1_4").prop("checked", true);




        $('.checkall2').prop("checked", true);
        $(".lmar_atserncii_common2_1").prop("checked", true);
        $(".lmar_atserncii_common2_2").prop("checked", true);
        $(".lmar_atserncii_common2_3").prop("checked", true);

        $('.checkall3').prop("checked", true);
        $(".lmar_atserncii_common3_1").prop("checked", true);
        $(".lmar_atserncii_common3_2").prop("checked", true);
        $(".lmar_atserncii_common3_3").prop("checked", true);



        $('.checkall4').prop("checked", true);
        $(".lmar_atserncii_common4_1").prop("checked", true);
        $(".lmar_atserncii_common4_2").prop("checked", true);
        $(".lmar_atserncii_common4_3").prop("checked", true);

        $('.checkall5').prop("checked", true);
        $(".lmar_atserncii_common5_1").prop("checked", true);
        $(".lmar_atserncii_common5_2").prop("checked", true);
        $(".lmar_atserncii_common5_3").prop("checked", true);

        $('.checkall6').prop("checked", true);
        $(".lmar_atserncii_common6_1").prop("checked", true);
        $(".lmar_atserncii_common6_2").prop("checked", true);
        $(".lmar_atserncii_common6_3").prop("checked", true);


        $('.checkall7').prop("checked", true);
        $(".lmar_atserncii_common7_1").prop("checked", true);
        $(".lmar_atserncii_common7_2").prop("checked", true);
        $(".lmar_atserncii_common7_3").prop("checked", true);


      } 
      else{
        $('.checkall1').prop("checked", false);
        $(".lmar_atserncii_common1_1").prop("checked", false);
        $(".lmar_atserncii_common1_2").prop("checked", false);
        $(".lmar_atserncii_common1_3").prop("checked", false);
        $(".lmar_atserncii_common1_4").prop("checked", false);




        $('.checkall2').prop("checked", false);
        $(".lmar_atserncii_common2_1").prop("checked", false);
        $(".lmar_atserncii_common2_2").prop("checked", false);
        $(".lmar_atserncii_common2_3").prop("checked", false);

        $('.checkall3').prop("checked", false);
        $(".lmar_atserncii_common3_1").prop("checked", false);
        $(".lmar_atserncii_common3_2").prop("checked", false);
        $(".lmar_atserncii_common3_3").prop("checked", false);



        $('.checkall4').prop("checked", false);
        $(".lmar_atserncii_common4_1").prop("checked", false);
        $(".lmar_atserncii_common4_2").prop("checked", false);
        $(".lmar_atserncii_common4_3").prop("checked", false);

        $('.checkall5').prop("checked", false);
        $(".lmar_atserncii_common5_1").prop("checked", false);
        $(".lmar_atserncii_common5_2").prop("checked", false);
        $(".lmar_atserncii_common5_3").prop("checked", false);

        $('.checkall6').prop("checked", false);
        $(".lmar_atserncii_common6_1").prop("checked", false);
        $(".lmar_atserncii_common6_2").prop("checked", false);
        $(".lmar_atserncii_common6_3").prop("checked", false);


        $('.checkall7').prop("checked", false);
        $(".lmar_atserncii_common7_1").prop("checked", false);
        $(".lmar_atserncii_common7_2").prop("checked", false);
        $(".lmar_atserncii_common7_3").prop("checked", false);


      }
    })

        
    var checkall1 = $('.checkall1'); 

    checkall1.on('change',function(){
        if (this.checked) {
          $(".lmar_atserncii_common1_1").prop("checked", true);
          $(".lmar_atserncii_common1_2").prop("checked", true);
          $(".lmar_atserncii_common1_3").prop("checked", true);
          $(".lmar_atserncii_common1_4").prop("checked", true);
  
        }
        else{
          $(".lmar_atserncii_common1_1").prop("checked", false);
          $(".lmar_atserncii_common1_2").prop("checked", false);
          $(".lmar_atserncii_common1_3").prop("checked", false);
          $(".lmar_atserncii_common1_4").prop("checked", false);
  
        }
      })
      
      var checkall2 = $('.checkall2'); 

      checkall2.on('change',function(){
        if (this.checked) {
          $(".lmar_atserncii_common2_1").prop("checked", true);
          $(".lmar_atserncii_common2_2").prop("checked", true);
          $(".lmar_atserncii_common2_3").prop("checked", true);
        } 
        else{
          $(".lmar_atserncii_common2_1").prop("checked", false);
          $(".lmar_atserncii_common2_2").prop("checked", false);
          $(".lmar_atserncii_common2_3").prop("checked", false);

          console.log('wow')
        }   
      });

      var checkall3 = $('.checkall3'); 

      checkall3.on('change',function(){
        if (this.checked) {
          $(".lmar_atserncii_common3_1").prop("checked", true);
          $(".lmar_atserncii_common3_2").prop("checked", true);
          $(".lmar_atserncii_common3_3").prop("checked", true);
        } 
        else{
          $(".lmar_atserncii_common3_1").prop("checked", false);
          $(".lmar_atserncii_common3_2").prop("checked", false);
          $(".lmar_atserncii_common3_3").prop("checked", false);
  
  
          console.log('wow')
        }   
        
        
      });


      var checkall4 = $('.checkall4'); 

      checkall4.on('change',function(){
      if (this.checked) {
        $(".lmar_atserncii_common4_1").prop("checked", true);
        $(".lmar_atserncii_common4_2").prop("checked", true);
        $(".lmar_atserncii_common4_3").prop("checked", true);

        } 
      else{
        $(".lmar_atserncii_common4_1").prop("checked", false);
        $(".lmar_atserncii_common4_2").prop("checked", false);
        $(".lmar_atserncii_common4_3").prop("checked", false);
          console.log('wow')
        }   
        
        
      });
      var checkall5 = $('.checkall5'); 

      checkall5.on('change',function(){
          if (this.checked) {
            $(".lmar_atserncii_common5_1").prop("checked", true);
            $(".lmar_atserncii_common5_2").prop("checked", true);
            $(".lmar_atserncii_common5_3").prop("checked", true);
  
  
  
        } 
        else{
          $(".lmar_atserncii_common5_1").prop("checked", false);
          $(".lmar_atserncii_common5_2").prop("checked", false);
          $(".lmar_atserncii_common5_3").prop("checked", false);
  
  
          console.log('wow')
        }   
        
        
      });

              
      var checkall6 = $('.checkall6'); 

      checkall6.on('change',function(){
          if (this.checked) {
            $(".lmar_atserncii_common6_1").prop("checked", true);
            $(".lmar_atserncii_common6_2").prop("checked", true);
            $(".lmar_atserncii_common6_3").prop("checked", true);
    
  
  
  
        } 
        else{
          $(".lmar_atserncii_common6_1").prop("checked", false);
          $(".lmar_atserncii_common6_2").prop("checked", false);
          $(".lmar_atserncii_common6_3").prop("checked", false);
  
  
          console.log('wow')
        }   
        
        
      });

      var checkall7 = $('.checkall7'); 

      checkall7.on('change',function(){
          if (this.checked) {
            $(".lmar_atserncii_common7_1").prop("checked", true);
            $(".lmar_atserncii_common7_2").prop("checked", true);
            $(".lmar_atserncii_common7_3").prop("checked", true);
  
  
        } 
        else{
          $(".lmar_atserncii_common7_1").prop("checked", false);
          $(".lmar_atserncii_common7_2").prop("checked", false);
          $(".lmar_atserncii_common7_3").prop("checked", false);
          console.log('wow')
        }   
        
        
      });

      
    if(trainee.lmar_atserncii_common1_1 == '/' && trainee.lmar_atserncii_common1_2 == '/' && trainee.lmar_atserncii_common1_3 == '/' && trainee.lmar_atserncii_common1_4 == '/' && trainee.lmar_atserncii_common2_1 == '/' && trainee.lmar_atserncii_common2_2== '/' && trainee.lmar_atserncii_common2_3 == '/' && trainee.lmar_atserncii_common3_1 == '/' && trainee.lmar_atserncii_common3_2 == '/' && trainee.lmar_atserncii_common3_3 == '/'  && trainee.lmar_atserncii_common4_1 == '/' && trainee.lmar_atserncii_common4_2 == '/' && trainee.lmar_atserncii_common4_3 == '/' && trainee.lmar_atserncii_common5_1 == '/' && trainee.lmar_atserncii_common5_2 == '/' && trainee.lmar_atserncii_common5_3 == '/' && trainee.lmar_atserncii_common6_1 == '/' && trainee.lmar_atserncii_common6_2 == '/' && trainee.lmar_atserncii_common6_3 == '/' && trainee.lmar_atserncii_common7_1 == '/' && trainee.lmar_atserncii_common7_2 == '/' && trainee.lmar_atserncii_common7_3 == '/' ){


      $(".checkall").prop("checked", true);
      console.log('nowddd')
    }
    else{
    $(".checkall").prop("checked", false);
      console.log('nowsddd')
    }

    if(trainee.lmar_atserncii_common1_1 == '/' && trainee.lmar_atserncii_common1_2 == '/' && trainee.lmar_atserncii_common1_3 == '/' && trainee.lmar_atserncii_common1_4 == '/' ){

      $(".checkall1").prop("checked", true);

      console.log('now')
    }
    else{
      $(".checkall1").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_atserncii_common2_1 == '/' && trainee.lmar_atserncii_common2_2 == '/' && trainee.lmar_atserncii_common2_3 == '/' ){

      $(".checkall2").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall2").prop("checked", false);


      console.log('nows')
    }

    
    if(trainee.lmar_atserncii_common3_1 == '/' && trainee.lmar_atserncii_common3_2 == '/' && trainee.lmar_atserncii_common3_3 == '/' ){

      $(".checkall3").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall3").prop("checked", false);


      console.log('nows')
    }

    
    if(trainee.lmar_atserncii_common4_1 == '/' && trainee.lmar_atserncii_common4_2 == '/' && trainee.lmar_atserncii_common4_3 == '/' ){

      $(".checkall4").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall4").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_atserncii_common5_1 == '/' && trainee.lmar_atserncii_common5_2 == '/' && trainee.lmar_atserncii_common5_3 == '/' ){

      $(".checkall5").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall5").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_atserncii_common6_1 == '/' && trainee.lmar_atserncii_common6_2 == '/' && trainee.lmar_atserncii_common6_3 == '/'){

      $(".checkall6").prop("checked", true);

      console.log('now')
    }
    else{
      $(".checkall6").prop("checked", false);


      console.log('nows')
    }


    if(trainee.lmar_atserncii_common7_1 == '/' && trainee.lmar_atserncii_common7_2 == '/' && trainee.lmar_atserncii_common7_3 == '/'){

      $(".checkall7").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall7").prop("checked", false);


      console.log('nows')
    }




    
    if(trainee.lmar_atserncii_common1_1 == '/'){
        $(".lmar_atserncii_common1_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common1_1").prop("checked", false);
        console.log('nowss')
      }
  
      if(trainee.lmar_atserncii_common1_2 == '/'){
        $(".lmar_atserncii_common1_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common1_2").prop("checked", false);
        console.log('nows')
      }
  
      
      if(trainee.lmar_atserncii_common1_3 == '/'){
        $(".lmar_atserncii_common1_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common1_3").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_atserncii_common1_4 == '/'){
        $(".lmar_atserncii_common1_4").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common1_4").prop("checked", false);
        console.log('nows')
      }
  
      
       
      if(trainee.lmar_atserncii_common2_1 == '/'){
        $(".lmar_atserncii_common2_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common2_1").prop("checked", false);
        console.log('nows')
      }
  
  
      if(trainee.lmar_atserncii_common2_2 == '/'){
        $(".lmar_atserncii_common2_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common2_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_atserncii_common2_3 == '/'){
        $(".lmar_atserncii_common2_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common2_3").prop("checked", false);
        console.log('nows')
      }
  
  
      if(trainee.lmar_atserncii_common3_1 == '/'){
        $(".lmar_atserncii_common3_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common3_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_atserncii_common3_2 == '/'){
        $(".lmar_atserncii_common3_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common3_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_atserncii_common3_3 == '/'){
        $(".lmar_atserncii_common3_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common3_3").prop("checked", false);
        console.log('nows')
      }
  
  
  
      if(trainee.lmar_atserncii_common4_1 == '/'){
        $(".lmar_atserncii_common4_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common4_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_atserncii_common4_2 == '/'){
        $(".lmar_atserncii_common4_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common4_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_atserncii_common4_3 == '/'){
        $(".lmar_atserncii_common4_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common4_3").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_atserncii_common5_1 == '/'){
        $(".lmar_atserncii_common5_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common5_1").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_atserncii_common5_2 == '/'){
        $(".lmar_atserncii_common5_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common5_2").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_atserncii_common5_3 == '/'){
        $(".lmar_atserncii_common5_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common5_3").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_atserncii_common6_1 == '/'){
        $(".lmar_atserncii_common6_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common6_1").prop("checked", false);
        console.log('nowss')
      }
  
      if(trainee.lmar_atserncii_common6_2 == '/'){
        $(".lmar_atserncii_common6_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common6_2").prop("checked", false);
        console.log('nows')
      }
  
      
      if(trainee.lmar_atserncii_common6_3 == '/'){
        $(".lmar_atserncii_common6_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common6_3").prop("checked", false);
        console.log('nows')
      }
  
  
  
      if(trainee.lmar_atserncii_common7_1 == '/'){
        $(".lmar_atserncii_common7_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common7_1").prop("checked", false);
        console.log('nowss')
      }
  
      if(trainee.lmar_atserncii_common7_2 == '/'){
        $(".lmar_atserncii_common7_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common7_2").prop("checked", false);
        console.log('nows')
      }
  
      
      if(trainee.lmar_atserncii_common7_3 == '/'){
        $(".lmar_atserncii_common7_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_atserncii_common7_3").prop("checked", false);
        console.log('nows')
      }
  

  

    

    console.log(trainessid)

    let edit_common = 'edit_common';
    $('#updatecom').on('click',function(){
 

        var isChecked1_1 = $('.lmar_atserncii_common1_1').is(':checked'); 
        var isChecked1_2 = $('.lmar_atserncii_common1_2').is(':checked'); 
        var isChecked1_3 = $('.lmar_atserncii_common1_3').is(':checked'); 
        var isChecked1_4 = $('.lmar_atserncii_common1_4').is(':checked'); 
  
        var isChecked2_1 = $('.lmar_atserncii_common2_1').is(':checked'); 
        var isChecked2_2 = $('.lmar_atserncii_common2_2').is(':checked'); 
        var isChecked2_3 = $('.lmar_atserncii_common2_3').is(':checked'); 
  
        var isChecked3_1 = $('.lmar_atserncii_common3_1').is(':checked'); 
        var isChecked3_2 = $('.lmar_atserncii_common3_2').is(':checked'); 
        var isChecked3_3 = $('.lmar_atserncii_common3_3').is(':checked');
  
        var isChecked4_1 = $('.lmar_atserncii_common4_1').is(':checked'); 
        var isChecked4_2 = $('.lmar_atserncii_common4_2').is(':checked'); 
        var isChecked4_3 = $('.lmar_atserncii_common4_3').is(':checked'); 
  
  
        var isChecked5_1 = $('.lmar_atserncii_common5_1').is(':checked'); 
        var isChecked5_2 = $('.lmar_atserncii_common5_2').is(':checked'); 
        var isChecked5_3 = $('.lmar_atserncii_common5_3').is(':checked'); 
  
        var isChecked6_1 = $('.lmar_atserncii_common6_1').is(':checked'); 
        var isChecked6_2 = $('.lmar_atserncii_common6_2').is(':checked'); 
        var isChecked6_3 = $('.lmar_atserncii_common6_3').is(':checked'); 
  
        var isChecked7_1 = $('.lmar_atserncii_common7_1').is(':checked'); 
        var isChecked7_2 = $('.lmar_atserncii_common7_2').is(':checked'); 
        var isChecked7_3 = $('.lmar_atserncii_common7_3').is(':checked'); 
  

 
 
        if(isChecked1_1 == true){
            com1_1 = '/'
          }
          else{
            com1_1 = ''
          }
          if(isChecked1_2 == true){
            com1_2 = '/'
          }
          else{
            com1_2 = ''
          }
          if(isChecked1_3 == true){
            com1_3 = '/'
          }
          else{
            com1_3 = ''
          }
    
          if(isChecked1_4 == true){
            com1_4 = '/'
          }
          else{
            com1_4 = ''
          }
    
    
          if(isChecked2_1 == true){
            com2_1 = '/'
          }
          else{
            com2_1 = ''
          }
          if(isChecked2_2 == true){
            com2_2 = '/'
          }
          else{
            com2_2 = ''
          }
          if(isChecked2_3 == true){
            com2_3 = '/'
          }
          else{
            com2_3 = ''
          }
    
    
          if(isChecked3_1 == true){
            com3_1 = '/'
          }
          else{
            com3_1 = ''
          }
          if(isChecked3_2 == true){
            com3_2 = '/'
          }
          else{
            com3_2 = ''
          }
          if(isChecked3_3 == true){
            com3_3 = '/'
          }
          else{
            com3_3 = ''
          }
         
    
    
          if(isChecked4_1 == true){
            com4_1 = '/'
          }
          else{
            com4_1 = ''
          }
          if(isChecked4_2 == true){
            com4_2 = '/'
          }
          else{
            com4_2 = ''
          }
          if(isChecked4_3 == true){
            com4_3 = '/'
          }
          else{
            com4_3 = ''
          }
        
    
          if(isChecked5_1 == true){
            com5_1 = '/'
          }
          else{
            com5_1 = ''
          }
          if(isChecked5_2 == true){
            com5_2 = '/'
          }
          else{
            com5_2 = ''
          }
          if(isChecked5_3 == true){
            com5_3 = '/'
          }
          else{
            com5_3 = ''
          }
    
           
          if(isChecked6_1 == true){
            com6_1 = '/'
          }
          else{
            com6_1 = ''
          }
          if(isChecked6_2 == true){
            com6_2 = '/'
          }
          else{
            com6_2 = ''
          }
          if(isChecked6_3 == true){
            com6_3 = '/'
          }
          else{
            com6_3 = ''
          }
    
          
    
          if(isChecked7_1 == true){
            com7_1 = '/'
          }
          else{
            com7_1 = ''
          }
          if(isChecked7_2 == true){
            com7_2 = '/'
          }
          else{
            com7_2 = ''
          }
          if(isChecked7_3 == true){
            com7_3 = '/'
          }
          else{
            com7_3 = ''
          }

      console.log(com1_1)
   
      console.log(com1_3)


      $.ajax({
        url: 'connection_progresschart_atserncii.php',
        method :'post',
        data : {
        edit_common:edit_common,
          trainessid:trainessid,
          com1_1:com1_1,
          com1_2:com1_2,
          com1_3:com1_3,
          com1_4:com1_4,

          com2_1:com2_1,
          com2_2:com2_2,
          com2_3:com2_3,

          com3_1:com3_1,
          com3_2:com3_2,
          com3_3:com3_3,

          com4_1:com4_1,
          com4_2:com4_2,
          com4_3:com4_3,

          com5_1:com5_1,
          com5_2:com5_2,
          com5_3:com5_3,

          com6_1:com6_1,
          com6_2:com6_2,
          com6_3:com6_3,

          com7_1:com7_1,
          com7_2:com7_2,
          com7_3:com7_3,

 

        },success:function(response){
          console.log(response)
          if(response == '1'){
                          
          
          $('#updateModal').modal('hide')
      
            $('#successdeleteModal').modal('show');
            setTimeout(
              function() 
              {
                window.location.href ='common_atserncii_progresschart.php'

              }, 1000);
          }

        }
      })
    })

  
  
  
        }

        



      })

     


     })

    }
  }
  })
     

 
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
          qualification(lastPage);
 
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
         
          qualification(lastPage);
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
          qualification(pagehigh+1);
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
          qualification(pagelow-5);
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
        qualification(page);
        $(this).addClass('active').siblings().removeClass('active');
    }
 });

 
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
  $('#dropdown_logout').on('click',function(){
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