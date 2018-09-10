<?php
   // require "comboUsuarios.php";
    require "login.php";
   /* $usuarios=new comboUsuario();
     $array_usuarios=$usuarios->get_usuarios();*/
    $usuarios=new Login();
    $array_usuarios=$usuarios->validar_usuario();
    
  /*  foreach($array_usuarios as $elemento){
        echo "<table><tr><td>";
        echo $elemento['nombre']."</td><td>";
        echo $elemento['apellido']."</td><td>";
        echo $elemento['matricula']."</td><td>";
        echo $elemento['tipo']."</td><td></tr></table>";
        echo "<br>";
        echo "<br>";
    }*/
/*foreach($array_usuarios as $elemento)
    echo $elemento['tipo'];*/
    echo $array_usuarios;
?>