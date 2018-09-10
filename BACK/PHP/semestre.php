<?php
    include ("Conexion.php");

        $conexion= new Conexion();

            $stm=$conexion->conexion_db->prepare("INSERT INTO semestre(inicio, fin) VALUES (?,?) ");
            $stm->bind_param("ss", $inicio,$fin);
            $inicio=$_POST['inicio'];
            $fin=$_POST['fin'];
            $stm->execute();                
            $conexion->conexion_db->close();  
            if($stm->affected_rows==1){                    
                $stm->close();                
                echo "Se dio de alta las fechas del semestre ";                
            }
            else
                echo "No se apodido ingresar las fechas del semestre";
                

?>