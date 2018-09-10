<?php
    include ("Conexion.php");

        $conexion= new Conexion();

//,imagen= ? 
            $stm=$conexion->conexion_db->prepare("UPDATE eventos SET nombre= ?,lugar= ?,fecha= ?,hora= ?,creditos= ?, comentario=? WHERE id_evento= ?");
            $stm->bind_param("ssssii", $nombre,$lugar,$fecha,$hora,$creditos,$id,$comentario);//,$img,
            $nombre=$_POST['nombre'];
            $lugar=$_POST['lugar'];
            $creditos=$_POST['creditos'];
            $fecha=$_POST['fecha'];
            $hora=$_POST['hora'];
            $comentario=$_POST['comentario'];
            //$img=$_POST['img'];
            $id=$_POST['id'];
            $stm->execute();  
            
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se modifico el evento ".$nombre." con fecha  ".$fecha;                
            }
            else
                echo "No se apodido modificar el evento intente mas tarde";
            
        
    

?>

