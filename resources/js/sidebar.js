  $('#boton-abrir').click(function(){

    $('.sidebar').addClass('abrir-sidebar');
    $('.cerrar-sidebar').addClass('abrir-sidebar');
    });

    $('.cerrar-sidebar').click(function(){
    $('.sidebar').removeClass('abrir-sidebar');
    $('.cerrar-sidebar').removeClass('abrir-sidebar');
});