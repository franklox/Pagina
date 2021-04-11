<?php 
  session_start();
  include("./php/conexion.php");
  if(!isset($_SESSION['carrito'])){
    header('Location: ./index.php');
  }

$arreglo = $_SESSION['carrito'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
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
  <script src="https://www.paypal.com/sdk/js?client-id=AVIo2j6YEyF8aGD2Z1-Bsp_Pm1GGiGePBy6m929h-H1VNaaCohZTCmFVHsvFqDvAdoIrxRdJ7YJF9GBn&currency=MXN"> // Replace YOUR_CLIENT_ID with your sandbox client ID
  </script>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 
    <form action="./php/insertarpedido.php" method="post">
    <div class="site-section">
      <div class="container">
        <div class="row">
        
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Detalles del Envío</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">País <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control" name="country">    
                  <option value="México">México</option>      
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Nombre(s)<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname" placeholder="Nombre(s)" required>
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Apellidos <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname" placeholder="Apellidos" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Dirección de Envío" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">Estado <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="c_state_country" placeholder="Estado" required>
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Código Postal <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip" placeholder="Código Postal" required>
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Correo Electrónico<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address" placeholder="Correo Electrónico" required>
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Teléfono<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Teléfono" required>
                </div>
              </div>

              <div class="form-group">
                <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account"> Crea una cuenta</label>
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Contraseña</label>
                      <input type="password" class="form-control" id="c_account_password" name="c_account_password" placeholder="Contraseña">
                    </div>
                  </div>
                </div>
              </div>


              


            </div>
          </div>
          <div class="col-md-6">

            
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Su Orden</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php 
                        $total = 0;
                        for($i=0;$i<count($arreglo);$i++)
                        {
                          $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
                      ?>
                        <tr>
                          <td><?php  echo $arreglo[$i]['Nombre']?></td>
                          <td>$<?php echo number_format($arreglo[$i]['Precio'],2,'.','');?></td>
                        </tr>
                        <?php 
                          }
                        ?>
                         <tr>
                          <td>Total de la orden</td>
                          <td>$<?php echo number_format($total,2,'.',''); ?></td>
                        </tr>
                    </tbody>
                  </table>

                  <div class="form-group">
                    <button class="btn btn-dark btn-lg py-3 btn-block" type="submit">Realizar pedido</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
          
        </div>
        <!-- </form> -->
      </div>
    </div>
    </form>
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
                value: '500'
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
            console.log(details);
            alert('Transaction completed by ' + details.payer.name.given_name);
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>  
  </body>
</html>