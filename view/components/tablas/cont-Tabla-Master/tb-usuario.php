<table id="tbl-usuario" class="table table-striped table-bordered" style="width:100%">
    <?php $tabla = "";
    $tabla .= "<thead>
<tr>
    <th>Name</th>
    <th>Position</th>
    <th>Office</th>
    <th>Age</th>
    <th>Start date</th>
    <th>Salary</th>
</tr>
</thead>";
    $tabla .= "<tbody>";

    for ($i = 1; $i <= 100; $i++) {
        $num = rand(0, 100);
        $suel = $num + $i;
        $tabla .= "<tr id=\"$i\">
    <td>{$i}</td>
    <td>nombreGenerico{$i}</td>
    <td>{$i}</td>
    <td>{$num}</td>
    <td>2011/04/25</td>
    <td>$$suel,800</td>
    </tr>";
        $num = null;
    }
    $tabla .= "</tbody>";
    $tabla .= "<tfoot>
<tr>
    <th>Name</th>
    <th>Position</th>
    <th>Office</th>
    <th>Age</th>
    <th>Start date</th>
    <th>Salary</th>
</tr>
</tfoot>";
    echo $tabla;

    ?>



</table>
<script>
    $("#tbl-usuario").DataTable();
    var id = String;
    var estado = Boolean;
    var nColumnas = Number;
    var informacion = Array;
    $('td').mousedown(function(e) {
        _this = this;
        if (e.which == 3) {
            $('#menuCapa').css({
                "left": e.pageX,
                "top": e.pageY
            });
            $('#menuCapa').show();

            //id = $(_this).closest('tr').find("td:first-child").text();
            id = $(_this).closest('tr').attr("id");
            estado = true;
            nColumnas = $("tr#" + id + " td").length;
            console.log(nColumnas);
        }
    });
    //#region efecto barra
        $("li").mouseover(function() {
            $(this).css({
                "background": "blue"
            });
        });
        $("li").mouseout(function() {
            $(this).css({
                "background": "white"
            });
        });

        $(document).click(function() {
            if (estado == true) {
                $('#menuCapa').hide();
            }
        })
    //#endregion
    $("#editar").on("click", function() {
        //$( "#dialog-form" ).dialog( "open" );
    });

    $("#editar").click(function() {
        //recuperar datos
        console.log(nColumnas);
        for (var index = 0; index < nColumnas; index++) {
            informacion[index] = $("tr#" + id+" td").eq(index).text();
        }
        console.log(informacion.String);


    });
</script>