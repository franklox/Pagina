<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión</title>
  <style>
      #Contenedor{
	width: 400px;
	margin: 50px auto;
	background-color: #B4ADAD;
  -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
	height: 400px;
	border-radius:8px;
	padding: 0px 9px 0px 9px;
}

.Encabezado span{
      background: #1765be;
      padding: 20px;
      border-radius: 120px;
}

.Encabezado{
     margin-top: 10px;
     margin-bottom:10px; 
     color: #FFF;
     font-size: 20px;
     padding-bottom: 40px;
     text-align: center;
}

.opcioncontra{
	text-align: center;
	margin-top: 20px;
	font-size: 14px;
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
<br>
<div id="Contenedor">
  <div class="Encabezado">
                <span class="glyphicon glyphicon-user">Iniciar Sesión</span>
              </div>
  <div class="ContentForm">
    <form action="./php/check.php" method="post">
      <div class="input-group input-group-lg">
        <input required type="email" class="form-control" placeholder="Correo Electronico" name="email">
     </div>
     <br>
     <div class="input-group input-group-lg">
        <input required type="password" class="form-control" placeholder="Password" name="password">
     </div>
     <br>
     <button class="btn btn-lg btn-dark btn-block btn-signin" id="IngresoLog" type="submit">Ingresar</button>
     <br>
    </form>
    <?php 
          if(isset($_GET['error'])){
            echo '<div class="col 12 alert alert-danger alert-dismissible fade show close" data-dismiss="alert">'.$_GET['error'].'</div>';
        }
?>
  </div>	
  </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./admin/dashboard/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./admin/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./admin/dashboard/dist/js/adminlte.min.js"></script>
<br>
<br>
<?php include("./layouts/footer.php"); ?> 
</body>
</html>