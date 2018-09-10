<?php
    include ("Conexion.php");

        $conexion= new Conexion();


            $stm=$conexion->conexion_db->prepare("UPDATE usuarios SET matricula= ?,pass= ?,nombre= ?,apellido= ? WHERE matricula= ?");
            $stm->bind_param("ssssd", $matricula,$pass,$nombre,$apellido,$id);
            $matricula=$_POST['matricula'];
            $pass=$_POST['pass'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $id=$_POST['id'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se modifico al usuario ".$nombre." ".$apellido;                
            }
            else
                echo "No se apodido modificar al usuario intente mas tarde";
            
        
    

?>

