<div class="navigation">
  <div><a id="inicio" href="#inicio">inicio</a></div>
  <div><a id="tablas" href="#tablas">tablas</a></div>
  <div><a id="producto" href="#productos">productos</a></div>
  <div><span class="expandir-navigator"><i class="fas fa-align-right"></i></span></div>
</div>

<script>
$(".expandir-navigator").click(function () { 
  $("header").toggleClass("cambiarNavigate");
});
  $('#inicio').click(function() {
    $('main').removeClass(function() {
      return $(this).attr('class');
    }).addClass('main');
    
    $("main").load("view/components/inicio/presentacion.php");
  });
  $('#tablas').click(function() {
    $('main').removeClass(function() {
      return $(this).attr('class');
    }).addClass('tablas');
    
    $("main").load("view/components/tablas/tablasMaster.php");
  });
  $('#producto').click(function() {
    $('main').removeClass(function() {
      return $(this).attr('class');
    }).addClass('producto');
    
    $("main").load("view/components/productos/productos.php");
  });
</script>