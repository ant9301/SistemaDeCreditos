<?php
    include ("Conexion.php");

        $conexion= new Conexion();
        
           /* $resultado=$this->conexion_db->query("SELECT *FROM usuarios");
            //$usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $this->conexion_db->close();*/
            
            $stm=$conexion->conexion_db->prepare("SELECT *FROM usuarios where matricula = ?");
            $stm->bind_param("s", $idusuario);
            $idusuario=$_POST['idUsuario'];
            $stm->execute();
            $usuario=$stm->get_result();            
            //$stm->store_result();            
            $row = $usuario->fetch_array(MYSQLI_ASSOC);
            $datos=array(
                "nombre"=>$row["nombre"],
                "pass"=>$row["pass"],
                "apellido"=>$row["apellido"],
                "matricula"=>$row["matricula"],                
                "correo"=>$row["correo"],
                "grupo"=>$row["grupo"],
                "semestre"=>$row["semestre"],
            );
           
            $conexion->conexion_db->close();
            echo json_encode($datos);
        
        
    

?>