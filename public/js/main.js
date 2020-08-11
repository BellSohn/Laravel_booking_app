var url = "http://bookingmanagement.com.devel/";

window.addEventListener('load',function(){
   // alert("pagina bien cargada");
   
  
       $('#client_id').change(function(){
           //alert("cambio");
           var id_cliente = $(this).val();
           $.ajax({
               url:url+'reserva/search/'+id_cliente,
               type:'GET',
               success:function(response){
                   
                   if(response.cliente){
                       console.log("existe usuario");
                       $('#client_warning').css('display','none');
                       $('#name').val(response.cliente.name);
                       $('#surname').val(response.cliente.surname);
                   }else{
                       //console.log("no existe usuario");                       
                       $('#client_warning').css('display','block');
                       $('#client_warning').css('border','2px solid red');
                       
                       $('#client_warning').html("El cliente no existe");
                       $('#name').val(null);
                       $('#surname').val(null);
                   }
                   
               }
           });
           
       });
        
   
   
});
