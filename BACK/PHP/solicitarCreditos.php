<?php
    include ("Conexion.php");
    session_start();
        $conexion= new Conexion();

            
    $stm=$conexion->conexion_db->prepare("insert into solicitud_asistencia(ID_evento,matricula,comentario,imagenes,estado)values(?,?,?,?,?)");
            $stm->bind_param("isssi", $id,$matricula,$comentario,$imagen,$estado);
            $id=$_POST['idEvento'];
            $matricula=$_SESSION['id'];
            $comentario=$_POST['comentario'];
            $imagen=$_POST['imagen'];
            $estado=$_POST['estado'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se envio la solicitud";                
            }else
                echo "No se pudo registrar la solicitud";



?>