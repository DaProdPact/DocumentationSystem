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
  
        $('#printcertatserncii_core').show();
      
  
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
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core1_1}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core1_2}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core1_3}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core1_4}</td>
       
  
  
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core2_1}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core2_2}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core2_3}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core2_4}</td>
  
     
  
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core3_1}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core3_2}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core3_3}</td>
         <td class="text-center fw-bold p-3" style="width:20px;">${cert.lmar_atserncii_core3_4}</td>
  
  
  
        </tr>`;
  
        }
  
       $("#table_body").html(rows);
  
  
  
  
  
       $('.update_data').on('click',function(){
        var trainessid = $(this).attr('id');
        console.log(trainessid)
      
  
        var updatecommon = 'updatecommon';
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
  
            <h5 class="modal-title text-primary" id="exampleModalLabel">Core Competencies</h5>
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
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">I. DIAGNOSE AND REPAIR ENGINE COOLING AND
          LUBRICATION SYSTEM</p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall1" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
          </div>
     
         
                  
            
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core1_1" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1"> L.O.1 Prepare to
          diagnose and
          repair engine
          cooling and
          lubrication
          systems
          
          
                    </label>
                    </div>
            
                    <br>
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core1_2" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Diagnose engine
          cooling and
          lubrication system
          
                    </label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core1_3" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 . Repair engine
          cooling and
          lubrication system
                    </label>
                    </div>
            
                    <br>
          
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core1_4" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.4  Complete work
          processes
          
                      </label>
                    </div>
            
                    <br>
          
          
                    <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
                    <div class="col-11 pt-1">
                    <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">II. DIAGNOSE AND REPAIR INTAKE AND EXHAUST
                    SYSTEM</p>	
                    </div>
                    <div class="col-1 ps-3 pt-1 justify-content-end">
                    <input class="form-check-input p-2 checkall2" type="checkbox" style="height:30px; width:30px;"/>
                    </div>
            
                    </div>
              

          
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core2_1" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1  Prepare to
          diagnose and
          repair intake and
          exhaust system
           </label>
                    </div>
            
            
          
                    <br>
              
          
            
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core2_2" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Diagnose intake
          and exhaust
          system
          
          </label>
                    </div>
          
          
                    <br>
                    
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core2_3" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1"> L.O.3 Repair intake and
          exhaust system
                    </label>
                    </div>
          
          
                    <br>
          
          
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core2_4" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1"> L.O.4 Complete work
          processes
                    </label>
                    </div>
          
          
                    <br>
          
                    <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
                    <div class="col-11 pt-1">
                    <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">III. DIAGNOSE AND OVERHAUL ENGINE MECHANICAL
                    SYSTEM</p>	
                    </div>
                    <div class="col-1 ps-3 pt-1 justify-content-end">
                    <input class="form-check-input p-2 checkall3" type="checkbox" style="height:30px; width:30px;"/>
                    </div>
            
                    </div>
          
  
            
            
          
                    
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core3_1" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Prepare to
          diagnose engine
          mechanical
          system
          
                    </label>
                    </div>
          
          
          
          
                    <br>
          
          
                    <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core3_2" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Diagnose engine
          mechanical
          system
          
                    </label>
                    </div>
          
          
                    <br>
          
          
                      <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core3_3" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Repair engine
          mechanical
          system
          
                    </label>
                    </div>
          
          
                    <br>
          
          
                     <div class="form-check form-check-inline m-2 ms-4">
                    <input class="form-check-input p-2 lmar_atserncii_core3_4" type="checkbox" style="height:30px; width:30px;"/>
                    <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.4. Complete work
          processes
                    </label>
                    </div>
          
          
                    <br>
          
            
          </div>
  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
      </div>`
      
  
  
      // if(cert = ' lmar_eimncii_common1_2/'){
      //   $(".lmar_eimncii_common1_2").prop("checked", true);
      //   
      // }
      // else{
      //   $(".lmar_eimncii_basic1_2").prop("checked", false);
      //   console.log('nows')
      // }
  
          }
  
      $("#update_detail").html(data);
      
      var checkall = $('.checkall'); 

      checkall.on('change',function(){
        console.log('problem')
  
        if (this.checked) {
          $('.checkall1').prop("checked", true);
          $(".lmar_atserncii_core1_1").prop("checked", true);
          $(".lmar_atserncii_core1_2").prop("checked", true);
          $(".lmar_atserncii_core1_3").prop("checked", true);
          $(".lmar_atserncii_core1_4").prop("checked", true);


          $('.checkall2').prop("checked", true);
          $(".lmar_atserncii_core2_1").prop("checked", true);
          $(".lmar_atserncii_core2_2").prop("checked", true);
          $(".lmar_atserncii_core2_3").prop("checked", true);
          $(".lmar_atserncii_core2_4").prop("checked", true);

          $('.checkall3').prop("checked", true);
          $(".lmar_atserncii_core3_1").prop("checked", true);
          $(".lmar_atserncii_core3_2").prop("checked", true);
          $(".lmar_atserncii_core3_3").prop("checked", true);
          $(".lmar_atserncii_core3_4").prop("checked", true);





        } 
        else{

          $('.checkall1').prop("checked", false);
          $(".lmar_atserncii_core1_1").prop("checked", false);
          $(".lmar_atserncii_core1_2").prop("checked", false);
          $(".lmar_atserncii_core1_3").prop("checked", false);
          $(".lmar_atserncii_core1_4").prop("checked", false);


          $('.checkall2').prop("checked", false);
          $(".lmar_atserncii_core2_1").prop("checked", false);
          $(".lmar_atserncii_core2_2").prop("checked", false);
          $(".lmar_atserncii_core2_3").prop("checked", false);
          $(".lmar_atserncii_core2_4").prop("checked", false);

          $('.checkall3').prop("checked", false);
          $(".lmar_atserncii_core3_1").prop("checked", false);
          $(".lmar_atserncii_core3_2").prop("checked", false);
          $(".lmar_atserncii_core3_3").prop("checked", false);
          $(".lmar_atserncii_core3_4").prop("checked", false);

        }

      })

      var checkall1 = $('.checkall1'); 

      checkall1.on('change',function(){
          if (this.checked) {
          $(".lmar_atserncii_core1_1").prop("checked", true);
          $(".lmar_atserncii_core1_2").prop("checked", true);
          $(".lmar_atserncii_core1_3").prop("checked", true);
          $(".lmar_atserncii_core1_4").prop("checked", true);

        } 
        else{
          $(".lmar_atserncii_core1_1").prop("checked", false);
          $(".lmar_atserncii_core1_2").prop("checked", false);
          $(".lmar_atserncii_core1_3").prop("checked", false);
          $(".lmar_atserncii_core1_4").prop("checked", false);

          console.log('wow')
        }   
        
        
      });

            var checkall2 = $('.checkall2'); 
    
      checkall2.on('change',function(){
          if (this.checked) {
            $(".lmar_atserncii_core2_1").prop("checked", true);
            $(".lmar_atserncii_core2_2").prop("checked", true);
            $(".lmar_atserncii_core2_3").prop("checked", true);
            $(".lmar_atserncii_core2_4").prop("checked", true);
  
        } 
        else{
          $(".lmar_atserncii_core2_1").prop("checked", false);
          $(".lmar_atserncii_core2_2").prop("checked", false);
          $(".lmar_atserncii_core2_3").prop("checked", false);
          $(".lmar_atserncii_core2_4").prop("checked", false);

          console.log('wow')
        }   
        
        
      });

      var checkall3 = $('.checkall3'); 
    
      checkall3.on('change',function(){
          if (this.checked) {
            $(".lmar_atserncii_core3_1").prop("checked", true);
            $(".lmar_atserncii_core3_2").prop("checked", true);
            $(".lmar_atserncii_core3_3").prop("checked", true);
            $(".lmar_atserncii_core3_4").prop("checked", true);
        } 
        else{
          $(".lmar_atserncii_core3_1").prop("checked", false);
          $(".lmar_atserncii_core3_2").prop("checked", false);
          $(".lmar_atserncii_core3_3").prop("checked", false);
          $(".lmar_atserncii_core3_4").prop("checked", false);

          console.log('wow')
        }   
        
        
      });


      if(trainee.lmar_atserncii_core1_1 == '/' && trainee.lmar_atserncii_core1_2 == '/' && trainee.lmar_atserncii_core1_3 == '/' && trainee.lmar_atserncii_core1_4 == '/' && trainee.lmar_atserncii_core2_1 == '/' && trainee.lmar_atserncii_core2_2== '/' && trainee.lmar_atserncii_core2_3 == '/' && trainee.lmar_atserncii_core2_4 == '/' && trainee.lmar_atserncii_core3_1 == '/' && trainee.lmar_atserncii_core3_2== '/' && trainee.lmar_atserncii_core3_3 == '/' && trainee.lmar_atserncii_core3_4 == '/'){


        $(".checkall").prop("checked", true);
        console.log('now')
      }
    else{
        $(".checkall").prop("checked", false);
        console.log('nows')
      }



      if(trainee.lmar_atserncii_core1_1 == '/' && trainee.lmar_atserncii_core1_2 == '/' && trainee.lmar_atserncii_core1_3 == '/' && trainee.lmar_atserncii_core1_4 == '/'){

        $(".checkall1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".checkall1").prop("checked", false);
        console.log('nows')
      }

      if(trainee.lmar_atserncii_core2_1 == '/' && trainee.lmar_atserncii_core2_2 == '/' && trainee.lmar_atserncii_core2_3 == '/' && trainee.lmar_atserncii_core2_4 == '/'){

        $(".checkall2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".checkall2").prop("checked", false);
        console.log('nows')
      }

      if(trainee.lmar_atserncii_core3_1 == '/' && trainee.lmar_atserncii_core3_2 == '/' && trainee.lmar_atserncii_core3_3 == '/' && trainee.lmar_atserncii_core3_4 == '/'){

        $(".checkall3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".checkall3").prop("checked", false);
        console.log('nows')
      }




      if(trainee.lmar_atserncii_core1_1 == '/'){
        $(".lmar_atserncii_core1_1").prop("checked", true);
   
      }
      else{
        $(".lmar_atserncii_core1_1").prop("checked", false);
   
      }
  
      if(trainee.lmar_atserncii_core1_2 == '/'){
        $(".lmar_atserncii_core1_2").prop("checked", true);
  
      }
      else{
        $(".lmar_atserncii_core1_2").prop("checked", false);
  
      }
  
      
      if(trainee.lmar_atserncii_core1_3 == '/'){
        $(".lmar_atserncii_core1_3").prop("checked", true);
  
      }
      else{
        $(".lmar_atserncii_core1_3").prop("checked", false);
  
      }
          
      if(trainee.lmar_atserncii_core1_4 == '/'){
          $(".lmar_atserncii_core1_4").prop("checked", true);
       
        }
        else{
          $(".lmar_atserncii_core1_4").prop("checked", false);
  
        }
  
       
  
  
       
      if(trainee.lmar_atserncii_core2_1 == '/'){
        $(".lmar_atserncii_core2_1").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core2_1").prop("checked", false);
      }
  
  
      if(trainee.lmar_atserncii_core2_2 == '/'){
        $(".lmar_atserncii_core2_2").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core2_2").prop("checked", false);
      }
  
      if(trainee.lmar_atserncii_core2_3 == '/'){
        $(".lmar_atserncii_core2_3").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core2_3").prop("checked", false);
      }
      
      if(trainee.lmar_atserncii_core2_4 == '/'){
        $(".lmar_atserncii_core2_4").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core2_4").prop("checked", false);
      }
  
  
      if(trainee.lmar_atserncii_core3_1 == '/'){
        $(".lmar_atserncii_core3_1").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core3_1").prop("checked", false);
      }
  
      if(trainee.lmar_atserncii_core3_2 == '/'){
        $(".lmar_atserncii_core3_2").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core3_2").prop("checked", false);
      }
  
       if(trainee.lmar_atserncii_core3_3 == '/'){
        $(".lmar_atserncii_core3_3").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core3_3").prop("checked", false);
      }
  
       if(trainee.lmar_atserncii_core3_4 == '/'){
        $(".lmar_atserncii_core3_4").prop("checked", true);
        
      }
      else{
        $(".lmar_atserncii_core3_4").prop("checked", false);
      }
  
      
  
  
  
  
      console.log(trainessid)
  
      let edit_core = 'edit_core';
      $('#updatecom').on('click',function(){
   
  
        var isChecked1_1 = $('.lmar_atserncii_core1_1').is(':checked'); 
        var isChecked1_2 = $('.lmar_atserncii_core1_2').is(':checked'); 
        var isChecked1_3 = $('.lmar_atserncii_core1_3').is(':checked'); 
        var isChecked1_4 = $('.lmar_atserncii_core1_4').is(':checked'); 
    
  
        var isChecked2_1 = $('.lmar_atserncii_core2_1').is(':checked'); 
        var isChecked2_2 = $('.lmar_atserncii_core2_2').is(':checked'); 
        var isChecked2_3 = $('.lmar_atserncii_core2_3').is(':checked'); 
        var isChecked2_4 = $('.lmar_atserncii_core2_4').is(':checked'); 
  
        var isChecked3_1 = $('.lmar_atserncii_core3_1').is(':checked'); 
        var isChecked3_2 = $('.lmar_atserncii_core3_2').is(':checked'); 
        var isChecked3_3 = $('.lmar_atserncii_core3_3').is(':checked'); 
        var isChecked3_4 = $('.lmar_atserncii_core3_4').is(':checked'); 
  
    
        
  
  
  
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
        if(isChecked2_4 == true){
          com2_4 = '/'
        }
        else{
          com2_4 = ''
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
        if(isChecked3_4 == true){
          com3_4 = '/'
        }
        else{
          com3_4 = ''
        }
  
       
  
      
        console.log(com1_1)
        console.log(com1_2)
        console.log(com1_3)

  
        $.ajax({
          url: 'connection_progresschart_atserncii.php',
          method :'post',
          data : {
          edit_core:edit_core,
            trainessid:trainessid,
            com1_1:com1_1,
            com1_2:com1_2,
            com1_3:com1_3,
            com1_4:com1_4,
  
            com2_1:com2_1,
            com2_2:com2_2,
            com2_3:com2_3,
            com2_4:com2_4,
       
  
            com3_1:com3_1,
            com3_2:com3_2,
            com3_3:com3_3,
            com3_4:com3_4,
   
  
          },success:function(response){
            console.log(response)
            if(response == '1'){
                            
            
            $('#updateModal').modal('hide')
        
              $('#successdeleteModal').modal('show');
              setTimeout(
                function() 
                {
                  window.location.href ='core_atserncii_progresschart.php'
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