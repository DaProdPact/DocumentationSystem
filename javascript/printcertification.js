$(document).ready(function(){
  // $('#updateModal').modal('show');
$('#addModal').modal('show')

  var qualificationcert = $('#qualification').val();
      
      $('#printcertbasic').hide();
      $('#printcertcommon').hide();
      $('#printcertcore1').hide();
      $('#printcertcore2').hide();
      $('#printcertcore3').hide();
      $('#printcertcore4').hide();
      $('#printcertcore5').hide();
      $('#printcertcore6').hide();
      $('#printcertelective1').hide();
      $('#printcertelective2').hide();






    $('body').click(function(){

      $('#printcertbasic').hide();
      $('#printcertcommon').hide();
      $('#printcertcore1').hide();
      $('#printcertcore2').hide();
      $('#printcertcore3').hide();
      $('#printcertcore4').hide();
      $('#printcertcore5').hide();
      $('#printcertcore6').hide();
      $('#printcertelective1').hide();
      $('#printcertelective2').hide();

      
    })


    
    $('#printcertbasicbtn').on('click',function(){
      $('#printcertbasic').show();
      window.print();

    })
    $('#printcertcommonbtn').on('click',function(){
      $('#printcertcommon').show();
      window.print();

    })
    


    
    $('#printcertcore1btn').on('click',function(){
      $('#printcertcore1').show();
      window.print();

    })
    $('#printcertcore2btn').on('click',function(){
      $('#printcertcore2').show();
      window.print();

    })
    $('#printcertcore3btn').on('click',function(){
      $('#printcertcore3').show();
      window.print();

    })
    $('#printcertcore4btn').on('click',function(){
      $('#printcertcore4').show();
      window.print();

    })
    $('#printcertcore5btn').on('click',function(){
      $('#printcertcore5').show();
      window.print();

    })
    $('#printcertcore6btn').on('click',function(){
      $('#printcertcore6').show();
      
      window.print();

    })

    $('#printcertelective1btn').on('click',function(){
      $('#printcertelective1').show();
      window.print();

    })
    $('#printcertelective2btn').on('click',function(){
      $('#printcertelective2').show();
      window.print();

    })

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
    $.ajax({ 
     url: "printcertificationconnection.php?page=" + page,
     method: "GET",
     success: function (res) {
    console.log(res)
  
       if(res == 2){
             
       $("#table_body").html(`<tr class="table-active">
       <td colspan="6" class="text-center"> No Record Found </td>
       </tr>`);
    
       }
       else{
       let certs = JSON.parse(res);
    
    
       let rows = "";
       for (cert of certs) {

        var basic = '';
        var common = '';
        var core1 = '';
        var core2 = '';
        var core3 = '';
        var core4 = '';
        var core5 = '';
        var core6 = '';




        if(cert.basic == '1'){
          basic = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          basic = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.common == '1'){
          common = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          common = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core1 == '1'){
          core1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core2 == '1'){
          core2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core3 == '1'){
          core3 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core3 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core4 == '1'){
          core4 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core4 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core5 == '1'){
          core5 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core5 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core6 == '1'){
          core6 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core6 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.elective1 == '1'){
          elective1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }

        if(cert.elective2 == '1'){
          elective2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }



   
          rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
       
          <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
          <td>${cert.Qualification_Program_Title}</td>
          <td class="ps-4" style="width:10%;">${basic}</td>
          <td class="ps-4" style="width:10%;">${common}</td>


          `;
          var loops = 1;
          while(loops <= 3){ 
  

            rows += `
          <td class="text-center">${core}</td>`
          loops++;
        } rows += `

      </tr>`
        
        



        }

        $("#table_body").html(rows);

        $('#searchtrainees').on('keyup',function(){
          var search = $('#searchtrainees').val()
          console.log(search)
          $.ajax({
            url: "printcertificationconnection.php",
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
       let certs = JSON.parse(res);
    
    
       let rows = "";
       for (cert of certs) {

        var basic = '';
        var common = '';
        var core1 = '';
        var core2 = '';
        var core3 = '';
        var core4 = '';
        var core5 = '';
        var core6 = '';




        if(cert.basic == '1'){
          basic = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          basic = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.common == '1'){
          common = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          common = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core1 == '1'){
          core1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core2 == '1'){
          core2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core3 == '1'){
          core3 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core3 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core4 == '1'){
          core4 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core4 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core5 == '1'){
          core5 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core5 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.core6 == '1'){
          core6 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          core6 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }
        if(cert.elective1 == '1'){
          elective1 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective1 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }

        if(cert.elective2 == '1'){
          elective2 = '<i class="fas fa-check text-primary fw-bolder"></i>';
        }
        else{
          elective2 = '<i class="fas fa-times text-danger fw-bolder"></i>';

        }



   
          rows += `<tr class="table-active" style="height: 15px; font-size:11px; font-weight:bold;">
       
          <td>${cert.FirstName} ${cert.MiddleName} ${cert.LastName} </td>
          <td>${cert.Qualification_Program_Title}</td>
          <td class="ps-4" style="width:10%;">${basic}</td>
          <td class="ps-4" style="width:10%;">${common}</td>


          `;
          var loops = 1;
          while(loops <= 3){ 
  

            rows += `
          <td class="text-center">${core}</td>`
          loops++;
        } rows += `

      </tr>`
        
        



        }

        $("#table_body").html(rows);




       $('.update_data').on('click',function(){
        var trainessid = $(this).attr('id');
        var ups = $(this);
        console.log(trainessid)
        


        let update = 'update';
        $.ajax({
          url: 'printaction.php',
          method :'post',
          data : {
            update:update,
            trainessid:trainessid,
          },

          success:function(res){
            $('#updateModal').modal('show')
            console.log(res)  
           


     
            let viewtrs = JSON.parse(res)
                  let rows = "";     
                  for(viewtr of viewtrs){
                    var middle = viewtr.MiddleName[0];
                    if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                    
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>


                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom">Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else{
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                     
                      
                    }
                    $('#update_detail').html(rows)
                    var com1 = ''; 
                    var com2 = ''; 
                    var com3 = ''; 

                    $('#updatecom').on('click',function(){
                      var isChecked = $('.myCheckbox1').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com1 = '1'
                      }
                      else{
                        com1 = '0'
                      }
                
                      var isChecked = $('.myCheckbox2').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com2 = '1'
                      }
                      else{
                        com2 = '0'
                      }
                      var isChecked = $('.myCheckbox3').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com3 = '1'
                      }
                      else{
                        com3 = '0'
                      }
                      console.log(com1)
                      console.log(com2)
                      console.log(com3)
                      console.log(trainessid)

                      let edit = 'edit';
                      $.ajax({
                        url:'printaction.php',
                        method:'post',
                        data:{
                          edit:edit,
                          trainessid:trainessid,
                          com1:com1,
                          com2:com2,
                          com3:com3,
                 
                        },
                        success:function(editres){
                          console.log(editres)
                          let editrs = JSON.parse(editres)
                          console.log(editrs[0])
                          editrs1 = editrs[0]
                          editrs2 = editrs[1]
                          editrs3 = editrs[2]
                          $('#updateModal').modal('hide')
                          $('.success').toast('show');

                          if (editrs1 == 1){
                            ups.parent().siblings().eq(3).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(3).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs2 == 1){
                            ups.parent().siblings().eq(4).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(4).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs3 == 1){
                            ups.parent().siblings().eq(5).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(5).html('<i class="fas fa-times text-danger fw-bold"></i>')

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
              })



       $('.update_data').on('click',function(){
        var trainessid = $(this).attr('id');
        var ups = $(this);
        console.log(trainessid)
        


        let update = 'update';
        $.ajax({
          url: 'printaction.php',
          method :'post',
          data : {
            update:update,
            trainessid:trainessid,
          },

          success:function(res){
            $('#updateModal').modal('show')
            console.log(res)  
           


     
            let viewtrs = JSON.parse(res)
                  let rows = "";     
                  for(viewtr of viewtrs){
                    var middle = viewtr.MiddleName[0];
                    if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                    
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>


                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom">Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 == '1' && viewtr.core2 != '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 == '1' && viewtr.core3 != '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else if(viewtr.core1 != '1' && viewtr.core2 != '1' && viewtr.core3 == '1'){
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;" />
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                      </div>
                      <br>
                      <div class="form-check form-check-inline m-2">
                      <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;" checked/>
                      <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                      </div>
                    </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                    else{
                      rows += `  
                      <div class="modal-header p-2 px-3">
                        <h5 class="modal-title text-primary" id="exampleModalLabel">Update Core Competencies</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">

                      
                      <h5 class="text-primary text-center">${viewtr.FirstName} ${middle}. ${viewtr.LastName} ${viewtr.Extension_Name}</h5>
                      <p class="text-primary text-center">( ${viewtr.Qualification_Program_Title} )</p>

                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox1 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 1</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox2 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 2</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline m-2">
                        <input class="form-check-input myCheckbox3 p-2" type="checkbox" style="height:30px; width:30px;"/>
                        <label class="form-check-label fw-bold pt-1" for="inlineCheckbox1">CORE COMPETENCIES 3</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updatecom" >Update</button>
                  </div>`
                    }
                     
                      
                    }
                    $('#update_detail').html(rows)
                    var com1 = ''; 
                    var com2 = ''; 
                    var com3 = ''; 

                    $('#updatecom').on('click',function(){
                      var isChecked = $('.myCheckbox1').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com1 = '1'
                      }
                      else{
                        com1 = '0'
                      }
                
                      var isChecked = $('.myCheckbox2').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com2 = '1'
                      }
                      else{
                        com2 = '0'
                      }
                      var isChecked = $('.myCheckbox3').is(':checked'); // returns true or false

 
                      if(isChecked == true){
                        com3 = '1'
                      }
                      else{
                        com3 = '0'
                      }
                      console.log(com1)
                      console.log(com2)
                      console.log(com3)
                      console.log(trainessid)

                      let edit = 'edit';
                      $.ajax({
                        url:'printaction.php',
                        method:'post',
                        data:{
                          edit:edit,
                          trainessid:trainessid,
                          com1:com1,
                          com2:com2,
                          com3:com3,
                 
                        },
                        success:function(editres){
                          console.log(editres)
                          let editrs = JSON.parse(editres)
                          console.log(editrs[0])
                          editrs1 = editrs[0]
                          editrs2 = editrs[1]
                          editrs3 = editrs[2]
                          $('#updateModal').modal('hide')
                          $('.success').toast('show');

                          if (editrs1 == 1){
                            ups.parent().siblings().eq(3).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(3).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs2 == 1){
                            ups.parent().siblings().eq(4).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(4).html('<i class="fas fa-times text-danger fw-bold"></i>')

                          }

                          if (editrs3 == 1){
                            ups.parent().siblings().eq(5).html('<i class="fas fa-check text-primary fw-bolder"></i>')
                          }
                          else {
                            console.log('nyaw')
                            ups.parent().siblings().eq(5).html('<i class="fas fa-times text-danger fw-bold"></i>')

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