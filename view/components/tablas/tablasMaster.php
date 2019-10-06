<!--https://flexboxfroggy.com-->
<style>
    .ui-menu {
        width: 150px;
    }

    .cont-tabla {
        display: flex;
    }
    label,
    input {
        display: block;
    }

    input.text {
        margin-bottom: 12px;
        width: 95%;
        padding: .4em;
    }

    fieldset {
        padding: 0;
        border: 0;
        margin-top: 25px;
    }

    h1 {
        font-size: 1.2em;
        margin: .6em 0;
    }

    div#users-contain {
        width: 350px;
        margin: 20px 0;
    }

    div#users-contain table {
        margin: 1em 0;
        border-collapse: collapse;
        width: 100%;
    }

    div#users-contain table td,
    div#users-contain table th {
        border: 1px solid #eee;
        padding: .6em 10px;
        text-align: left;
    }

    .ui-dialog .ui-state-error {
        padding: .3em;
    }

    .validateTips {
        border: 1px solid transparent;
        padding: 0.3em;
    }
</style>

<!--tabla y menu contenedor-->
<div class="cont-tabla pt-5">
    <div class="menulateral">
        <ul id="menu" class="mt-4">
            <li>
                <div id="tb-usuario">tabla de usuarios</div>
            </li>
            <li>
                <div id="tb-ventas">tabla de ventas</div>
            </li>
            <li>
                <div id="tb-almacen">tabla de almacen</div>
            </li>
            <li class="ui-state-disabled">
                <div>tabla productos</div>
            </li>
            <li class="ui-state-disabled">
                <div>tabla productos</div>
            </li>
            <li class="ui-state-disabled">
                <div>tabla productos</div>
            </li>
            <li class="ui-state-disabled">
                <div>tabla productos</div>
            </li>
            <li class="ui-state-disabled">
                <div>tabla productos</div>
            </li>
            <li class="ui-state-disabled">
                <div>tabla productos</div>
            </li>
        </ul>
    </div>
    <div class="tablas-contenedor table-responsive  container m-4">

    </div>
</div>
<!-- #enregion-->
<!-- #region menu desplegable -->
<ol id="menuCapa" class="dropdown-menu" role="menu">
    <li id="eliminar">eliminar</li>
    <li id="editar">editar</li>
</ol>
<!-- #endregion -->
<!-- #region  dialogo de formulario-->
<div id="dialog-form" title="Create new user">
    <p class="validateTips">All form fields are required.</p>

    <form>
        <fieldset>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="jane@smith.com" class="text ui-widget-content ui-corner-all">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="xxxxxxx" class="text ui-widget-content ui-corner-all">

            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input type="submit" style="position:absolute; top:-1000px">
        </fieldset>
    </form>
</div>
<!-- #endregion -->
<script>
    $(".tablas-contenedor").bind("contextmenu", function(e) {
        return false;
    });
    $("#menu").menu();
    var tabla;
    $("ul li div").click(function() {
        tabla = null;
        tabla = $(this).attr("id");
        $(".tablas-contenedor").load("view/components/tablas/cont-Tabla-Master/" + tabla + ".php");
    });
    
    $( "#dialog-form" ).dialog({
        autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }

    });
    
        
    $( "#editar" ).on( "click", function() {
      $( "#dialog-form" ).dialog( "open" );
    });
    $( "#eliminar" ).on( "click", function() {
        alertify.confirm('confirmacion de edicion', 'los id que a editado son ', function() {
            alertify.success("fue eliminado");
        },function() {
            alertify.error("cancelado");
        });
    });
</script>