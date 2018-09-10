$(document).ready(function(){
  
    $("#salir").click(function(){
        /*$.post( "BACK/PHP/login.php", {
            usuario:$("#usuario").val(  ),
            pass:$("#pass").val(),
            operacion:'login'
        },function( data ) {
             alert(data);
            if(data>0){
                if(data==1){                   
                    window.location="FRONT/HTML/Admin.html"
                }
                else
                    window.location="FRONT/HTML/paginaPrincipal.html"
            }
            else
            
                alert("Usuario o Contraseña incorrectos");
        });*/
        alert("adios");
    window.location="../../Index.html";
  });
})