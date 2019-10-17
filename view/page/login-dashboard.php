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
            --input-padding-y: 0.75rem;
        }

        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('https://source.unsplash.com/WEQbe2jBg40/600x1200');
            background-size: cover;
            background-position: center;
        }

        .login-heading {
            font-weight: 300;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
            border-radius: 2rem;
        }

        .form-label-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .form-label-group>input,
        .form-label-group>label {
            padding: var(--input-padding-y) var(--input-padding-x);
            height: auto;
            border-radius: 2rem;
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
            cursor: text;
            /* Match the input under the label */
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


        @supports (-ms-ime-align: auto) {
            .form-label-group>label {
                display: none;
            }

            .form-label-group input::-ms-input-placeholder {
                color: #777;
            }
        }

        @media all and (-ms-high-contrast: none),
        (-ms-high-contrast: active) {
            .form-label-group>label {
                display: none;
            }

            .form-label-group input:-ms-input-placeholder {
                color: #777;
            }
        }
    </style>
    <div class="container-fluid">
        <div class="row no-gutter">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Welcome back!</h3>
                                <form id="logion">
                                    <input type="hidden" name="id-pag" value="login">
                                    <div class="form-label-group">
                                        <input type="text" id="Usuario" name="usuario" class="form-control" placeholder="Usuario" required autofocus>
                                        <label for="Usuario">Usuario</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="Contraseña" name="pass" class="form-control" placeholder="Contraseña" required>
                                        <label for="Contraseña">Contraseña</label>
                                    </div>

                                    <br>
                                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" id="btn-login" type="submit">ingresar</button>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../lib/jquery.js"></script>
    <script src="../../lib/bootstrap/bootstrap.min.js"></script>

    <script src="../../lib/bootstrap/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#btn-login').on('click', function(e) {
                
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "../../controller/control-pag.php",
                    data: $('#logion').serialize(),
                    dataType: "json",
                    success: function(response) {
                        
                        if (response.estado == false) {
                            alert(response.mensaje);
                        } else {
                            window.location = '../../dashboard.php';
                        }
                    }
                });



                // articulos publicitarios chabing - jerson cordova
            });
        });
    </script>
</body>

</html>