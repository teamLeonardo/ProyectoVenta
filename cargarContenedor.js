$(document).ready(function() {
    var $contenedor = $('.app-main__inner');
    $(".vertical-nav-menu").on('click', 'a', function(e) {
        var $seleccion = $(this).attr('id');
        $(this).closest('.vertical-nav-menu').find('a.mm-active').removeClass('mm-active');


        if ($seleccion == undefined) {
            console.log('no tiene redirecion');
        } else {
            $(this).addClass('mm-active');
            console.log($seleccion);
            var modulo = $(this).closest('li.mm-active').attr('id');
            $contenedor.load("view/components/" + modulo + "/" + $seleccion + ".php");
        }
        e.preventDefault();
    });

});