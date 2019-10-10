<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../lib/bootstrap/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1bfe247ee7.js" crossorigin="anonymous"></script>
    <title>login-ventas</title>
</head>

<body>

    <style>
        :root {
            --input-padding-x: 1.5rem;
            --input-padding-y: .75rem;
        }

        body {
            background: #007bff;
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .card-signin {
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-signin .card-title {
            margin-bottom: 2rem;
            font-weight: 300;
            font-size: 1.5rem;
        }

        .card-signin .card-img-left {
            width: 45%;
            /* Link to your background image using in the property below! */
            background: scroll center url('https://source.unsplash.com/WEQbe2jBg40/414x512');
            background-size: cover;
        }

        .card-signin .card-body {
            padding: 2rem;
        }

        .form-signin {
            width: 100%;
        }

        .form-signin .btn {
            font-size: 80%;
            border-radius: 5rem;
            letter-spacing: .1rem;
            font-weight: bold;
            padding: 1rem;
            transition: all 0.2s;
        }

        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group input {
            height: auto;
            border-radius: 2rem;
        }

        .form-label-group>input,
        .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
        }

        .form-label-group>label {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100%;
            margin-bottom: 0;
            /* Override default `<label>` margin */
            line-height: 1.5;
            color: #495057;
            border: 1px solid transparent;
            border-radius: .25rem;
            transition: all .1s ease-in-out;
        }

        .form-label-group input::-webkit-input-placeholder {
            color: transparent;
        }

        .form-label-group input:-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-ms-input-placeholder {
            color: transparent;
        }

        .form-label-group input::-moz-placeholder {
            color: transparent;
        }

        .form-label-group input::placeholder {
            color: transparent;
        }

        .form-label-group input:not(:placeholder-shown) {
            padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
            padding-bottom: calc(var(--input-padding-y) / 3);
        }

        .form-label-group input:not(:placeholder-shown)~label {
            padding-top: calc(var(--input-padding-y) / 3);
            padding-bottom: calc(var(--input-padding-y) / 3);
            font-size: 12px;
            color: #777;
        }

        .btn-google {
            color: white;
            background-color: #ea4335;
        }

        .btn-facebook {
            color: white;
            background-color: #3b5998;

        }
    </style>
    <div class="container">

        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">

                <div class="card card-signin flex-row my-5">

                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->

                    </div>

                    <div class="card-body">
                        <div class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="usuario" class="form-control" placeholder="usuario" required autofocus>
                                <label for="usuario">usuario</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="contra" class="form-control" placeholder="Contraseña" required>
                                <label for="contra">Contraseña</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="nombre" class="form-control" placeholder="nombre" required autofocus>
                                <label for="nombre">nombre</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="apellido" class="form-control" placeholder="apellido" required autofocus>
                                <label for="apellido">apellido</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="dni" class="form-control" placeholder="dni" required autofocus>
                                <label for="dni">dni</label>
                            </div>
                            <hr>
                            <div class="row justify-content-around">
                                <div class="form-label-group col-6">
                                    <input type="text" id="nempresa" class="form-control" placeholder="nombre empresa" required autofocus>
                                    <label for="nempresa">nombre empresa</label>
                                </div>
                                <div class="form-label-group col-4">
                                    <input type="text" id="ruc" class="form-control" placeholder="ruc empresa" required autofocus>
                                    <label for="ruc">ruc empresa</label>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" id="btn-registrar" type="submit">registrar</button>
                            <a class="d-block text-center small" href="#">login</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../lib/bootstrap/bootstrap.min.js"></script>

    <script src="../../lib/bootstrap/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function () {
        $('#btn-registrar').click(function(){
window.location = "../../controller/control-pag.php?nombre="+$("#nombre").val()+"&apellido="+$("#apellido").val()+"&dni="+$("#dni").val()+"&usuario="+$("#usuario").val()+"&contra="+$("#contra").val()+"&nempresa="+$("#nempresa").val()+"&ruc="+$("#ruc").val()+"";
            
        });
    });
    </script>
</body>

</html>