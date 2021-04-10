<style>
  .navbarsona{
    background-color: #1765be;
    padding-bottom:15px;
    margin-bottom:15px;
  }

  .tituloLogo{
      color: white;
      font-size: 20px;
      display: inline-block;
      font-family: sans-serif;
  }

  .searchBar{
      width: 50000px;
      
      border-radius: 21px;
  }

  .letrona{
      font-family: sans-serif;
      color: white;
      font-size: 16px;
  }

  .letrona a{
      text-decoration: none;
      color: white;
  }

  .letrona a:hover{
      border-bottom:1px solid;
  }




  .letraSearch{
      font-size: 14px;
      color: black;
      font-family: sans-serif;
  }

  .iconoeks{
      border: 0px solid #1C6EA4;
      border-radius: 21px;
  }

  .listonas{
      list-style: none;
      display: inline-block;
  }
  .countsoek{
    position: absolute;
          top: 0;
          right: 0;
          margin-right: 25px;
          margin-top: 5px;
          font-size: 13px;
          width: 24px;
          height: 24px;
          line-height: 24px;
          border-radius: 50%;
          display: block;
          text-align: center;
          background: red!important;
          color: #fff;
          -webkit-transition: .2s all ease-in-out;
          -o-transition: .2s all ease-in-out;
          transition: .2s all ease-in-out;
  }
  
</style>
<nav class="navbar navbarsona">
    <div class="row">
        <a class="navbar-brand" href="index.php">
            <img src="./images/shop.svg" width="100" height="45" alt="">
            <h1 class="tituloLogo">ELECTRONICS</h1>
        </a>
        <form action="./busqueda.php" class="form-inline" method="GET">
            <div class="input-group">
                <input style="width:500px;" type="text" class="form-control searchBar letraSearch" placeholder="Hola, ¿Qué estás buscando?" name="texto">
                <div class="input-group-append">
                    <button style="text-decoration:none;" (click)="./busqueda.php" class="input-group-text iconoeks" id="basic-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>

    <div class="letrona">
        
        <a href="index.php" class="mr-5"><i class="fa fa-home mr-1" aria-hidden="true"></i>Inicio</a>
        <a href="about.php" class="mr-5"><i class="far fa-address-card mr-1"></i>Acerca de</a>
        <a href="cart.php" class="mr-4 site-cart" >Carrito
          <span class="icon icon-shopping_cart"></span>
          <span class="countsoek">
            <?php 
              if(isset($_SESSION['carrito'])){
                echo count($_SESSION['carrito']);
              }else{
                    echo 0;
              }
            ?>
          </span>
        </a>
        <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li></div>
    </div>
</nav>




    