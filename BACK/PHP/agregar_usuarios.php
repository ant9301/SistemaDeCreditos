<?php
    include ("Conexion.php");

        $conexion= new Conexion();

        $stm1=$conexion->conexion_db->prepare("SELECT matricula FROM usuarios where matricula= ?");
        $stm1->bind_param("s", $matricula);
        $matricula=$_POST['matricula'];
        $stm1->execute();
        $stm1->store_result();
        $stm1->bind_result($matriculaId);    
        if($stm1->num_rows==1){
            $stm1->fetch();
            $stm1->close();  
            return "El usuario con la matricula".$matriculaId." ya existe dentro del sistema";                
        }
        else
        {
            $stm=$conexion->conexion_db->prepare("insert into usuarios(matricula,pass,nombre,apellido,grupo,semestre,correo,tipo)values(?,?,?,?,?,?,?,?)  ");
            $stm->bind_param("ssssssss", $matricula,$pass,$nombre,$apellidos,$grupo,$semestre,$correo,$tipo);
            $matricula=$_POST['matricula'];
            $pass=$_POST['matricula'];
            $nombre=$_POST['nombre'];
            $apellidos=$_POST['apellido'];
            $grupo=$_POST['grupo'];
            $semestre=$_POST['semestre'];
            $correo=$_POST['correo'];
            $tipo=$_POST['tipo'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se dio de alta el alumno ".$nombre." ".$apellidos;                
            }
            else
                echo "No se apodido dar de alta al usuario intente mas tarde";
            }
        
    

?>

