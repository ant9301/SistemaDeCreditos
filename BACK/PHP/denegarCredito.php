<?php   

    include ("Conexion.php");

        $conexion= new Conexion();

            $stm2=$conexion->conexion_db->prepare("update solicitud_asistencia set estado=1 ,comentario= ? where matricula= ? and id_evento =? ");
            $stm2->bind_param("sss", $comentario,$matricula,$id);
            $comentario=$_POST['comentario'];
            $id=$_POST['evento'];
            $matricula=$_POST['matricula'];
            $stm2->execute();                                      
            $conexion->conexion_db->close();  
            if($stm2->affected_rows==1){                    
                $stm2->close();                
                echo "Se dio de alta en el evento al alumno";                
            }
            else{
                $stm2->close();
                echo "No se apodido dar de alta al alumno intente mas tarde";
            }
        
        
     
    


?>