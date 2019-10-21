<?php
session_start();
include_once '../../../model/tablapdo.php';
$objVenta = new phppdo('PuntoDeVenta');


?>
<script>
  var urlProcesos = 'controller/control-pag.php';
  var identificador = null; 
  var $dialogo = $("#dialogoCiente");
  $dialogo.dialog({
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

    createf += '<input type="hidden" name="id-pag" value="registro-cliente-crear">';
    for (let index = 1; index < $campos.length; index++) {
      if (index == 6) {
        var elemento = $campos[index];


        createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
        createf += '<input class="form-control form-control-sm mb-2" name= "' + elemento + '" readonly="readonly" id="' + elemento + '" type="text" value="' + <?php echo $_SESSION['empresa']; ?> + '">';
      } else if (index == 5) {
        var elemento = $campos[index];


        createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
        createf += '<input class="form-control form-control-sm mb-2" name= "' + elemento + '" readonly="readonly" id="' + elemento + '" type="text" value="3">';

      } else {

        var elemento = $campos[index];

        createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
        createf += '<input class="form-control form-control-sm mb-2" name= "' + elemento + '" id="' + elemento + '" type="text" placeholder="' + elemento + '">';
      }

    }

    createf += '<button type="submit" class="btn btn-primary" id="btn-agregarCliente">aceptar</button>';
    $('#dialogoCiente fieldset form#from-venta').html(createf);
    $dialogo.dialog("open");
  });
  //#endregion
  //#region datatable
  $('#tabla-cliente').DataTable();
  //#endregion 
  //#region form-update
  $('#tabla-cliente').on('click', 'tr', function() {
    $dialogo.dialog("close");
    __this = $(this);
    identificador = __this;
    var createf = '';
    var arrayFormulario = Array;
    var $valore = __this.find('td').map(function() {
      return $(this).text();
    }).get();
    var $campos = __this.closest('table').find('thead tr th').map(function() {
      return $(this).text();
    }).get();
    createf += '<input type="hidden" name="id-pag" value="registro-cliente-update">';
    for (let index = 0; index < $campos.length; index++) {

      if (index == 0 || index == 6) {
        var elemento = $campos[index];
        var valore = $valore[index];

        createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
        createf += '<input class="form-control form-control-sm mb-2" name="'+elemento+'" readonly="readonly" id="' + elemento + '" type="text" value="' + valore + '">';

      } else {
        var elemento = $campos[index];
        var valore = $valore[index];

        createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
        createf += '<input class="form-control form-control-sm mb-2" name="'+elemento+'" id="' + elemento + '" type="text" value="' + valore + '">';
      }
    }
    createf += '<button type="submit" class="btn btn-primary" id="btn-upCliente">Actualizar</button>';
    $('#dialogoCiente fieldset form#from-venta').html(createf);

    $dialogo.dialog("open");

  });
  //#endregion
  //#region agregarCliente
  $('#dialogoCiente fieldset form#from-venta').on('click', 'button#btn-agregarCliente', function(e) {

    e.preventDefault();
    __this = $(this);

    $.ajax({
      type: "POST",
      url: urlProcesos,
      data: $('#from-venta').serialize(),
      dataType: "json",
      beforeSend: function() {
        alertify.warning('esperando');
      },
      success: function(response) {
        if (response.estado == true) {
          var rowclien = '<tr>';
          var formularioValorew = $('#from-venta').find('input').map(function() {
            return $(this).val();
          }).get();
          var numFilas = parseInt($('#tabla-cliente tbody tr').last().find('td:first-child').text()) + 1;
          rowclien += '<td>' + String(numFilas) + '</td>';
          for (let index = 1; index < formularioValorew.length; index++) {
            var elem = formularioValorew[index];
            rowclien += '<td>' + elem + '</td>';
          }
          rowclien += '</tr>';
          $('#tabla-cliente tbody').append(rowclien);
          alertify.success('Se agrego correctamente');

        } else {
          alertify.error('no se pudo agregar');
        }
      },
      error: function(xhr) { // if error occured
        alertify.error('ajax error: ' + xhr.statusText + xhr.responseText);

      }
    });

    $dialogo.dialog("close");
  });
  //#endregion
  //#region actualizar  
  $('#dialogoCiente fieldset form#from-venta').on('click', 'button#btn-upCliente', function(e) {

    e.preventDefault();
    __this = $(this);
    $.ajax({
      type: "POST",
      url: urlProcesos,
      data: $('#from-venta').serialize(),
      dataType: "json",
      beforeSend: function() {
        alertify.warning('esperando....');
      },
      success: function(response) {
        if (response.estado == true) {
         
          alertify.success('se actualizo Corectamente');
          
          identificador.replaceWith(function() {
            var datos = '<tr>';
            datos += "<td>"+response.data[5]+"</td>";
            datos += "<td>"+response.data[0]+"</td>";  
            datos += "<td>"+response.data[1]+"</td>";
            datos += "<td>"+response.data[2]+"</td>";
            datos += "<td>"+response.data[3]+"</td>";
            datos += "<td>"+response.data[4]+"</td>";  
             datos += '</tr>';
            
            return datos;
          });
          console.log();

            
        } else {
          alertify.error('no se pudo actualizar');
        }
      },
      error: function(xhr) { // if error occured
        alertify.error('ajax error: ' + xhr.statusText + xhr.responseText);

      }
    });

    $dialogo.dialog("close");
  });
  ///#endregion
</script>
<button type="button" id="opener" class="btn btn-success mb-2">agregar</button>
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
    <form id="from-venta">

    </form>
  </fieldset>
</div>