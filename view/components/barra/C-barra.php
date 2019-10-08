<div class="navigation">
  <div><a id="inicio" href="#inicio">inicio</a></div>
  <div><a id="ventas" href="#ventas">ventas </a></div>
  <div><a id="inventario" href="#inventario">inventario</a></div>
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
  $('#ventas').click(function() {
    $('main').removeClass(function() {
      return $(this).attr('class');
    }).addClass('ventas');
    
    $("main").load("view/components/ventas/index.php");
  });
  $('#inventario').click(function() {
    $('main').removeClass(function() {
      return $(this).attr('class');
    }).addClass('ventas');
    
    $("main").load("view/components/inventario/index.php");
  });
 
</script>