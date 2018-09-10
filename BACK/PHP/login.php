<?php
    include ("Conexion.php");
    //include ("sesion.php");
 
        $conexion= new Conexion();
        
       // public function validar_usuario(){
           /* $resultado=$this->conexion_db->query("SELECT *FROM usuarios");
            //$usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $this->conexion_db->close();*/
            
            $stm=$conexion->conexion_db->prepare("SELECT tipo,matricula FROM usuarios where matricula= ? and pass= ? ");
            $stm->bind_param("ss", $usuario,$pass);
            $usuario=$_POST['usuario'];
            $pass=$_POST['pass'];
            $stm->execute();
            //$usuario=$stm->get_result();
            $stm->store_result();
            $conexion->conexion_db->close();
            $stm->bind_result($tipo,$matricula);    
            if($stm->num_rows==1){
                session_start();
                $stm->fetch();
                $_SESSION['id']=$matricula;
                echo $tipo;                
            }
            else
                echo 0;
      //  }
        
    

?>

