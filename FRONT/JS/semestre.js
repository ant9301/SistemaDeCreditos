$(document).ready(function(){
     
    
    $("#AgregarSemestre").click(function () {
        if ($("#InicioSemestre").val() != "" && $("#FinSemestre").val() != "") {
            $.post("../../BACK/PHP/semestre.php", {
                inicio:$("#InicioSemestre").val() ,
                fin:$("#FinSemestre").val()
            }, function (data) {
                alert(data);
            });
        } else
            alert("Se tiene que indicar ambas fechas")


    });
    
    
});