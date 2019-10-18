$(document).ready(function() {
    var $contenedor = $('.app-main__inner');
    var modalContainer = $('.zonaModal');

    $contenedor.load("view/components/inicio/primeraVista.php");

    $('#primeraVista').addClass('mm-active');


    $(".vertical-nav-menu").on('click', 'a', function(e) {
        var $seleccion = $(this).attr('id');
        $(this).closest('.vertical-nav-menu').find('a.mm-active').removeClass('mm-active');
        if ($seleccion == undefined) {
            console.log('no tiene redirecion');
        } else {
            $(this).addClass('mm-active');
            console.log($seleccion);
            var modulo = $(this).closest('li.mm-active').attr('id');
            if (modulo != undefined) {

                $contenedor.load("view/components/" + modulo + "/" + $seleccion + ".php");
            } else {
                modulo = $(this).closest('li').attr('id');
                $contenedor.load("view/components/" + modulo + "/" + $seleccion + ".php");

            }

        }
        e.preventDefault();
    });

    $contenedor.on('click', 'button.modal-activacion', function() {
        _this = $(this);
        var datos = _this.parent().find('table thead tr th').map(function() {
            return $(this).text();
        }).get();
        var arreglo = { 'identificador': 'modal-cliente', 'obj': datos };
        $.ajax({
            type: "GET",
            url: "view/components/modales/modal_crear.php",
            data: arreglo,
            dataType: "html",
            success: function(response) {
                modalContainer.html(response);
            }
        });

        _this.closest('.modal-cliente').modal('show');

    });
});