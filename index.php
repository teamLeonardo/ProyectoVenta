<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="lib/jquery-ui.css">
    <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1bfe247ee7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="MyStyle.css">
    <title>login Systema de ventas</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">proyecto de venta</h5>
            <form class="form-signin" action="Pag-Principal.php">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" >
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <hr class="my-4">
              <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script src="lib/jquery.js"></script>
    <script src="lib/bootstrap/bootstrap.min.js"></script>
    <script src="lib/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>