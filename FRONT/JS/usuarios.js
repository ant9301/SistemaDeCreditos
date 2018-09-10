$(document).ready(function(){
  
    $("#UsuariosSelect").change(function(){
   
        
        switch($("#UsuariosSelect").val()){
            case "1":              
                $('#agregarUsuario').css('display', 'block');
                $('#ModUsuarios').css('display', 'none');
                $('#ElimnarUsuario').css('display', 'none');
            break;
            case "2":          
                $.post( "../../BACK/PHP/comboUsuarios.php", {},
                    function( data ) {                  
                    $("#ModificarSelect").html(data);
                    // $('#ModificarSelect').editableSelect();
                });
                $('#agregarUsuario').css('display', 'none');
                $('#ModUsuarios').css('display', 'block');
                $('#ElimnarUsuario').css('display', 'none');
            break;
            case "3":
                $.post( "../../BACK/PHP/comboUsuarios.php", {},function( data ) {
                    $("#ElimnarSelect").html(data);
                });
                $('#ElimnarUsuario').css('display', 'block');
                $('#agregarUsuario').css('display', 'none');
                $('#ModUsuarios').css('display', 'none');
           
            break;
       }
        
    });
    
    
    
    $("#BTAgregarUsuario").click(function(){
        $.post( "../../BACK/PHP/agregar_usuarios.php", {
            nombre:$("#AgregarNombre").val(),
            apellido:$("#ApAgregar").val(),
            matricula:$("#AgregarMatricula").val(),
            tipo:$("#tipoSelect").val(),
            correo:$("#AgregarCorreo").val(),
            grupo:$("#AgregarGrupo").val(),
            semestre:$("#Agregarsemestre").val()
        },function( data ) {
            alert(data);
        });
    
    });
    
    
    $("#ModificaUsuario").click(function(){
        $.post( "../../BACK/PHP/mod_usuario.php", {
            matricula:$("#ModMatricula").val(),
            pass:$("#ModPass").val(),
            nombre:$("#ModNombre").val(),
            apellido:$("#ModAp").val(),
            id:$("#ModificarSelect").val(),
        },function( data ) {
            alert(data);
    });
    
    });    
    
    
    $("#BTelimnarUsuario").click(function(){
        $.post( "../../BACK/PHP/eliminar_usuario.php", {
            idUsuario:$("#ElimnarSelect").val()
        },function( data ) {
            alert(data);
    });
    
    });
    
    
    $('#ModificarSelect').change(function(){
        $.post( "../../BACK/PHP/buscar_usuarios.php", {
        idUsuario:$("#ModificarSelect").val()
        },function( data ) {
            var usuario= JSON.parse(data);
            $("#ModNombre").val(usuario.nombre);
            $("#ModAp").val(usuario.apellido);
            $("#ModMatricula").val(usuario.matricula);
            $("#ModPass").val(usuario.pass);
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
    
    
    
    
    
})