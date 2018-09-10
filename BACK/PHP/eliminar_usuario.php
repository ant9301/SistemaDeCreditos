<?php
    include ("Conexion.php");

        $conexion= new Conexion();


            $stm=$conexion->conexion_db->prepare("DELETE FROM `usuarios` WHERE id= ?");
            $stm->bind_param("d",$id);       
            $id=$_POST['idUsuario'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se  elimino el usuario ";                
            }
            else
                echo "No se apodido eliminar al usuario intente mas tarde";
            
        
    

?>