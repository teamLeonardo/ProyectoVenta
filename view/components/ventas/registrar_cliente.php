<?php
session_start();
include_once '../../../model/tablapdo.php';
$objVenta = new phppdo('PuntoDeVenta');


?>
<script>
  var urlProcesos = 'controller/control-pag.php'; 
  window.onerror = new Function("return true");
  $("#dialogoCiente").dialog({
    autoOpen: false,
    show: {
      effect: "scale",
      duration: 500
    },
    hide: {
      effect: "scale",
      duration: 500
    }
  });
  //#region form-agregar
    $("#opener").on("click", function() {
      _this = $(this).parent();
      var createf = '';
      var $campos = _this.find('table#tabla-cliente thead tr th').map(function() {
        return $(this).text();
      }).get();
      for (let index = 1; index < $campos.length; index++) {
        if (index == 6) {
          var elemento = $campos[index];


          createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
          createf += '<input class="form-control form-control-sm mb-2" disabled="disabled" id="' + elemento + '" type="text" value="' + <?php echo $_SESSION['empresa']; ?> + '">';
        } else if (index == 5) {
          var elemento = $campos[index];


          createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
          createf += '<input class="form-control form-control-sm mb-2" disabled="disabled" id="' + elemento + '" type="text" value="3">';

        } else {

          var elemento = $campos[index];

          createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
          createf += '<input class="form-control form-control-sm mb-2" id="' + elemento + '" type="text" placeholder="' + elemento + '">';
        }

      }

      createf += '<button type="submit" class="btn btn-primary" id="btn-agregarCliente">aceptar</button>';
      $('#dialogoCiente fieldset form#from-venta').html(createf);
      $("#dialogoCiente").dialog("open");
    });
  //#endregion
  //#region datatable
    $('#tabla-cliente').DataTable();
  //#endregion 
  //#region form-update
    $('#tabla-cliente').on('click', 'tr', function() {
      $("#dialogoCiente").dialog("close");
      __this = $(this);
      var createf = '';
      var arrayFormulario = Array;
      var $valore = __this.find('td').map(function() {
        return $(this).text();
      }).get();
      var $campos = __this.closest('table').find('thead tr th').map(function() {
        return $(this).text();
      }).get();
      createf += '<input type="hidden" name="id-pag" value="registro-cliente-crear">'; 
      for (let index = 0; index < $campos.length; index++) {

        if (index == 0 || index == 6) {
          var elemento = $campos[index];
          var valore = $valore[index];

          createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
          createf += '<input class="form-control form-control-sm mb-2"  disabled="disabled" id="' + elemento + '" type="text" value="' + valore + '">';

        } else {
          var elemento = $campos[index];
          var valore = $valore[index];

          createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
          createf += '<input class="form-control form-control-sm mb-2" id="' + elemento + '" type="text" value="' + valore + '">';
        }
      }
      createf += '<button type="submit" class="btn btn-primary">aceptar</button>';
      $('#dialogoCiente fieldset form#from-venta').html(createf);
      $("#dialogoCiente").dialog("open");

    });
  //#endregion
  //#region agregarCliente
    $('form#from-venta').on('click','button#btn-agregarCliente', function (e) {
      e.preventDefault()
      __this = $(this);
      $.ajax({
        type: "POST",
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        url: url,
        data: $('#from-venta').serialize(),
        success: function (response) {

        }
      });

    });
  //#endregion
</script>
<button type="button" id="opener" class="btn btn-success mb-2">MODAL 1</button>
<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Table responsive</h5>
        <div class="table-responsive">
          <table class="table" id="tabla-cliente">

            <?php $objVenta->listarTb("select * from cliente", $arrayName = array()) ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="dialogoCiente" title="Basic dialog">
  <fieldset>
    <form  id="from-venta">

    </form>
  </fieldset>
</div>