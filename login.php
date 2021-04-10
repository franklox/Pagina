<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión</title>
  <style>
    .card{
      width: 400px;
      height: auto; 
    }
  
  </style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./admin/dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./admin/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

</head>
<body class="hold-transition login-page">
<?php include("./layouts/header.php"); ?> 
<br>

<div class="login-box text-center">
  <div class="login-logo">
    <h3><a href="./index.php"><b>Freh Yam Electronics</b></a></h3>
  </div>
  <!-- /.login-logo -->
  <div class="card text-dark bg-light mb-3 text-center" style="margin-left: 475px;">
    <div class="card-body">
      <h3><b><p class="login-box-msg text-center">Inicia Sesión</p></b></h3>

      <form action="./php/check.php" method="post">
        <div class="input-group mb-3">
          <input required type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input required type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember" style="float:left;">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
          <button type="submit" class="btn btn-outline-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
          <br>
          <br>
          
          <?php 
            if(isset($_GET['error'])){
              echo '<div class="col 12 alert alert-danger">'.$_GET['error'].'</div>';
            }
          ?>
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./admin/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./admin/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./admin/dashboard/dist/js/adminlte.min.js"></script>

<?php include("./layouts/footer.php"); ?> 
</body>
</html>
