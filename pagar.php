<style>
  .margen{
    padding-top: 20px !important;
    padding-bottom: 20px !important;
  }
  .tarjeta{
    width: 200px;
    height: auto;
  }
</style>


<?php
    include("./php/conexion.php");
    if(!isset($_GET['id_venta'])){
        header("Location: ./");
    }
    $datos = $conexion->query("select 
        ventas.*, 
        usuario.nombre,usuario.telefono,usuario.email
        from ventas 
        inner join usuario on ventas.id_usuario = usuario.id
        where ventas.id=".$_GET['id_venta']) or die($conexion->error);

    $datos_Usuario = mysqli_fetch_row($datos);
    $datos2 =$conexion->query("select * from envio where id_venta =".$_GET['id_venta']) or die($conexion->error);
    $datosEnvio = mysqli_fetch_row($datos2);
    $datos3 = $conexion->query("select productos_venta.*,
        productos.nombre as nombre_producto, productos.imagen
        from productos_venta inner join productos on productos_venta.id_producto = productos.id
        where id_venta = ".$_GET['id_venta']) or die($conexion->error);
?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Elegir metodo de pago</title>
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
        <script src="https://www.paypal.com/sdk/js?client-id=AVIo2j6YEyF8aGD2Z1-Bsp_Pm1GGiGePBy6m929h-H1VNaaCohZTCmFVHsvFqDvAdoIrxRdJ7YJF9GBn&currency=MXN"> // Replace YOUR_CLIENT_ID with your sandbox client ID
        </script>

<?php include("./layouts/header.php"); ?>
<h2 class="margen" style="margin-left: 100px;">Datos de la compra</h2>
<div class="container margen">
  <div class="card-columns" width="200px;" height="1000px;">
          <?php
            while($f = mysqli_fetch_array($datos3)){
          ?>
          <div class="card">
          <img src="./images/<?php echo $f['imagen'];?>" class="card-img-top" width="50px" height="200px"/>
          <div class="card-body">
            <h5 class="card-title"><?php echo $f['nombre_producto'];?></h5>
            <p class="card-text">Cantidad: <?php echo $f['cantidad'];?></p>
            <p class="card-text">Precio: $<?php echo number_format($f['cantidad'],2,'.','');?></p>
            <p class="card-text">Subtotal: $<?php echo number_format($f['subtotal'],2,'.','');?></p>
          </div>
          <div class="card-footer  text-center">
            <small class="text-muted">Se ve que rifa en la vida</small>
          </div>
        </div>
      <?php } ?>
      <div class="card">
          <div class="card-body">
            <p class="card-text">Nombre: <?php echo $datos_Usuario[6];?></p>
            <p class="card-text">Email: <?php echo $datos_Usuario[8];?></p>
            <p class="card-text">Dirección: <?php echo $datosEnvio[3];?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><h1 >Total: $<?php echo number_format($datos_Usuario[2],2,'.','');?></h1>
                <div id="paypal-button-container"></div></small>
          </div>
        </div>
  </div>   
 
</div>

<br>


  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $datos_Usuario[2];?>'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            if(details.status == 'COMPLETED'){
                location.href="./thankyou.php?id_venta=<?php echo $_GET['id_venta'];?>&metodo=paypal"

            }
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>  
        <?php include("./layouts/footer.php"); ?>
    </body>

    </html>