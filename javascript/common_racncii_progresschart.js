$(document).ready(function(){
  
    $('#printcertracncii_basic').hide();
    $('#printcertracncii_common').hide();
    $('#printcertracncii_core').hide();



    
  $('body').click(function(){
    $('#printcertracncii_basic').hide();
      $('#printcertracncii_common').hide();
    $('#printcertracncii_core').hide();


  })


  // printcertemncii_basic
  $('#print_basic').on('click',function(){
    $('#printcertracncii_basic').hide();
    $('#printcertracncii_common').show();
    $('#printcertracncii_core ').hide();


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

   url: "connection_progresschart_racncii.php?page=" + page,
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
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common1_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common1_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common1_3}</td>
       
    


       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common2_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common2_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common2_3}</td>
       
       

       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common3_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common3_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common3_3}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common3_4}</td>
       


       
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common4_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common4_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common4_3}</td>
    

       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common5_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common5_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common5_3}</td>



       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common6_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common6_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common6_3}</td>



       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common7_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common7_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common7_3}</td>


       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common8_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common8_2}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common8_3}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common8_4}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common8_5}</td> 
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common8_6}</td>
       

       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common9_1}</td>
       <td class="text-center fw-bold p-3" style="width:8px;">${cert.lmar_racncii_common9_2}</td>
       



      </tr>`;


    



      }

     $("#table_body").html(rows);





     $('.update_data').on('click',function(){
      var trainessid = $(this).attr('id');
      console.log(trainessid)


      let updatecommon = 'updatecommon';
      $.ajax({
        url: 'connection_progresschart_racncii.php',
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
        <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">I. PREPARE MATERIALS AND TOOLS</p>	
        </div>
        <div class="col-1 ps-3 pt-1 justify-content-end">
        <input class="form-check-input p-2 checkall1" type="checkbox" style="height:30px; width:30px;"/>
        </div>

        </div>
  
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common1_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Identify
supplies/
materials
and tools
  
          </label>
          </div>
  
          <br>
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common1_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2.  Request
materials
and tools
        </label>
          </div>
  
          <br>
  
  
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common1_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3. Receive and
inspect
materials
and tools

          </label>
          </div>
  
  
          <br>

          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">II. INTERPRET TECHNICAL DRAWINGS AND PLANS</p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall2" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
          </div>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common2_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Analyze
signs,
symbols
and data</label>
          </div>
  
  

          <br>
    

  
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common2_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Interpret
technical
drawings and
plans
  </label>
          </div>


          <br>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common2_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Apply
freehand
sketching 

          </label>
          </div>



          <br>



          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">III. OBSERVE PROCEDURES, SPECIFICATIONS
          AND MANUALS OF INSTRUCTION</p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall3" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
          </div>


  

          
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common3_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Identify and
access
specification/
manuals</label>
          </div>




          <br>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common3_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Interpret
manuals
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common3_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Apply
information in
manual

          </label>
          </div>

          <br>
          

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common3_4" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.4. Store
manuals

          </label>
          </div>

          <br>
          
          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">IV PERFORM MENSURATIONS AND CALCULATIONS</p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall4" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
          </div>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common4_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1 Select
measuring
instruments
          </label>
          </div>

          <br>
    

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common4_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2 Carry out
measurements
and
calculations

          </label>
          </div>

          <br>
    
          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common4_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3 Maintain
measuring
instruments
 
          </label>
          </div>

          <br>
          


          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">V PERFORM BASIC BENCHWORKS</p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall5" type="checkbox" style="height:30px; width:30px;"/>
          </div>
  
          </div>



            <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common5_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1. Prepare
materials,
tools and
equipment 
          </label>
          </div>

          <br>



          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common5_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2. Lay-out and
mark
dimensions/
features on
workplace

          </label>
          </div>

          <br>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common5_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3. Perform
required
basic metal
works
          </label>
          </div>

          <br>


          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">VI PERFORM BASIC ELECTRICAL WORKS</p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall6" type="checkbox" style="height:30px; width:30px;"/>
          </div>

          </div>


          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common6_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1. Prepare
electrical
tools, test
instruments
and materials
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common6_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2. Test power
supply and
electrical
components

          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common6_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3. Perform basic
electrical
repair
          </label>
          </div>

          <br>



          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">VII MAINTAIN TOOLS, INSTRUMENTS AND EQUIPMENT</p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall7" type="checkbox" style="height:30px; width:30px;"/>
          </div>

          </div>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common7_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1. Check
condition of
tools,
instruments
and
equipment
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common7_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2. Perform basic
preventive
maintenance
on tools,
instruments
and
equipment
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common7_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3. Store tools,
instruments
and
equipment

          </label>
          </div>

          <br>


 
          <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
          <div class="col-11 pt-1">
          <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">VIII PERFORM HOUSEKEEPING AND SAFETY
          PRACTICES FOR RAC SERVICING </p>	
          </div>
          <div class="col-1 ps-3 pt-1 justify-content-end">
          <input class="form-check-input p-2 checkall8" type="checkbox" style="height:30px; width:30px;"/>
          </div>

          </div>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common8_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1. Sort
materials,
tools,
instruments
and
equipment
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common8_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2. Clean
workplace
area,
materials,
tools,
instruments
and
equipment

          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common8_3" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.3. Systematize
dispensing
and
retrieval of
materials,
tools,
instruments
and
equipment 
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common8_4" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.4. Identify and
minimize/
eliminate
hazards
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common8_5" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.5. Respond
and record
accidents

          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common8_6" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.6. Follow basic
security
          </label>
          </div>

          <br>

            <div class="form-check form-check-inline d-flex row bg-secondary rounded-1 pt-1 ms-2">
            <div class="col-11 pt-1">
            <p class="text-primary fw-bold bg-secondary" style="font-size:20px;">IX DOCUMENT WORK ACCOMPLISHED</p>	
            </div>
            <div class="col-1 ps-3 pt-1 justify-content-end">
            <input class="form-check-input p-2 checkall9" type="checkbox" style="height:30px; width:30px;"/>
            </div>

            </div>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common9_1" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.1. Identify forms
and collect
data 
          </label>
          </div>

          <br>

          <div class="form-check form-check-inline m-2 ms-4">
          <input class="form-check-input p-2 lmar_racncii_common9_2" type="checkbox" style="height:30px; width:30px;"/>
          <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">L.O.2. Prepare
reports
          </label>
          </div>

          <br>
 



    
  
    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
      </div>
      `
    


    // if(cert = ' lmar_racncii_common1_2/'){
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
        $(".lmar_racncii_common1_1").prop("checked", true);
        $(".lmar_racncii_common1_2").prop("checked", true);
        $(".lmar_racncii_common1_3").prop("checked", true);

        $('.checkall2').prop("checked", true);
        $(".lmar_racncii_common2_1").prop("checked", true);
        $(".lmar_racncii_common2_2").prop("checked", true);
        $(".lmar_racncii_common2_3").prop("checked", true);

        $('.checkall3').prop("checked", true);
        $(".lmar_racncii_common3_1").prop("checked", true);
        $(".lmar_racncii_common3_2").prop("checked", true);
        $(".lmar_racncii_common3_3").prop("checked", true);
        $(".lmar_racncii_common3_4").prop("checked", true);


        $('.checkall4').prop("checked", true);
        $(".lmar_racncii_common4_1").prop("checked", true);
        $(".lmar_racncii_common4_2").prop("checked", true);
        $(".lmar_racncii_common4_3").prop("checked", true);

        $('.checkall5').prop("checked", true);
        $(".lmar_racncii_common5_1").prop("checked", true);
        $(".lmar_racncii_common5_2").prop("checked", true);
        $(".lmar_racncii_common5_3").prop("checked", true);

        $('.checkall6').prop("checked", true);
        $(".lmar_racncii_common6_1").prop("checked", true);
        $(".lmar_racncii_common6_2").prop("checked", true);
        $(".lmar_racncii_common6_3").prop("checked", true);


        $('.checkall7').prop("checked", true);
        $(".lmar_racncii_common7_1").prop("checked", true);
        $(".lmar_racncii_common7_2").prop("checked", true);
        $(".lmar_racncii_common7_3").prop("checked", true);


        $('.checkall8').prop("checked", true);
        $(".lmar_racncii_common8_1").prop("checked", true);
        $(".lmar_racncii_common8_2").prop("checked", true);
        $(".lmar_racncii_common8_3").prop("checked", true);
        $(".lmar_racncii_common8_4").prop("checked", true);
        $(".lmar_racncii_common8_5").prop("checked", true);
        $(".lmar_racncii_common8_6").prop("checked", true);

        $('.checkall9').prop("checked", true);
        $(".lmar_racncii_common9_1").prop("checked", true);
        $(".lmar_racncii_common9_2").prop("checked", true);


      } 
      else{

        $('.checkall1').prop("checked", false);
        $(".lmar_racncii_common1_1").prop("checked", false);
        $(".lmar_racncii_common1_2").prop("checked", false);
        $(".lmar_racncii_common1_3").prop("checked", false);

        $('.checkall2').prop("checked", false);
        $(".lmar_racncii_common2_1").prop("checked", false);
        $(".lmar_racncii_common2_2").prop("checked", false);
        $(".lmar_racncii_common2_3").prop("checked", false);

        $('.checkall3').prop("checked", false);
        $(".lmar_racncii_common3_1").prop("checked", false);
        $(".lmar_racncii_common3_2").prop("checked", false);
        $(".lmar_racncii_common3_3").prop("checked", false);
        $(".lmar_racncii_common3_4").prop("checked", false);


        $('.checkall4').prop("checked", false);
        $(".lmar_racncii_common4_1").prop("checked", false);
        $(".lmar_racncii_common4_2").prop("checked", false);
        $(".lmar_racncii_common4_3").prop("checked", false);

        $('.checkall5').prop("checked", false);
        $(".lmar_racncii_common5_1").prop("checked", false);
        $(".lmar_racncii_common5_2").prop("checked", false);
        $(".lmar_racncii_common5_3").prop("checked", false);

        $('.checkall6').prop("checked", false);
        $(".lmar_racncii_common6_1").prop("checked", false);
        $(".lmar_racncii_common6_2").prop("checked", false);
        $(".lmar_racncii_common6_3").prop("checked", false);


        $('.checkall7').prop("checked", false);
        $(".lmar_racncii_common7_1").prop("checked", false);
        $(".lmar_racncii_common7_2").prop("checked", false);
        $(".lmar_racncii_common7_3").prop("checked", false);
  

        $('.checkall8').prop("checked", false);
        $(".lmar_racncii_common8_1").prop("checked", false);
        $(".lmar_racncii_common8_2").prop("checked", false);
        $(".lmar_racncii_common8_3").prop("checked", false);
        $(".lmar_racncii_common8_4").prop("checked", false);
        $(".lmar_racncii_common8_5").prop("checked", false);
        $(".lmar_racncii_common8_6").prop("checked", false);

        $('.checkall9').prop("checked", false);
        $(".lmar_racncii_common9_1").prop("checked", false);
        $(".lmar_racncii_common9_2").prop("checked", false);

      }   
      
      
    });

    var checkall1 = $('.checkall1'); 

    checkall1.on('change',function(){
        if (this.checked) {
          $(".lmar_racncii_common1_1").prop("checked", true);
          $(".lmar_racncii_common1_2").prop("checked", true);
          $(".lmar_racncii_common1_3").prop("checked", true);
        }
        else{
          $(".lmar_racncii_common1_1").prop("checked", false);
          $(".lmar_racncii_common1_2").prop("checked", false);
          $(".lmar_racncii_common1_3").prop("checked", false);
        }
      })

      var checkall2 = $('.checkall2'); 

      checkall2.on('change',function(){
        if (this.checked) {
          $(".lmar_racncii_common2_1").prop("checked", true);
          $(".lmar_racncii_common2_2").prop("checked", true);
          $(".lmar_racncii_common2_3").prop("checked", true);
  
        } 
        else{
          $(".lmar_racncii_common2_1").prop("checked", false);
          $(".lmar_racncii_common2_2").prop("checked", false);
          $(".lmar_racncii_common2_3").prop("checked", false);
  
          console.log('wow')
        }   
      });

      var checkall3 = $('.checkall3'); 

      checkall3.on('change',function(){
        if (this.checked) {
          $(".lmar_racncii_common3_1").prop("checked", true);
          $(".lmar_racncii_common3_2").prop("checked", true);
          $(".lmar_racncii_common3_3").prop("checked", true);
          $(".lmar_racncii_common3_4").prop("checked", true);
  
  
        } 
        else{
          $(".lmar_racncii_common3_1").prop("checked", false);
          $(".lmar_racncii_common3_2").prop("checked", false);
          $(".lmar_racncii_common3_3").prop("checked", false);
          $(".lmar_racncii_common3_4").prop("checked", false);
          console.log('wow')
        }   
        
        
      });

      var checkall4 = $('.checkall4'); 

      checkall4.on('change',function(){
      if (this.checked) {
        $(".lmar_racncii_common4_1").prop("checked", true);
        $(".lmar_racncii_common4_2").prop("checked", true);
        $(".lmar_racncii_common4_3").prop("checked", true);


        } 
      else{
        $(".lmar_racncii_common4_1").prop("checked", false);
        $(".lmar_racncii_common4_2").prop("checked", false);
        $(".lmar_racncii_common4_3").prop("checked", false);

        }   
        
        
      });

      var checkall5 = $('.checkall5'); 

      checkall5.on('change',function(){
          if (this.checked) {
            $(".lmar_racncii_common5_1").prop("checked", true);
            $(".lmar_racncii_common5_2").prop("checked", true);
            $(".lmar_racncii_common5_3").prop("checked", true);

        } 
        else{
          $(".lmar_racncii_common5_1").prop("checked", false);
          $(".lmar_racncii_common5_2").prop("checked", false);
          $(".lmar_racncii_common5_3").prop("checked", false);
  
  
  
          console.log('wow')
        }   
        
        
      });

              
      var checkall6 = $('.checkall6'); 

      checkall6.on('change',function(){
          if (this.checked) {
            $(".lmar_racncii_common6_1").prop("checked", true);
            $(".lmar_racncii_common6_2").prop("checked", true);
            $(".lmar_racncii_common6_3").prop("checked", true);

  
  
        } 
        else{
          $(".lmar_racncii_common6_1").prop("checked", false);
          $(".lmar_racncii_common6_2").prop("checked", false);
          $(".lmar_racncii_common6_3").prop("checked", false);

  
          console.log('wow')
        }   
        
        
      });

      var checkall7 = $('.checkall7'); 

      checkall7.on('change',function(){
          if (this.checked) {
            $(".lmar_racncii_common7_1").prop("checked", true);
            $(".lmar_racncii_common7_2").prop("checked", true);
            $(".lmar_racncii_common7_3").prop("checked", true);
    
  
  
        } 
        else{
          $(".lmar_racncii_common7_1").prop("checked", false);
          $(".lmar_racncii_common7_2").prop("checked", false);
          $(".lmar_racncii_common7_3").prop("checked", false);

          console.log('wow')
        }   
        
        
      });

      var checkall8 = $('.checkall8'); 

      checkall8.on('change',function(){
          if (this.checked) {
            $(".lmar_racncii_common8_1").prop("checked", true);
            $(".lmar_racncii_common8_2").prop("checked", true);
            $(".lmar_racncii_common8_3").prop("checked", true);
            $(".lmar_racncii_common8_4").prop("checked", true);
            $(".lmar_racncii_common8_5").prop("checked", true);
            $(".lmar_racncii_common8_6").prop("checked", true);
  
        } 
        else{
          $(".lmar_racncii_common8_1").prop("checked", false);
          $(".lmar_racncii_common8_2").prop("checked", false);
          $(".lmar_racncii_common8_3").prop("checked", false);
          $(".lmar_racncii_common8_4").prop("checked", false);
          $(".lmar_racncii_common8_5").prop("checked", false);
          $(".lmar_racncii_common8_6").prop("checked", false);
          console.log('wow')
        }   
        
        
      });

      var checkall9 = $('.checkall9'); 

      checkall9.on('change',function(){
          if (this.checked) {
            $(".lmar_racncii_common9_1").prop("checked", true);
            $(".lmar_racncii_common9_2").prop("checked", true);
  
  
        } 
        else{
          $(".lmar_racncii_common9_1").prop("checked", false);
          $(".lmar_racncii_common9_2").prop("checked", false);
          console.log('wowd')
        }   
        
        
      });

      
    if(trainee.lmar_racncii_common1_1 == '/' && trainee.lmar_racncii_common1_2 == '/' && trainee.lmar_racncii_common1_3 == '/' && trainee.lmar_racncii_common2_1 == '/' && trainee.lmar_racncii_common2_2== '/' && trainee.lmar_racncii_common2_3 == '/' && trainee.lmar_racncii_common3_1 == '/' && trainee.lmar_racncii_common3_2 == '/' && trainee.lmar_racncii_common3_3 == '/' && trainee.lmar_racncii_common3_4 == '/' && trainee.lmar_racncii_common4_1 == '/' && trainee.lmar_racncii_common4_2 == '/' && trainee.lmar_racncii_common4_3 == '/' && trainee.lmar_racncii_common5_1 == '/' && trainee.lmar_racncii_common5_2 == '/' && trainee.lmar_racncii_common5_3 == '/' && trainee.lmar_racncii_common6_1 == '/' && trainee.lmar_racncii_common6_2 == '/' && trainee.lmar_racncii_common6_3 == '/'&& trainee.lmar_racncii_common7_1 == '/' && trainee.lmar_racncii_common7_2 == '/' && trainee.lmar_racncii_common7_3 == '/' && trainee.lmar_racncii_common8_1 == '/' && trainee.lmar_racncii_common8_2 == '/' && trainee.lmar_racncii_common8_3 == '/' && trainee.lmar_racncii_common8_4 == '/' && trainee.lmar_racncii_common8_5 == '/' && trainee.lmar_racncii_common8_6 == '/'&& trainee.lmar_racncii_common9_1 == '/' && trainee.lmar_racncii_common9_2 == '/'){
      $(".checkall").prop("checked", true);
      console.log('nowddd')
      }
      else{
      $(".checkall").prop("checked", false);
        console.log('nowsddd')
      }

      if(trainee.lmar_racncii_common1_1 == '/' && trainee.lmar_racncii_common1_2 == '/' && trainee.lmar_racncii_common1_3 == '/'){

        $(".checkall1").prop("checked", true);
  
        console.log('now')
      }
      else{
        $(".checkall1").prop("checked", false);
  
  
        console.log('nows')
      }

      
    if(trainee.lmar_racncii_common2_1 == '/' && trainee.lmar_racncii_common2_2 == '/' && trainee.lmar_racncii_common2_3 == '/' ){

      $(".checkall2").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall2").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_racncii_common3_1 == '/' && trainee.lmar_racncii_common3_2 == '/' && trainee.lmar_racncii_common3_3 == '/' && trainee.lmar_racncii_common3_4 == '/' ){

      $(".checkall3").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall3").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_racncii_common4_1 == '/' && trainee.lmar_racncii_common4_2 == '/' && trainee.lmar_racncii_common4_3 == '/' ){

      $(".checkall4").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall4").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_racncii_common5_1 == '/' && trainee.lmar_racncii_common5_2 == '/' && trainee.lmar_racncii_common5_3 == '/' ){

      $(".checkall5").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall5").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_racncii_common6_1 == '/' && trainee.lmar_racncii_common6_2 == '/' && trainee.lmar_racncii_common6_3 == '/'){

      $(".checkall6").prop("checked", true);

      console.log('now')
    }
    else{
      $(".checkall6").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_racncii_common7_1 == '/' && trainee.lmar_racncii_common7_2 == '/' && trainee.lmar_racncii_common7_3 == '/'){

      $(".checkall7").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall7").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_racncii_common8_1 == '/' && trainee.lmar_racncii_common8_2 == '/' && trainee.lmar_racncii_common8_3 == '/' && trainee.lmar_racncii_common8_4 == '/' && trainee.lmar_racncii_common8_5 == '/' && trainee.lmar_racncii_common8_6 == '/'){

      $(".checkall8").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall8").prop("checked", false);


      console.log('nows')
    }

    if(trainee.lmar_racncii_common9_1 == '/' && trainee.lmar_racncii_common9_2 == '/' ){

      $(".checkall9").prop("checked", true);



      console.log('now')
    }
    else{
      $(".checkall9").prop("checked", false);


      console.log('nows')
    }


    if(trainee.lmar_racncii_common1_1 == '/'){
        $(".lmar_racncii_common1_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common1_1").prop("checked", false);
        console.log('nowss')
      }
  
      if(trainee.lmar_racncii_common1_2 == '/'){
        $(".lmar_racncii_common1_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common1_2").prop("checked", false);
        console.log('nows')
      }
  
      
      if(trainee.lmar_racncii_common1_3 == '/'){
        $(".lmar_racncii_common1_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common1_3").prop("checked", false);
        console.log('nows')
      }
  
      
          
  
  
       
      if(trainee.lmar_racncii_common2_1 == '/'){
        $(".lmar_racncii_common2_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common2_1").prop("checked", false);
        console.log('nows')
      }
  
  
      if(trainee.lmar_racncii_common2_2 == '/'){
        $(".lmar_racncii_common2_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common2_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common2_3 == '/'){
        $(".lmar_racncii_common2_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common2_3").prop("checked", false);
        console.log('nows')
      }
  
     
  
  
      if(trainee.lmar_racncii_common3_1 == '/'){
        $(".lmar_racncii_common3_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common3_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common3_2 == '/'){
        $(".lmar_racncii_common3_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common3_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common3_3 == '/'){
        $(".lmar_racncii_common3_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common3_3").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common3_4 == '/'){
        $(".lmar_racncii_common3_4").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common3_4").prop("checked", false);
        console.log('nows')
      }
  
     
  
      if(trainee.lmar_racncii_common4_1 == '/'){
        $(".lmar_racncii_common4_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common4_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common4_2 == '/'){
        $(".lmar_racncii_common4_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common4_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common4_3 == '/'){
        $(".lmar_racncii_common4_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common4_3").prop("checked", false);
        console.log('nows')
      }
  
  
      if(trainee.lmar_racncii_common5_1 == '/'){
        $(".lmar_racncii_common5_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common5_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common5_2 == '/'){
        $(".lmar_racncii_common5_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common5_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common5_3 == '/'){
        $(".lmar_racncii_common5_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common5_3").prop("checked", false);
        console.log('nows')
      }
  
  
      if(trainee.lmar_racncii_common6_1 == '/'){
        $(".lmar_racncii_common6_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common6_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common6_2 == '/'){
        $(".lmar_racncii_common6_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common6_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common6_3 == '/'){
        $(".lmar_racncii_common6_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common6_3").prop("checked", false);
        console.log('nows')
      }
  
  
  
      if(trainee.lmar_racncii_common7_1 == '/'){
        $(".lmar_racncii_common7_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common7_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common7_2 == '/'){
        $(".lmar_racncii_common7_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common7_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common7_3 == '/'){
        $(".lmar_racncii_common7_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common7_3").prop("checked", false);
        console.log('nows')
      }
  
  
      if(trainee.lmar_racncii_common8_1 == '/'){
        $(".lmar_racncii_common8_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common8_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common8_2 == '/'){
        $(".lmar_racncii_common8_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common8_2").prop("checked", false);
        console.log('nows')
      }
  
      if(trainee.lmar_racncii_common8_3 == '/'){
        $(".lmar_racncii_common8_3").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common8_3").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common8_4 == '/'){
        $(".lmar_racncii_common8_4").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common8_4").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common8_5 == '/'){
        $(".lmar_racncii_common8_5").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common8_5").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common8_6 == '/'){
        $(".lmar_racncii_common8_6").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common8_6").prop("checked", false);
        console.log('nows')
      }
  
  
      if(trainee.lmar_racncii_common9_1 == '/'){
        $(".lmar_racncii_common9_1").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common9_1").prop("checked", false);
        console.log('nows')
      }
      if(trainee.lmar_racncii_common9_2 == '/'){
        $(".lmar_racncii_common9_2").prop("checked", true);
        console.log('now')
      }
      else{
        $(".lmar_racncii_common9_2").prop("checked", false);
        console.log('nows')
      }
  

    console.log(trainessid)

    let edit_common = 'edit_common';
    $('#updatecom').on('click',function(){
 

        var isChecked1_1 = $('.lmar_racncii_common1_1').is(':checked'); 
        var isChecked1_2 = $('.lmar_racncii_common1_2').is(':checked'); 
        var isChecked1_3 = $('.lmar_racncii_common1_3').is(':checked'); 
  
  
        var isChecked2_1 = $('.lmar_racncii_common2_1').is(':checked'); 
        var isChecked2_2 = $('.lmar_racncii_common2_2').is(':checked'); 
        var isChecked2_3 = $('.lmar_racncii_common2_3').is(':checked');
  
  
        var isChecked3_1 = $('.lmar_racncii_common3_1').is(':checked'); 
        var isChecked3_2 = $('.lmar_racncii_common3_2').is(':checked'); 
        var isChecked3_3 = $('.lmar_racncii_common3_3').is(':checked'); 
        var isChecked3_4 = $('.lmar_racncii_common3_4').is(':checked'); 
        
  
  
        var isChecked4_1 = $('.lmar_racncii_common4_1').is(':checked'); 
        var isChecked4_2 = $('.lmar_racncii_common4_2').is(':checked'); 
        var isChecked4_3 = $('.lmar_racncii_common4_3').is(':checked'); 
        
  
        var isChecked5_1 = $('.lmar_racncii_common5_1').is(':checked'); 
        var isChecked5_2 = $('.lmar_racncii_common5_2').is(':checked'); 
        var isChecked5_3 = $('.lmar_racncii_common5_3').is(':checked'); 
  
  
        var isChecked6_1 = $('.lmar_racncii_common6_1').is(':checked'); 
        var isChecked6_2 = $('.lmar_racncii_common6_2').is(':checked'); 
        var isChecked6_3 = $('.lmar_racncii_common6_3').is(':checked'); 
  
  
        var isChecked7_1 = $('.lmar_racncii_common7_1').is(':checked'); 
        var isChecked7_2 = $('.lmar_racncii_common7_2').is(':checked'); 
        var isChecked7_3 = $('.lmar_racncii_common7_3').is(':checked'); 
  
  
        var isChecked8_1 = $('.lmar_racncii_common8_1').is(':checked'); 
        var isChecked8_2 = $('.lmar_racncii_common8_2').is(':checked'); 
        var isChecked8_3 = $('.lmar_racncii_common8_3').is(':checked');
        var isChecked8_4 = $('.lmar_racncii_common8_4').is(':checked'); 
        var isChecked8_5 = $('.lmar_racncii_common8_5').is(':checked'); 
        var isChecked8_6 = $('.lmar_racncii_common8_6').is(':checked'); 
  
  
        var isChecked9_1 = $('.lmar_racncii_common9_1').is(':checked'); 
        var isChecked9_2 = $('.lmar_racncii_common9_2').is(':checked'); 
         
  
  
  
   
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
        if(isChecked3_4 == true){
          com3_4 = '/'
        }
        else{
          com3_4 = ''
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
  
  
        if(isChecked8_1 == true){
          com8_1 = '/'
        }
        else{
          com8_1 = ''
        }
        if(isChecked8_2 == true){
          com8_2 = '/'
        }
        else{
          com8_2 = ''
        }
        if(isChecked8_3 == true){
          com8_3 = '/'
        }
        else{
          com8_3 = ''
        }
        if(isChecked8_4 == true){
          com8_4 = '/'
        }
        else{
          com8_4 = ''
        }
        if(isChecked8_5 == true){
          com8_5 = '/'
        }
        else{
          com8_5 = ''
        }
        if(isChecked8_6 == true){
          com8_6 = '/'
        }
        else{
          com8_6 = ''
        }
  
  
        if(isChecked9_1 == true){
          com9_1 = '/'
        }
        else{
          com9_1 = ''
        }
        if(isChecked9_2 == true){
          com9_2 = '/'
        }
        else{
          com9_2 = ''
        }
        

        console.log(com1_1)
     
        console.log(com1_3)
        console.log(com9_2)

      $.ajax({
        url: 'connection_progresschart_racncii.php',
        method :'post',
        data : {
        edit_common:edit_common,
          trainessid:trainessid,
          com1_1:com1_1,
          com1_2:com1_2,
          com1_3:com1_3,
         

          com2_1:com2_1,
          com2_2:com2_2,
          com2_3:com2_3,
          

          com3_1:com3_1,
          com3_2:com3_2,
          com3_3:com3_3,
          com3_4:com3_4,

          
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


          com8_1:com8_1,
          com8_2:com8_2,
          com8_3:com8_3,
          com8_4:com8_4,
          com8_5:com8_5,
          com8_6:com8_6,


          com9_1:com9_1,
          com9_2:com9_2,
 

        },success:function(response){
          console.log(response)
          if(response == '1'){
                          
          
          $('#updateModal').modal('hide')
      
            $('#successdeleteModal').modal('show');
            setTimeout(
              function() 
              {
                window.location.href ='common_racncii_progresschart.php'

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