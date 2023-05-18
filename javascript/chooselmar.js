$(document).ready(function(){

    console.log('wow')
    $('.lmarview').on('click',function(){
        var id = $(this).attr('id')
        var competencies = $('.competencies').attr('id')
        var unit = $('.unit').attr('id')
        var element = $('.element').attr('id')

        console.log(id)
        console.log(competencies)
        console.log(unit)
        console.log(element)

        var ems = $(this).parent().parent().siblings().eq(2).text();
        console.log(ems)



        $.ajax({
            url:'lmarsession.php',
            method:'post',
            data:{
                id:id,
                competencies:competencies,
                unit:unit,
                element:element,

            },
            success:function(res){
                // console.log(res)
                window.location.href = "lmarelements.php";
               
            }
            
        })
    })
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