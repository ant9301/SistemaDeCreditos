$(document).ready(function(){
    var fileExtension = "";
    var nombreImg="";
    $("#EventosSelect").change(function(){
   
        
        switch($("#EventosSelect").val()){
            case "1":              
                $('#crear_eventos').css('display', 'block');
                $('#mod_eventos').css('display', 'none');
                $('#eliminar_eventos').css('display', 'none');
            break;
            case "2":          
                $.post( "../../BACK/PHP/combo_eventos.php", {},
                    function( data ) {
                    $("#ModificarSelect").html(data);
                    // $('#ModificarSelect').editableSelect();
                });
                $('#crear_eventos').css('display', 'none');
                $('#mod_eventos').css('display', 'block');
                $('#eliminar_eventos').css('display', 'none');
            break;
            case "3":
                $.post( "../../BACK/PHP/comboUsuarios.php", {},function( data ) {
                    $("#ElimnarSelect").html(data);
                });
                $('#eliminar_eventos').css('display', 'block');
                $('#crear_eventos').css('display', 'none');
                $('#mod_eventos').css('display', 'none');
           
            break;
       }
        
    });
    
    
    
    $("#crearEvento").click(function(){
        
        //información del formulario
        var formData = new FormData($(".formulario")[0]);
        var message = ""; 
        //hacemos la petición ajax  
        $.ajax({
            url: '../../BACK/PHP/upload.php',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                showMessage(message)        
            },
            //una vez finalizado correctamente
            success: function(data){
                message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                showMessage(message);
                if(isImage(fileExtension))
                {
                    $(".showImage").html("<img src='../../BACK/PHP/files/"+data+"' />");
                }
            },
            //si ha ocurrido un error
            error: function(){
                message = $("<span class='error'>Ha ocurrido un error.</span>");
                showMessage(message);
            }
                 });
        
        $.post( "../../BACK/PHP/agregar_evento.php", {
            nombre:$("#eventoNombre").val(),
            lugar:$("#eventoLugar").val(),
            creditos:$("#eventoCreditos").val(),
            fecha:$("#eventoFecha").val(),
            hora:$("#eventoHora").val(),
            comentario:$("#eventoComentario").val(),
            img:"../../BACK/PHP/files/"+nombreImg
            
            
        },function( data ) {
            alert(data);
        });

        
        
    });
    
    
    $("#modEvento").click(function(){
        $.post( "../../BACK/PHP/mod_evento.php", {
            nombre:$("#modeventoNombre").val(),
            lugar:$("#modeventoLugar").val(),
            fecha:$("#modeventoFecha").val(),
            hora:$("#modeventoHora").val(),
            creditos:$("#modeventoCreditos").val(),
            comentario:$("#modComentario").val(),
            id:$("#ModificarSelect").val()
        },function( data ) {
            alert(data);
    });
    
    });    
    
    
    $("#eliminarEvento").click(function(){
        $.post( "../../BACK/PHP/eliminar_usuario.php", {
            idUsuario:$("#ElimnarSelect").val()
        },function( data ) {
            alert(data);
    });
    
    });
    
    
    $('#ModificarSelect').change(function(){
        $.post( "../../BACK/PHP/buscar_eventos.php", {
        idevento:$("#ModificarSelect").val()
        },function( data ) {
            var evento= JSON.parse(data);
            for (var key in evento) {   
                $("#"+key+"").val(evento[key]);                
            }
    });
    });
    
    $('#ElimnarSelect').change(function(){
        $.post( "../../BACK/PHP/buscar_usuarios.php", {
        idUsuario:$("#ElimnarSelect").val()
        },function( data ) {
            var usuario= JSON.parse(data);
            $("#ElimanrNombre").val(usuario.nombre);
            $("#EliminarAp").val(usuario.apellido);
            $("#ElimnarMatricula").val(usuario.matricula);
    });
    });
    
    
        
    //función que observa los cambios del campo file y obtiene información
    $(':file').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#imagenEvento")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        nombreImg=fileName;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        //mensaje con la información del archivo
        showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
    });
    

});

    function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}

function isImage(extension)
{
    switch(extension.toLowerCase()) 
    {
        case 'jpg': case 'gif': case 'png': case 'jpeg':
            return true;
        break;
        default:
            return false;
        break;
    }
}