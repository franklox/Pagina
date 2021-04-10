<?php 
  include("./php/conexion.php");
  if( isset($_GET['id'])){
    $resultado = $conexion -> query("Select * from productos where id =".$_GET['id']) or die($conexion->error);
    if(mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_row($resultado);
    }else{
      header("Location: ./index.php"); //Redireccionar
    }
  }else{
    header("Location: ./index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6"> <!--Imprmir Imagen - Nombre -Precio --> 
            <img src="images/<?php echo $fila[4]; ?>" alt="<?php echo $fila[1]; ?>" class="img-fluid">
           
          </div>
          <div class="col-md-6">
          <p class="text-black" style="font-size:30px;text-align:justify; font-weight:bold;"><?php echo $fila[1]; ?></p>
            <p style="color:black; font-size:18px;text-align:justify; "><?php echo $fila[2]; ?></p>
            <p><strong style="color:green; font-size:20px; font-weight:bold;">$<?php echo number_format($fila[3],2,'.',''); ?></strong></p>
        
            <div class="mb-5">
            </div>
            <p><a href="cart.php?id=<?php echo $fila[0];?>" class="btn btn-outline-success btn-lg">Agregar al Carrito <i class="fas fa-cart-plus"></i></a></p>
          </div>
        </div>
      </div>
    </div>

    
    <?php include("./layouts/footer.php"); ?> 
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>