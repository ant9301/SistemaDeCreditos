<?php

    include ("Conexion.php");

        $conexion= new Conexion();

        $stm1=$conexion->conexion_db->prepare("SELECT matricula FROM asistencia where matricula= ? and id_evento = ?");
        $stm1->bind_param("ss", $matricula,$id);
        $matricula=$_POST['matricula'];
        $id=$_POST['evento'];
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
    
            $stm2=$conexion->conexion_db->prepare("update solicitud_asistencia set estado=2 where matricula= ? and id_evento =? ");
            $stm2->bind_param("ss", $id,$matricula);
            $id=$_POST['evento'];
            $matricula=$_POST['matricula'];
            $stm2->execute();                               
                $stm2->close();      
            
            $stm=$conexion->conexion_db->prepare("insert into asistencia(id_evento,matricula,horas)values(?,?,?)  ");
            $stm->bind_param("iss", $id,$matricula,$horas);
            $id=$_POST['evento'];
            $matricula=$_POST['matricula'];
            $horas=$_POST['horas'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se dio de alta en el evento al alumno";                
            }
            else{
                $stm->close();
                echo "No se apodido dar de alta al alumno intente mas tarde";
            }
        
        
     
    

}
?>