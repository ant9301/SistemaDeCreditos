$(document).ready(function(){
    $.post( "../../BACK/PHP/get_session.php", {     
        },function( data ) {
            $("#generadorQR").val(data);
        }); 
    
});