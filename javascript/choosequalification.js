$(document).ready(function(){

$('.chooses').on('click',function(){
        
    var course = $(this).attr('id');
    console.log(course)

    $.ajax({
      url: "./coursesession.php",
      method: "post",
      data: {
        course: course,
      },
      success: function (res) {
          window.location.href = "choosebatch.php";
      },
    });

})
    
   
$('#dropdown_logout').on('click',function(){
  console.log('wiw')
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