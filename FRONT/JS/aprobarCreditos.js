$(document).ready(function(){
    $.post( "../../BACK/PHP/buscar_sol_creditos.php", {     
        },function( data ) {
            $("#aprobar_creditos").append(data);
        }); 
    $("#aprobar_creditos").on('click', '.btaceptar', function () {        
        x= $(this).parents("tr").attr("class");
        if($.isNumeric($("#0"+x).val()) && $("#0"+x).val()>0){
                $.post("../../BACK/PHP/aprobarAsistencia.php", {
                    matricula:$(this).parents("tr").find("td").eq(2).text(),
                    evento:$(this).parents("tr").find("td").eq(3).attr("id"),
                    horas:$("#0"+x).val()                    
                }, function (data) {
                    alert(data)
                });    
        }else
            alert("Se debe indicar un numero de horas mayor a 0")
        
        
        });
    
    
    $("#aprobar_creditos").on('click', '.btdenegar', function () {        
        x= $(this).parents("tr").attr("class");
                $.post("../../BACK/PHP/denegarCredito.php", {
                    matricula:$(this).parents("tr").find("td").eq(2).text(),
                    evento:$(this).parents("tr").find("td").eq(3).attr("id"),
                    comentario:$("#0"+x).val()                    
                }, function (data) {
                    alert(data)
                });    
        
        
        });
    
   
});