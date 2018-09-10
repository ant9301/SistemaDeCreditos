<?php
    include ("Conexion.php");

        $conexion= new Conexion();
        
           /* $resultado=$this->conexion_db->query("SELECT *FROM usuarios");
            //$usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $this->conexion_db->close();*/
            
            $stm=$conexion->conexion_db->prepare("SELECT *FROM eventos where id_evento = ?");
            $stm->bind_param("s", $idusuario);
            $idusuario=$_POST['idevento'];
            $stm->execute();
            $usuario=$stm->get_result();            
            //$stm->store_result();            
            $row = $usuario->fetch_array(MYSQLI_ASSOC);
            $datos=array(
                "modeventoNombre"=>$row["nombre"],
                "modeventoLugar"=>$row["lugar"],
                "modeventoFecha"=>$row["fecha"],                
                "modeventoHora"=>$row["hora"],
                "modeComentario"=>$row["comentario"],
                "modeventoCreditos"=>$row["creditos"],
                //"img"=>$row["imagen"]
            );
           
            $conexion->conexion_db->close();
            echo json_encode($datos);
        
        
    

?>