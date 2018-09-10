<?php
    include ("Conexion.php");

        $conexion= new Conexion();
        $combo="";

        
           /* $resultado=$this->conexion_db->query("SELECT *FROM usuarios");
            //$usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $this->conexion_db->close();*/
            $stm=$conexion->conexion_db->prepare("SELECT imagen,nombre FROM eventos where fecha > CURDATE()");
            $stm->execute();
            //$usuarios=$stm->get_result();
            $stm->store_result();
            $stm->bind_result($imagen,$nombre);
            while ($stm->fetch()) {
                 $combo.='<div>
     <img src="'.$imagen.'">
   </div>';
            }    
            $conexion->conexion_db->close();
            echo $combo;
        
        
    

?>