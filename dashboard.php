<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SYSTEM PV Y CONTROLLER INVENTARI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow" id="header-app-framer">
            <?php include_once 'view/components/barra-t/barra.php';?>
        </div>
        <div class="ui-theme-settings">
            <?php include_once 'view/components/settings/settings-pag.php';?>

        </div>
        <div class="app-main">
            <?php include_once 'view/components/main/main.php';?>

        </div>
    </div>
    <div class="zonaModal"></div>
    <script type="text/javascript" src="./assets/scripts/main.js"></script>

    <script src="lib/jquery.js"></script>
    <script src="cargarContenedor.js"></script>

</body>

</html>