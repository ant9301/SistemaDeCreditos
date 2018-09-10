<?php
    require "iniciar.php";
    switch($_POST['operacion']){
        case 'login':
            $usuarios=new Login();
            $array_usuarios=$usuarios->validar_usuario();
            echo $array_usuarios;
        break;
        case 'agregarUsuario':
            $usuarios=new InsertarUsuarios();
            $array_usuarios=$usuarios->insertar_usuario();
            echo $array_usuarios;
        break;
        case 'comboUsuarios':
            $combo=new InsertarUsuarios();
            $array_usuarios=$usuarios->insertar_usuario();
            echo $array_usuarios;
        break;
        
    }

?>