<?php if (!isset($_SESSION['user'])) {
  //echo "hay sesion";
  //$user->setuser($user->$usersession->getcurrentuser());
  header("location:../index.php");
}

//$conexion=new mysqli('localhost','root','','implantacion');
include_once("includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

$sesion=$_SESSION['user'];
$id=$_SESSION['id'];

?>

<html><head>
    <meta charset="UTF-8">

    <title> Home</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="vistas/images/fondo.jfif" type="image/x-icon">
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
   
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

  
          <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="plugins/morris/raphael-min.js"></script>
<script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">
          <script src="plugins/jspdf/jspdf.min.js"></script>
          <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
          
  </head>

  <body class="skin-blue-light sidebar-mini pb-4">
    <div class="wrapper" >
     
            <header class="main-header" >
       
        <div class="logo bg-purple-gradient">
          
          <span class="logo-mini"><b>I</b>L</span>
          
          <span> PC SYSTEM </span>
        </div>

        
        <nav class="navbar navbar-static-top bg-purple-gradient bg-purple-gradient" role="navigation" style="height: 50px;border-radius: 5px;display: flex; justify-content: end">
         
         
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              
              <li class="dropdown user user-menu">
               
                <a href="mi_cuenta.php"  style="text-decoration: none;padding-right: 10px;text-transform: uppercase;padding-bottom: 10px;" >
                
                  <span class="" ><?php $sql="SELECT * FROM usuarios where Usuario='$sesion'";


                  $query=$conexion->query($sql);

                  while ($row=$query->fetch_assoc()) {
                    echo $row['Primer_nombre'];
                  }


                   ?>  </span>

                </a>
                <ul class="dropdown-menu">
                 
                  
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="./logout.php" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar" style="border-radius: 10px;">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" >
<!--
<div class="user-panel">
            <div class="pull-left image">
              <img src="1.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Alexander Pierce</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          -->
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header" style="font-size: 1rem;font-family: 'sans-serif'">Bienvenido <?php $sql="SELECT * FROM usuarios where Usuario='$sesion'";


                  $query=$conexion->query($sql);

                  while ($row=$query->fetch_assoc()) {
                    echo $row['Primer_nombre'];

                   
                  }


                  
                   ?></li>
                                    <li><i class="fa fa-home"></i> <span><a href="#" style="text-decoration: none;"> Inicio</a></span></li>
                                    
            
            
            <br>
            
            <li><i class="fa fa-glass"  ></i><span><a href="carrito/cart.php" style="text-decoration: none;">Productos </a></span></li>
            <br>
            <li class="treeview">
              <i class="fa fa-database"></i><span ><a href="vistas/mi_cuenta.php" style="text-decoration: none;">Mi cuenta</a> </span>
            </li>

            <br>
                      
            

            <li class="treeview">
              <i class="fa fa-cog" ></i> <span><a href="includes/logout1.php" style="text-decoration: none;" > Cerrar Sesion</span></a>
              
            </li>
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="min-height: 552px;">
      <div class="content">
        	<div class="row">
	<div class="col-md-12">
		<h1 id="victor" style="font-family: 'sans-serif'">Bienvenido  <?php $sql="SELECT * FROM usuarios where Usuario='$sesion'";


                  $query=$conexion->query($sql);

                  while ($row=$query->fetch_assoc()) {
                    echo $row['Primer_nombre'];

                  }
                  


                  

                   ?></h1>
<!--     <div style="text-align: right;">
    <label for="muestrario">Cambiar Color del titulo:</label>
<input type="color" value="#fff" id="muestrario">
</div> -->
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
<div class="search-area">
    <form name="search" method="post" action="search-result.php">
        <div class="control-group">

            <input class="search-field" style="border-radius: 5px;" placeholder="Buscar aqui..." name="product" required="required" />

            <button class="search-button btn btn-primary" type="submit" name="search">Buscar</button>    

        </div>
    </form>
</div>     
  <div class="row" style="width: 900px;" >
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box" style="background-color: rgb(186,67,136);">
            <div class="inner">
              

              <h2 style="text-align: center;">DESEA VER NUESTROS PRODUCTOS</h2>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="carrito/cart.php" class="small-box-footer">Ver Productos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        

       
</div>
      </div>


      <div class="d-flex my-4">
        <div style="width: 25%; height: 100px">
         <img style="object-fit: contain; width: 100%; height: 100%;" src="vistas/images/Asus-Logo.png" >
        </div>
        <div style="width: 25%; height: 100px">
         <img style="object-fit: contain; width: 100%; height: 100%;" src="vistas/images/evga-logo.png" >
        </div>
        <div style="width: 25%; height: 100px">
         <img style="object-fit: contain; width: 100%; height: 100%;" src="vistas/images/nvidia-logo.png" >
        </div>
        <div style="width: 25%; height: 100px">
         <img style="object-fit: contain; width: 100%; height: 100%;" src="vistas/images/inter-logo.png" >
        </div>
      </div>
     
       <!--<div id="product-tabs-slider" class="scroll-tabs inner-bottom-vs  wow fadeInUp">
      <div class="more-info-tab clearfix">
         <h3 class="new-product-title pull-left">Productos Destacados</h3>
        
        
      </div>

      <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">     
          <div class="product-slider">
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">


    <div class="row">
    <div class="col-4">              
    <div class="item item-carousel">
      <div class="products">
        
  <div class="product">   
    <div class="product-image">
      <div class="image">
        <a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
    <img style="border-radius: 5px;border:2px solid black;"  src="vistas\images\WhatsApp Image 2022-12-08 at 10.44.35 AM.jpeg" data-echo=""  width="180" height="300" alt=""></a>
      </div>     

                                     
    </div>
    
    <div class="product-info text-left">
      <h3 class="name"><a style="text-decoration: none;" href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">Crayola</a></h3>
      <div class="rating rateit-small"></div>
      <div class="description"></div>

      <div class="product-price"> 
        <span class="price">
              </span>
                         <span class="price-before-discount"></span>
                  
      </div>
    </div>
          <div class="action"><a href="" class="lnk btn btn-primary" style="text-decoration: none;">Ver Producto</a></div>
          <div class="item item-carousel">
      <div class="products">
      </div>
    </div>
  </div>
</div>
</div>
</div>

      <div class="col-4">
        
  <div class="product">   
    <div class="product-image">
      <div class="image">
        <a href=""><img style="border-radius: 5px;border:2px solid black;"  src="vistas/images/WhatsApp Image 2022-12-08 at 10.44.20 AM.jpeg" data-echo=""  width="180" height="300"></a>
      </div>                                     
    </div>
      
    
    <div class="product-info text-left">
      <h3 class="name"><a href="" style="text-decoration: none;">Ohuhu doble punta</a></h3>
      <div class="rating rateit-small"></div>
      <div class="description"></div>

      <div class="product-price"> 
        <span class="price">
              </span>
                         <span class="price-before-discount"></span>
                  
      </div>
      
    </div>
          <div class="action"><a href="" class="lnk btn btn-primary">Ver Producto</a></div>
      </div>
      
    
</div>


   
    
  
        
     <div class="col-4">
          
          <div class="item item-carousel">
      <div class="products">
        
  <div class="product">   
    <div class="product-image">
      <div class="image">
        <a href=""><img  style="border-radius: 5px;border:2px solid black;"  src="vistas/images/WhatsApp Image 2022-12-08 at 10.43.58 AM.jpeg" data-echo=""  width="200" height="300"></a>
      </div>                                     
    </div>
      
    
    <div class="product-info text-left">
      <h3 class="name"><a href="" style="text-decoration: none;">Craftwork gold</a></h3>
      <div class="rating rateit-small"></div>
      <div class="description"></div>

      <div class="product-price"> 
        <span class="price">
              </span>
                         <span class="price-before-discount"></span>
                  
      </div>
      
    </div>
          <div class="action"><a href="" class="lnk btn btn-primary">Ver Producto</a></div>
      </div>
      </div>
    </div>


</div>


     


   
      </div>
      
      </div>
    </div>
    </div>
  </div>
</div>-->
<section style="overflow-y: scroll">
  
  <h2 class="text-center font-oswald">NUESTROS PRODUCTOS</h2><br>

    <div class="container">
      <div class="row">
    <?php
    
     $sql="SELECT Id_producto,imagen_producto,Nombre_producto,Descripcion_producto,Precio,Precio_dolares FROM producto limit 0,4 ";
     $query=$conexion->query($sql);

     while ($row=$query->fetch_assoc()) {
     
     
    ?>
    
    <div class="col-md-3" style="height: 200px; text-align: center;align-items: center; margin-bottom: 150px;">
      <h1><?php echo $row['Nombre_producto']; ?></h1>
          <img style="height: 200px;width: 200px; margin-bottom: 10px;"  src="vistas/images/<?php echo $row['imagen_producto'] ?>">
          <a  style="padding-top: 5px;margin-top: 5px;" href="vistas/detalle_producto.php?id=<?php echo $row['Id_producto'] ?>"><span class="btn btn-primary"> Ver detalles</span></a>


        </div>
        
        <?php
      }
      ?>
    </div>
    </div>

    
  </section>



</div>
      </div>
          </div>
        </div>
  </div>
</div>
</div>
</div>
</div>

    
  </div>

     
      <script>
    var muestrario;
var colorPredeterminado = "#fff";

window.addEventListener("load", startup, false);

function startup() {
  muestrario = document.querySelector("#muestrario");
  muestrario.value = colorPredeterminado;
  muestrario.addEventListener("input", actualizarPrimero, false);
  muestrario.addEventListener("change", actualizarTodo, false);
  muestrario.select();
}


function actualizarPrimero(event) {
  var p = document.querySelector("#victor");

  if (p) {
    p.style.color = event.target.value;
  }
}


function actualizarTodo(event) {
  document.querySelectorAll("#victor").forEach(function(p) {
    p.style.color = event.target.value;
  });
}
   </script>

    
  


</body></html>