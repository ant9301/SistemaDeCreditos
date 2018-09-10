<?php
  
 

session_start();
/*

$cuerpo1='    <img src="../../FRONT/RES/uaem-logo.png"  style="position:absolute;width:150px; magin-top:80px"><br>
    <p style="margin-left:250px;margin-top:40px;color:#0080FF ">Direccion Academica Facultad De Ciencias del Deporte</p>
    <hr/ style="width:80%; border-color:#04B431;margin-left:170px;margin-top:20px; ">
    <p style="margin-left:300px; ">Cuernavaca Morelos , 23 de agosto de 2018 </p>
    <br>
    <p style="margin-left:50px;margin-right:50px ">El alumno Juan antonio flores de jesus a acreditado 30 horas academicas por lo que se genera esta constancia que avala las horas acreditadas durante el semestre</p>
    <br>
    <label for="" style="margin-left:50px;margin-right:50px ">Folio 0001</label>';

*/

    include ("Conexion.php");
    //include ("sesion.php");
 
        $conexion= new Conexion();
        
       // public function validar_usuario(){
           /* $resultado=$this->conexion_db->query("SELECT *FROM usuarios");
            //$usuarios=$resultado->fetch_all(MYSQLI_ASSOC);
            $this->conexion_db->close();*/
            $stm=$conexion->conexion_db->prepare("SELECT *FROM usuarios where matricula = ?");
            $stm->bind_param("s", $idusuario);
            $idusuario=$_SESSION['id'];
            $stm->execute();
            $usuario=$stm->get_result();            
            //$stm->store_result();            
            $row = $usuario->fetch_array(MYSQLI_ASSOC);
            $datos=array(
                "nombre"=>$row["nombre"],
                "apellido"=>$row["apellido"],
                "matricula"=>$row["matricula"],                
                "pass"=>$row["pass"]
            );

$cuerpo1='    <img src="../../FRONT/RES/uaem-logo.png" alt="" style="position:absolute;width:150px; magin-top:80px"><br>
    <p style="margin-left:250px;margin-top:40px;color:#0080FF ">Direccion Academica Facultad De Ciencias del Deporte</p>
    <hr/ style="width:80%; border-color:#04B431;margin-left:170px;margin-top:20px; ">
    <p style="margin-left:300px; ">Cuernavaca Morelos , 23 de agosto de 2018 </p>
    <br>
    <p style="margin-left:50px;margin-right:50px ">El alumno '.$row["nombre"]. ' '.$row["apellido"]. ' con matricula '.$row["matricula"].' a acreditado 30 horas academicas por lo que se genera esta constancia que avala las horas acreditadas durante el semestre</p>
    <br>
    <label for="" style="margin-left:50px;margin-right:50px ">Folio 0002</label><br>
     <img src="../../FRONT/RES/uaemLetras.png" alt="" style="width:8%;float: right; "> <br>
     <img src="../../FRONT/RES/bannerConstancia.png" alt="" style="width:100%; margin-bottom: 0%;">';




//Importamos la libreria que utilizamos 
include("mpdf60/mpdf.php");
// generamos un objeto pfd y accedemos a sus metodos para crear y guardar el PFD
$mpdf=new mPDF();
$mpdf->SetHTMLHeader($cabecera);
$mpdf->SetHTMLFooter($pie);
$mpdf->WriteHTML($cuerpo1);
		$mpdf->Output("files/nuevo.pdf");

//guardamos el link en la tabla donde guardarmos la calificacion del examen 



//$mpdf->Output();


?>