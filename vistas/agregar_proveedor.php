 <?php 
 include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

session_start();

if (!isset($_SESSION['administrador'])) {
  //echo "hay sesion";
  //$user->setuser($user->$usersession->getcurrentuser());
  header("location:../vistas/login_modo_privilegiado.php");
}
  ?>

 <html><head>
    <meta charset="UTF-8">
    <title>Agregar proveedor</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Font Awesome Icons -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link href="../plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    
          <script src="../plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="../plugins/morris/raphael-min.js"></script>
<script src="../plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/morris/example.css">
          <script src="../plugins/jspdf/jspdf.min.js"></script>
          <script src="../plugins/jspdf/jspdf.plugin.autotable.js"></script>
          
  </head>

  <body class="  skin-blue-light sidebar-mini ">
    <div class="wrapper">
      <!-- Main Header -->
            <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo bg-purple-gradient">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b>L</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema de </b>gestion</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top bg-purple-gradient" role="navigation">
          <!-- Sidebar toggle button-->
<!-- -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
               
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="">
                      <a href="http://evilnapsis.com/" target="_blank" class="">Ir a Evilnapsis</a>
                      <a href="http://evilnapsis.com/product/inventio-max/" target="_blank" class="">Ver Inventio Max</a>
                  </li>
                  
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
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
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
            <li class="header">ADMINISTRACION</li>
                                    <li><i class="fa fa-home"></i> <span><a href="home_admin.php" style="text-decoration: none;">Inicio</a></span></li>
                                    <br>
            <li><i class="fa fa-shopping-cart"></i> <span ><a href="ver_ventas.php" style="text-decoration: none;">Ventas</a></span></li>
            <br>
            
            <li><i class="fa fa-glass"></i> <span><a href="" style="text-decoration: none;">Productos</a></span></li>
            <br>
            <li class="treeview">
           
             
            </li>

            <br>

            
            
            


            <li class="treeview">
              <i class="fa fa-cog"></i> <span><a href="../includes/cerrar_sesion.php" style="text-decoration: none;"> Cerrar sesion </a></span>
              
            </li>
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    
      <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="min-height: 502px;">
      <div class="content">
            <div class="row">
  <div class="col-md-12">
  <h1>Nuevo Proveedor</h1>
  <br>
    <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="../includes/agregar_producto.php" role="form">

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre de proveedor</label>
    <div class="col-md-6">
      <input type="text" name="nombre de proveedor" id="product_code" class="form-control" placeholder="Ingrese nombre del proveedor">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre del producto</label>
    <div class="col-md-6">
      <input type="text" name="name" required="" class="form-control" id="name" placeholder="Nombre del Producto">
    </div>
  </div>
  
  <div class="form-group">
   
    <div class="col-md-6">
     <select name="producto" class="form-control">
       <option >Seleccione producto</option>
       <?php 
       $sql="SELECT * FROM producto";
       $query=$conexion->query($sql);
       while ($row=$query->fetch_assoc()) {
         
       
        ?>
       <option value="<?php echo $row['Id_producto']; ?>"><?php echo $row['Nombre_producto'] ;?></option>
     <?php } ?>
     </select>
    </div>
  </div>
  
  <div class="form-group">
    
    <div class="col-md-6">
      <select name="estado" style="width: 60%;" class="form-control">
              <option>Seleccione un Estado</option>
            <?php 
            $sql="SELECT * FROM estados";
                          $query=$conexion->query($sql);
                          while ($row=$query->fetch_assoc()) {
                            ?>
                          
            <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
            <?php
                          }

             ?>
            
            
          </select>
    </div>
  </div>
  <div class="form-group">
    
    <div class="col-md-6">
      <select name="municipio" style="width: 60%;" class="form-control">
              <option>Seleccione un municipio</option>
            <?php 
            $sql="SELECT * FROM municipios";
                          $query=$conexion->query($sql);
                          while ($row=$query->fetch_assoc()) {
                            ?>
                          
            <option value="<?php echo $row['id_municipio']; ?>"><?php echo $row['municipio']; ?></option>
            <?php
                          }

             ?>
            
            
          </select>
    </div>
  </div>

  <div class="form-group">
    
    <div class="col-md-6">
     <select name="parroquia" style="width: 60%;" class="form-control">
              <option>Seleccione una parroquia</option>
            <?php 
            $sql="SELECT * FROM parroquias";
                          $query=$conexion->query($sql);
                          while ($row=$query->fetch_assoc()) {
                            ?>
                          
            <option value="<?php echo $row['id_parroquia']; ?>"><?php echo $row['parroquia']; ?></option>
            <?php
                          }

             ?>
            
            
          </select>
    </div>
  </div>

  <div class="form-group">
    
    <div class="col-md-6">
      <select name="ciudad" style="width: 60%;" class="form-control">
              <option>Seleccione una ciudad</option>
            <?php 
            $sql="SELECT * FROM ciudades";
                          $query=$conexion->query($sql);
                          while ($row=$query->fetch_assoc()) {
                            ?>
                          
            <option value="<?php echo $row['id_ciudad']; ?>"><?php echo $row['ciudad']; ?></option>
            <?php
                          }

             ?>
            
            
          </select>
    </div>
  </div>
  

 

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
    </div>
  </div>
</form>

  </div>
</div>

<script>
  $(document).ready(function(){
    $("#product_code").keydown(function(e){
        if(e.which==17 || e.which==74 ){
            e.preventDefault();
        }else{
            console.log(e.which);
        }
    })
});

</script>        </div>
      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="plugins/dist/js/app.min.js" type="text/javascript"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
   


</body></html>