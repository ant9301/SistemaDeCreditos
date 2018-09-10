<?php
        include ("Conexion.php");
        session_start();
        $conexion= new Conexion();
            $tabla="<table class='table table-hover'>
              <th>Evento</th>
              <th>Comentario</th>
              <th>Estado</th>
              <th>Horas</th>";
        $estado="";

        $stm=$conexion->conexion_db->prepare("SELECT  e.nombre,s.comentario, s.estado  FROM solicitud_asistencia s ,eventos e where   s.matricula= ? and  e.id_evento =s.id_evento ");
        $stm->bind_param("s", $matricula);
        $matricula=$_SESSION['id'];
        $stm->execute();
        $usuario=$stm->get_result();                    
        
        
        while ($row = $usuario->fetch_array(MYSQLI_ASSOC))
        {
            if($row['estado']==0){
                $estado="Pendinete";    
            }elseif($row['estado']==1){
                $estado="Rechazado";
            }else
                $estado="Aprobado";
            
            $tabla.="<tr>
                      <td>".$row['nombre']."</td>
                      <td>".$row['comentario']."</td>
                      <td>".$estado."</td>
                      <td>".$estado."</td>
                  </tr>";
           
        }
           $tabla.="</table>";
            $conexion->conexion_db->close();
            echo $tabla;

?>