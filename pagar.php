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

            
<div class="site-wrap">
  <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Elige metodo de pago</h2>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">
              
                <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Venta #<?php echo $_GET['id_venta'];?> </label>        
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Nombre <?php echo $datos_Usuario[4];?> </label>        
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Email <?php echo $datos_Usuario[6];?> </label>        
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Telefono <?php echo $datos_Usuario[5];?> </label>        
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Compañia <?php echo $datosEnvio[2];?> </label>        
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Dirección <?php echo $datosEnvio[3];?> </label>        
                        </div>
                    </div>   
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_fname" class="text-black">Estado <?php echo $datosEnvio[4];?> </label>        
                        </div>
                    </div>     
                </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
          
                <h1 >Total:  <?php echo $datos_Usuario[2];?></h1>
                <form>
                </form>
                <div id="paypal-button-container"></div>
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
    
    </body>

    </html>