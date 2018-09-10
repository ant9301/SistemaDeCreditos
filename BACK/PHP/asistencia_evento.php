<?php

    include ("Conexion.php");

        $conexion= new Conexion();

        $stm1=$conexion->conexion_db->prepare("SELECT matricula FROM asistencia where matricula= ? and id_evento = ?");
        $stm1->bind_param("ss", $matricula,$id);
        $matricula=$_POST['matricula'];
        $id=$_POST['idEvento'];
        $stm1->execute();
        $stm1->store_result();
        $stm1->bind_result($matriculaId);    
        if($stm1->num_rows>0){
            $stm1->fetch();
            $stm1->close();  
            echo "El alumno ya tiene asistencia a este evento";                
        }
else
{
            $stm=$conexion->conexion_db->prepare("insert into asistencia(id_evento,matricula,horas)values(?,?,?)  ");
            $stm->bind_param("isi", $id,$matricula,$horas);
            $id=$_POST['idEvento'];
            $matricula=$_POST['matricula'];
            $horas=$_POST['horas'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se dio de alta en el evento al alumno";                
            }
            else
                echo "No se apodido dar de alta al alumno intente mas tarde";

}
?>