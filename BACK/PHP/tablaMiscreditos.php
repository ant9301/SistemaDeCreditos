<?php
        include ("Conexion.php");
        session_start();
        $conexion= new Conexion();
            $tabla="<table class='table table-hover'>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Horas</th>";


        $stm=$conexion->conexion_db->prepare("SELECT  e.nombre, e.fecha, a.horas   FROM usuarios u ,asistencia a ,eventos e where   u.matricula= ? and u.matricula=a.matricula and  a.id_evento =e.id_evento ");
        $stm->bind_param("s", $matricula);
        $matricula=$_SESSION['id'];
        $stm->execute();
        $usuario=$stm->get_result();                    
        
        
        while ($row = $usuario->fetch_array(MYSQLI_ASSOC))
        {
            $tabla.="<tr>
                      <td>".$row['nombre']."</td>
                      <td>".$row['fecha']."</td>
                      <td>".$row['horas']."</td>
                  </tr>";
           
        }
           $tabla.="</table>";
            $conexion->conexion_db->close();
            echo $tabla;

            
      




?>