$(document).ready(function(){
    var fileExtension = "";
    var nombreImg="";
    
    $.post( "../../BACK/PHP/combo_eventos.php", {},
        function( data ) {
        $("#solEvento").html(data);
    }); 
    
    $("#solEvento").change(function(){
        switch( $("#solEvento").val()){
               case "-1":
                    $('#descEvento').css('display', 'block'); 
               break;
               default:
                    $('#descEvento').css('display', 'none'); 
               break;
        }
    });
   
    $("#SolHis").click(function(){
            $.post( "../../BACK/PHP/historialSolicitudes.php", {},
        function( data ) {
        $("#historial").html(data);
    }); 
    });
   
    
        
    $("#SolAsis").click(function(){
        
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
        
        $.post( "../../BACK/PHP/solicitarCreditos.php", {
            idEvento:$("#solEvento").val(),
            comentario:$("#descEvento").val(),
            imagen:"../../BACK/PHP/files/"+nombreImg,
            estado:"0"
            
            
        },function( data ) {
            alert(data);
        });

        
        
    });
    
    
    
        //función que observa los cambios del campo file y obtiene información
    $(':file').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#imagenSolicitud")[0].files[0];
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