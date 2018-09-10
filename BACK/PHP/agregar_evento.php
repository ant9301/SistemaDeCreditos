<?php
    include ("Conexion.php");

        $conexion= new Conexion();

            $stm=$conexion->conexion_db->prepare("insert into eventos (nombre,lugar,fecha,hora,creditos,imagen)values(?,?,?,?,?,?)  ");
            $stm->bind_param("ssssis", $nombre,$lugar,$fecha,$hora,$creditos,$img);
            $nombre=$_POST['nombre'];
            $lugar=$_POST['lugar'];
            $creditos=$_POST['creditos'];
            $fecha=$_POST['fecha'];
            $hora=$_POST['hora'];
            $img=$_POST['img'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se dio de alta el evento ".$nombre." con fecha  ".$fecha;                
            }
            else
                echo "No se apodido dar de alta al usuario intente mas tarde";
            
        
    

?>

