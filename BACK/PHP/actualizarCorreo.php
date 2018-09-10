<?php
    include ("Conexion.php");
    session_start();
        $conexion= new Conexion();

            $stm=$conexion->conexion_db->prepare("update usuarios set correo=? where matricula= ? ");
            $stm->bind_param("ss", $correo,$matricula);
            $correo=$_POST['correo'];
            $matricula=$_SESSION['id'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se actualizo el correo electronico";                
            }
            else
                echo "No se apodido actualizar el correo intente mas tarde";
            
        
    

?>