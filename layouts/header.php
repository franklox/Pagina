<style>
  header{
    font-family: sans-serif;
  }

  .hoverson a:hover{
  text-decoration: none!important;
  color: red!important;
  font-weight: bold!important;
  }
  .countsoek{
    position: absolute;
          top: 0;
          right: 0;
          margin-right: -15px;
          margin-top: -20px;
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

  .navbarSpace{
    background: #fff;
    margin-bottom: 0px;
    z-index: 1999;
    position: relative; }
  .site-navbar.transparent {
    background: transparent; }
  .site-navbar .site-navbar-top {
    border-bottom: 1px solid #f3f3f4;
    padding-top: 15px;
    padding-bottom: 15px;
    margin-bottom: 0px;
  }
  }
</style>

<header class="navbarSpace site-navbar" role="banner" style="background-color:#E3E1E1;">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center col-md-12">
            
          <div class="col-md-4">
              <div class="site-logo">
                <a style="font-size:18px;" href="index.php" class="js-logo-clone">FreshYam Electronics</a>
              </div>
              
            </div>

            

            

            <div class="col-md-3 text-right site-navigation hoverson">
              <div class="site-top-icons">
                <ul class="site-menu js-clone-nav d-none d-md-block">
                  <li>
                    <a style="font-size:15px; font-weight:bold;" href="index.php">Inicio</a>
                  </li>
                  <li>
                    <a style="font-size:15px; font-weight:bold;" href="about.php">Acerca de</a>
                  </li>
                </ul>
              </div> 
            </div>
            
            <div class="col-md-3  site-search-icon text-left">
              <form action="./busqueda.php" class="site-block-top-search" method="GET">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search" name="texto">
              </form>
            </div>

            <div class="col-md-2 text-right site-navigation hoverson">
            <div class="site-top-icons">
            <ul class="site-menu js-clone-nav d-none d-md-block letraNavbar">
            <li>
                    <a style="font-size:15px; font-weight:bold;" href="cart.php" class="site-cart" >Carrito
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
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li></div>
            </ul>
            </div>
          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        
      </nav>
    </header>

    