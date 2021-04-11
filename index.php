<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FYElectronics</title>
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
  <style>
    .container-menu{
    background-color: rgb(245, 245, 245);
    font-family: sans-serif;
    cursor: pointer;
}

.header-menu{
    background-color: #333;
    color: white;
    height: 70px;
    text-align: center;
    margin-top: 0px;
    font-family: sans-serif;
}

.container-menu a{
    color: #666;
    display: block;
    width: 100%;
    line-height: 60px;
    text-decoration: none;
    padding-left: 20px;
    box-sizing: border-box;
    border-left: rgb(211, 211, 211) 1px solid;
    border-bottom: rgb(211, 211, 211) 1px solid;
    border-right: rgb(211, 211, 211) 1px solid;
}

.title{
  color:black;
}

.container-menu i{
    margin-right: 10px;
}

.container-menu a:hover{
    background-color: white;
    color: #1765be;
    border-left: #1765be 2px solid;
}
  </style>
  <body>
  
  <div class="site-wrap">
    <?php include("./layouts/header.php"); ?> 

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/Captura.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./images/Captura2.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./images/Captura.png" class="d-block w-100">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <h4 class="mt-5 title">Nuestros Productos:</h4>
            <div class="row mb-5 mt-4">
            <?php 
            include('./php/conexion.php');
            /*for($i=0;$i<21;$i++){
              $conexion->query("insert into productos (nombre,descripcion, precio,imagen,inventario,id_categoria) 
              values(
                'Producto $i','Somos unos cracks',".rand(1000,100000).",'monitor.jpg',".rand(3,25).",12
              )") or die($conexion->error);
            }*/
            $limite = 12; //Productos por página
            $totalQuery = $conexion->query('select count(*) from productos') or die($conexion->error);
            $totalProductos = mysqli_fetch_row($totalQuery);
            $totalBotones = ($totalProductos[0] / $limite); //Botones Paginación
            if(isset($_GET['limite'])){
              $resultado = $conexion -> query("select * from productos where inventario>0 limit ".$_GET['limite'].",".$limite) or die($conexion -> error);

            }else{
              $resultado = $conexion -> query("select * from productos where inventario>0 order by id DESC limit ".$limite) or die($conexion -> error);
            }
            while($fila = mysqli_fetch_array($resultado)) {
            ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border"  style="width: 250px; height: 400px">
                  <figure class="block-4-image">
                    <a href="shop-single.php?id=<?php echo $fila['id'];?>">
                    <img src="images/<?php echo $fila['imagen'];?>"  alt="<?php echo $fila['nombre'];?>" class="img-fluid" style="height:200px;">
                    </a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h6><a style="text-align:center; color:black;" href="shop-single.php?id=<?php echo $fila['id'];?>"><?php echo $fila['nombre'];?></a></h6>
                    <p style="text-align:center; color:green; font-size:20px; font-weight:bold;">$<?php echo number_format($fila['precio'],'2','.','');?></p>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul>
                    
                    <?php 
                      
                      if(isset($_GET['limite'])){
                          if($_GET['limite']>0){
                            echo '<li><a href="index.php?limite='.($_GET['limite']-12).'">&lt;</a></li>';
                          }
                      }
                                           
                      for($f=0;$f<$totalBotones;$f++){
                        echo '<li><a href="index.php?limite='.($f*12).'">'.($f+1).'</a></li>';
                      }
                      
                      if(isset($_GET['limite'])){
                        if($_GET['limite']+12 <$totalBotones*12){
                          echo '<li><a href="index.php?limite='.($_GET['limite']+12).'">&gt;</a></li>';
                        }
                      }else{
                        echo '<li><a href="index.php=?limite=12">&gt</a></li>';
                      }
                        
                    

                    ?>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>


          
       

                      <!--Categorias-->
          <div class="col-md-3">
            <div class="header-menu">
              <br>
              <h5>CATEGORÍAS</h5>
            </div>  
            <div class="container-menu">
                <?php 
                  $re= $conexion->query("select * from categorias");
                  while($f=mysqli_fetch_array($re)){
                
                ?>
                <a>
                  <a href="./busqueda.php?texto=<?php echo $f['nombre']?>" class="d-flex">
                    <span><?php echo $f['nombre'];?></span> 
                </a></a>

              <?php } ?>
                  </div>
            </div>

           
          </div>
        </div>

      
      </div>
    </div>
    <br>
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