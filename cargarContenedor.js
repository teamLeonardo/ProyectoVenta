$(document).ready(function() {
    $("#register-cliente").click(function(e) {
        console.log("mesnaje");

        $(".app-main__inner").load("view/components/ventas/registrar_cliente.php");

    });


});