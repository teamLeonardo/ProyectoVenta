<script>
    $("#dialogoVenta").dialog({
        autoOpen: false,
        show: {
            effect: "scale",
            duration: 1000
        },
        hide: {
            effect: "scale",
            duration: 1000
        }
    });
    $("#opener").on("click", function() {
        _this = $(this).parent();
        var createf = '';
        var $campos = _this.find('table#tabla-cliente thead tr th').map(function() {
            return $(this).text();
        }).get();
        for (let index = 1; index < $campos.length; index++) {
            var elemento = $campos[index];

            createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
            createf += '<input class="form-control form-control-sm mb-2" id="' + elemento + '" type="text" placeholder="' + elemento + '">';

        }

        createf += '<button type="submit" class="btn btn-primary">aceptar</button>';
        $('#dialogoVenta fieldset form#frm-cliente').html(createf);
        $("#dialogoVenta").dialog("open");
    });

    $('#tabla-cliente').DataTable({

        scrollY: 200
    });
    $('#tabla-cliente').on('click', 'tr', function() {
        $("#dialogoVenta").dialog("close");
        __this = $(this);
        var createf = '';
        var arrayFormulario = Array;
        var $valore = __this.find('td').map(function() {
            return $(this).text();
        }).get();
        var $campos = __this.closest('table').find('thead tr th').map(function() {
            return $(this).text();
        }).get();
        for (let index = 0; index < $campos.length; index++) {

            if (index == 0) {
                var elemento = $campos[index];
                var valore = $valore[index];

                createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
                createf += '<input class="form-control form-control-sm mb-2"  disabled="false" disabled="' + elemento + '" type="text" value="' + valore + '">';
            
            } else {
                var elemento = $campos[index];
                var valore = $valore[index];

                createf += '<label class="mt-1" for="' + elemento + '">' + elemento + '</label>';
                createf += '<input class="form-control form-control-sm mb-2" id="' + elemento + '" type="text" value="' + valore + '">';
            }
        }
        createf += '<button type="submit" class="btn btn-primary">aceptar</button>';
        $('#dialogoVenta fieldset form#frm-cliente').html(createf);
        $("#dialogoVenta").dialog("open");

    });
</script>
<button type="button" class="btn mr-2 mb-2 btn-primary" id="opener" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="row">
    <div class="col-lg-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Table responsive</h5>
                <table class="mb-0 table" id="tabla-cliente">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>nombe</th>
                            <th>apellido</th>
                            <th>dni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>
                        <tr>
                            <td scope="row">3</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                            <td>Table cell</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="dialogoVenta" title="formulario clientes">
    <fieldset>
        <form id="frm-cliente">

        </form>
    </fieldset>
</div>