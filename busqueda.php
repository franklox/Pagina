<?php 
  session_start();
  include("./php/conexion.php");
  if(!isset($_GET['texto'])){
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

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Buscando resultados para: <?php echo $_GET['texto'];?></h2></div>
              </div>
            </div>
            <div class="row mb-5">
            <?php 
            $resultado = $conexion -> query("select productos.*, categorias.nombre as categoria from productos 
            inner join categorias on productos.id_categoria = categorias.id
            where 
            productos.nombre like '%".$_GET['texto']."%' or
            productos.descripcion like '%".$_GET['texto']."%' or
            categorias.nombre like '%".$_GET['texto']."%' 
           
            
            order by id DESC limit 12") or die($conexion -> error);
            if(mysqli_num_rows($resultado)> 0){

            
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
            <?php } }else{
                echo '<h2>Sin resultados</h2>';
            } ?>

            </div>
            
          </div>

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
                    <span class="text-black ml-auto" style="margin-right:10px;">
                    <?php   
                        $re2 = $conexion->query("select count(*) from productos where
                        id_categoria =".$f['id']);
                        $fila = mysqli_fetch_row($re2);
                        echo $fila[0];
                    ?>
                    </span>   
                </a></a>

              <?php } ?>
                  </div>
            </div>

           
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