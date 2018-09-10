$(document).ready(function () {
    $.post("../../BACK/PHP/buscarCorreo.php", {}, function (data) {
        $("#cambioCorreo").val(data);
    });


    $("#cabioMail").click(function () {

      
        /*        $.post("../../BACK/PHP/actualizarCorreo.php", {
                    correo:$("#cambioCorreo").val()
                }, function (data) {
                    alert(data);
                });*/

        
        
            var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

    if (regex.test($('#cambioCorreo').val().trim())) {
        $.post("../../BACK/PHP/actualizarCorreo.php", {
                    correo:$("#cambioCorreo").val()
                }, function (data) {
                    alert(data);
                })

    } else {
        alert('La direccón de correo no es válida');
    }
        
        
    });


});