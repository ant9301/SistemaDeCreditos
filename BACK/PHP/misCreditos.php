<?php
        include ("Conexion.php");
        session_start();
        $conexion= new Conexion();

        $stm=$conexion->conexion_db->prepare("SELECT  u.nombre,u.apellido,u.matricula, SUM( e.creditos ) AS total   FROM usuarios u ,asistencia a ,eventos e where   u.matricula= ? and u.matricula=a.matricula and  a.id_evento =e.id_evento ");
        $stm->bind_param("s", $matricula);
        $matricula=$_SESSION['id'];
        $stm->execute();
        $usuario=$stm->get_result();                    
        $row = $usuario->fetch_array(MYSQLI_ASSOC);
        $datos=array(
                "alumnoCreditos"=>$row["nombre"].$row["apellido"],
                "matriculaCreditos"=>$row["matricula"],                
                "horasCreditos"=>$row["total"]
            );
           
            $conexion->conexion_db->close();
            echo json_encode($datos);

            
      




?>