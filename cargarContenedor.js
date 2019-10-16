$(document).ready(function() {
    $("#register-cliente").on('click', function(e) {
        $(".app-main__inner").load("view/components/ventas/registrar_cliente.php");
        e.preventDefault();
    });

});