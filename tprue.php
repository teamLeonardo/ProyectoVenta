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

        #sortable {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 60%;
        }

        #sortable li {
            margin: 0 5px 5px 5px;
            padding: 1em;
            padding-left: 1.5em;
            font-size: 1em;
            height: 18px;
        }

        #sortable li span {
            position: absolute;
            margin-left: -1.3em;
        }
    </style>

</head>

<body>
    <ul id="sortable">
        <li class="ui-state-default"><span class="fas fa-plus-square"></span>Item 8</li>
        <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
        <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
        <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
        <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
        <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
    </ul>
    <script src="lib/jquery.js"></script>
    <script src="lib/jquery-ui.js"></script>
    <script src="lib/bootstrap/bootstrap.min.js"></script>
    <script src="lib/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="lib/datatables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.4/build/alertify.min.js"></script>
    <!-- myScript -->
    <script>
        $(function() {

            $("#sortable").sortable();
            $("#sortable").disableSelection();

        });
    </script>
</body>

</html>