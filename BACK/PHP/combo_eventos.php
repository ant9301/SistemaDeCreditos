<?php
    include ("Conexion.php");

        $conexion= new Conexion();
        $combo="<option value='0' disabled selected>
                     Selecciona una opcion
                 </option>";
           /* $resultado=$this->conexion_db->query("SELECT *FROM usuarios");
            //$usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $this->conexion_db->close();*/
            
            $stm=$conexion->conexion_db->prepare("SELECT id_evento , nombre FROM eventos");
            $stm->execute();
            //$usuarios=$stm->get_result();
            $stm->store_result();
            $stm->bind_result($id,$nombre);
            while ($stm->fetch()) {
                 $combo.="<option value=".$id.">
                     ".$nombre."
                 </option>";
            }    
            $conexion->conexion_db->close();
            echo $combo;
        
        
    

?>