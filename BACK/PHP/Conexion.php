<?php
    require "Variables_conexion.php";

    class Conexion{
        public $conexion_db;
        
        public function Conexion(){
            $this->conexion_db=new mysqli(DB_HOST, DB_USER,DB_PASS,DB_NAME);
            if($this->conexion_db->connect_errno){
                echo "Fallo al conectar a base de datos";
                return;
            }
            $this->conexion_db->set_charset(DB_CHARSET);
        }
    }


?>