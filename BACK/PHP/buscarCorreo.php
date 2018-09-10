<?php 
        include ("Conexion.php");
        session_start();
        $conexion= new Conexion();
        $combo="";

        
           /* $resultado=$this->conexion_db->query("SELECT *FROM usuarios");
            //$usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $this->conexion_db->close();*/
            $stm=$conexion->conexion_db->prepare("SELECT correo FROM usuarios where matricula= ? ");
            $stm->bind_param("s", $matricula);
            $matricula=$_SESSION['id'];
            $stm->execute();
            $stm->store_result();
            $stm->bind_result($correo);
            $stm->fetch();
            $stm->close(); 
            $conexion->conexion_db->close();
            echo $correo;

?>