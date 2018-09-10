<?php

    include ("Conexion.php");

        $conexion= new Conexion();

        $stm1=$conexion->conexion_db->prepare("SELECT matricula FROM asistencia where matricula= ? and id_evento = ?");
        $stm1->bind_param("si", $matricula,$id);
        $matricula=$_POST['matricula'];
        $id=$_POST['idEvento'];
        $stm1->execute();
        $stm1->store_result();
        $stm1->bind_result($matriculaId);    
        if($stm1->num_rows==0){
            $stm1->fetch();
            $stm1->close();  
            echo "El alumno no tiene asistencia en este evento";                
        }
else
{
            $stm=$conexion->conexion_db->prepare("delete from asistencia  where matricula= ? and id_evento = ? ");
            $stm->bind_param("si", $matricula,$id);
            $matricula=$_POST['matricula'];
            $id=$_POST['idEvento'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows>0){                    
                $stm->close();                
                echo "Se dio de alta en el evento al alumno ";                
            }
            else
                echo "No se pudo quitar la asistencia al alumno intente mas tarde";

}
?>