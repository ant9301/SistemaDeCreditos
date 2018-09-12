<?php
    include ("Conexion.php");
    session_start();
        $conexion= new Conexion();
    $tabla="<table class='table table-hover'>   
            <thead>
                <tr>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Matricula</th>
              <th>Evento</th>
              <th>Ver imagen</th>
              <th></th>
              <th>Numero Horas</th>
              <th>Aprobar</th>
              <th>Rechazar</th>
              </tr>
              </thead>
              <tbody>
              ";
            
    $stm=$conexion->conexion_db->prepare("select u.nombre , u.apellido , s.matricula,e.id_evento as idevento, e.nombre as evento ,s.comentario, s.imagenes from  solicitud_asistencia s, usuarios u,eventos e where s.estado = 0 and s.matricula=u.matricula and s.id_evento=e.id_evento");
            $stm->execute();                
    $cont=0;          
            $resultado = $stm->get_result();
        while ($fila = $resultado->fetch_assoc())
        {
            $tabla.="<tr class='".$cont."'>
                      <td>".$fila['nombre']."</td>
                      <td>".$fila['apellido']."</td>
                      <td>".$fila['matricula']."</td>
                      <td id='".$fila['idevento']."' >".$fila['evento']."</td>              
                      <td><button class='imgSol' id='".$fila['imagenes']."' >Ver imagen</button></td>
                      <td><label for=''>Horas/Comentario</label></td>
                      <td><input type='text' class='eliminarComentario' id='0".$cont."'><br></td>
                      <td><button class='btaceptar'>Aprobar</button></td>
                      <td><button class='btdenegar'>Denegar</button></td>
                  </tr>";
           
            $cont++;
        }
        $tabla.="</tbody></table>";
$conexion->conexion_db->close();
        echo $tabla;

?>