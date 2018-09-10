$(document).ready(function(){
    $.post( "../../BACK/PHP/misCreditos.php", {     
        },function( data ) {
            var evento= JSON.parse(data);
            for (var key in evento) {   
                $("#"+key+"").val(evento[key]);                
            }
    /*        
        if($("#horasCreditos").val()<40){
            $("#GetConstacia").prop('disabled', true);
            }
        else
            $("#GetConstacia").prop('disabled', false);
      */  
        
        });    
    
    $.post( "../../BACK/PHP/tablaMiscreditos.php", {     
        },function( data ) {
              $("#tablaCreditos").html(data);
            }        
        ); 
    
    $("#GetConstacia").click(function(){
            $.post( "../../BACK/PHP/constancia.php", {     
        },function( data ) {
            alert(data);
            }        
        );         
        
    });
    
});