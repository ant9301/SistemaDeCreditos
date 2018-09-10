$(document).ready(function(){
    
        $("#AsistenciaSelect").change(function(){
            switch($("#AsistenciaSelect").val()){
                case "1":
                    $('#pasar_asis').css('display', 'block');
                    $('#quitar_asis').css('display', 'none');
                break;
                case "2":
                    $('#pasar_asis').css('display', 'none');
                    $('#quitar_asis').css('display', 'block');        
                break;
           }
            
        })
    
        $.post( "../../BACK/PHP/combo_eventos.php", {},
            function( data ) {
            $("#id_eventSelect").html(data);
            $("#eliminar_id_eventSelect").html(data);
            // $('#ModificarSelect').editableSelect();
        }); 
    
        $.post( "../../BACK/PHP/comboUsuarios.php", {},
            function( data ) {
            $("#matriculaAsis").html(data);
            $("#eliminar_matriculaAsis").html(data);
            // $('#ModificarSelect').editableSelect();
        });
    
    $("#asistenciaEvento").click(function(){
        $.post( "../../BACK/PHP/asistencia_evento.php", {
            matricula:$("#matriculaAsis").val(),        
            idEvento:$("#id_eventSelect").val(),        
            horas:$("#horasAsistencia").val()        
        },function( data ) {
            alert(data);
        });
    
  });    
    
    $("#quitar_Asis_Evento").click(function(){        
        $.post( "../../BACK/PHP/eliminar_asistencia.php", {
            matricula:$("#eliminar_matriculaAsis").val(),        
            idEvento:$("#eliminar_id_eventSelect").val()        
        },function( data ) {
            alert(data);
        });
    
  });
})

