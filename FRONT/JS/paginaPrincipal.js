
$(document).ready(function(){
    $.post( "../../BACK/PHP/galeriaPagPrincipal.php", {     
        },function( data ) {
            $("#slideshow").append(data);
    }); 
    

    

$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 3000);


    
});




