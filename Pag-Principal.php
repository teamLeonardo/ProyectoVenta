<?php
//$_SESSION["id"]="hola perros";
$idSession = (isset($_SESSION["id"])) ? $_SESSION["id"] : "";
echo $idSession;

?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- lib  -->
    <link rel="stylesheet" href="lib/jquery-ui.css">
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="lib/datatables/datatables.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/css/alertify.min.css" />
    <script src="https://kit.fontawesome.com/1bfe247ee7.js" crossorigin="anonymous"></script>
    <!-- MyStyle -->
    <link rel="stylesheet" href="view/components/barra/barra.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;
        }

    </style>

</head>

<body>
    <header>
        <!-- barra superio -->
        <div class="barraMenu"></div>
        <!-- barra menu -->
    </header>

    <main></main>


    <script src="lib/jquery.js"></script>
    <script src="lib/jquery-ui.js"></script>
    <script src="lib/bootstrap/bootstrap.min.js"></script>
    <script src="lib/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="lib/datatables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>
    <!-- myScript -->
    <script src="cargaIndex.js"></script>

</body>

</html>