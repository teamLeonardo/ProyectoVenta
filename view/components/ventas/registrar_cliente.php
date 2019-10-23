<?php
session_start();
include_once '../../../model/tablapdo.php';
$objVenta = new phppdo('PuntoDeVenta');


?>
<style>
  .ui-selecting {
    background: #FECA40;
  }

  .ui-selected {
    background: #F39814;
    color: white;
  }
</style>

<script>
  var urlProcesos = 'controller/control-pag.php';
  var identificador = null;
  var selev = null;
  var $dialogo = $("#dialogoCiente");
  $("#tabla-cliente tbody").bind("contextmenu", function(e) {

    return false;
  });
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
    var $campos = _this.closest('.app-main__inner').find('table#tabla-cliente thead tr th').map(function() {
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
        console.log(xhr.statusText + xhr.responseText);
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
    console.log($('#from-venta').serialize());
    
    $.ajax({
      type: "POST",
      url: urlProcesos,
      data: $('#from-venta').serialize(),
      dataType: "json",
      beforeSend: function() {
        alertify.warning('esperando....');
      },
      success: function(response) {
        console.log(response.estado);
        
        if (response.estado == true) {
          console.log(response.data);
          
          alertify.success('se actualizo Corectamente');

          identificador.replaceWith(function() {
            var datos = '<tr>';
            datos += "<td>" + response.data[6] + "</td>";
            datos += "<td>" + response.data[0] + "</td>";
            datos += "<td>" + response.data[1] + "</td>";
            datos += "<td>" + response.data[2] + "</td>";
            datos += "<td>" + response.data[3] + "</td>";
            datos += "<td>" + response.data[4] + "</td>";
            datos += "<td>" + response.data[5] + "</td>";
            datos += '</tr>';

            return datos;
          });


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

  //#region selcet elimina
  $("#tabla-cliente tbody").selectable({
    stop: function() {
      var ___this = $(this);
      selev = $("tr.ui-selected").map(function() {
        return $(this).find('td:first-child').text();
      }).get();

    }
  });
  //#endregion 

  //#region boton eliminar
  $('#eliminar').on('click', function() {
    console.log(selev);
    if (selev != null) {
      var barra = 100;
      var numeros = selev.length;
      var batotal = barra / numeros;
      alertify.confirm("eliminacion", 'seguro que quiere eliminar ' + numeros + ' registros?',
        function() {
          contador = 0;
          selev.forEach(function(eleme) {
            console.log(eleme);
            
            $.ajax({
              type: "post",
              url: urlProcesos,
              data: {'id-pag' : 'eiminacion-cliente','idcliente':eleme},
              dataType: "json",
              success: function (response) {
                contador +=  response.estado;
                console.log(contador);
              }
            });
          });
          alertify.success('se eliminaron los '+ contador+ ' registros');

        },
        function() {
          alertify.error('Cancelado');
        });
    }
  });

  //#endregion

  //#region form-update
  $('#tabla-cliente tbody').on('mousedown', 'tr',function(e) {
    if (e.which == 3) {
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
          createf += '<input class="form-control form-control-sm mb-2" name="' + elemento + '" readonly="readonly" id="' + elemento + '" type="text" value="' + valore + '">';

        } else {
          var elemento = $campos[index];
          var valore = $valore[index];

          createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
          createf += '<input class="form-control form-control-sm mb-2" name="' + elemento + '" id="' + elemento + '" type="text" value="' + valore + '">';
        }
      }
      createf += '<button type="submit" class="btn btn-primary" id="btn-upCliente">Actualizar</button>';
      $('#dialogoCiente fieldset form#from-venta').html(createf);

      $dialogo.dialog("open");
    }
  });
  //#endregion
</script>
<div class="container-fluid mb-4">

</div>
<div class="main-card mb-3 card">
  <div class="card-body">
    <h4 class="card-title">barra de control</h4>
    <div class="container-fluid">
      <div class="row">
        <button type="button" id="opener" class="col-2 mr-3 btn btn-success ">agregar</button>
        <button type="button" id="eliminar" class="col-2  btn btn-danger">eliminar</button>
        <div class="col-4">
          <div class="text-center">esperando peticion...</div>
          <div class="progress mt-2 mb-2">
            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Table responsive</h5>
        <div class="table-responsive">
          <table class="table" id="tabla-cliente">

            <?php $objVenta->listarTb("select * from cliente where estado = 3", $arrayName = array()) ?>
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