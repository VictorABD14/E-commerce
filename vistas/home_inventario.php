<?php
$conexion=new mysqli('localhost','root','','implantacion');

session_start();

if (!isset($_SESSION['inventario'])) {
  header('location:login_modo_privilegiado.php');
}


?>



<html><head>
    <meta charset="UTF-8">
    <title>HOME</title>
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
          <script src="plugins/jspdf/jspdf.min.js"></script>
          <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
          <script language="javascript" src="jquery-3.1.1.min.js"></script>
  <script>

  </script>
          
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
          <span class="logo-lg"><b>Sistema de </b>inventario</span>
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
                                    <li><a href="./index.php?view=home"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            
            <li><a href="./?view=sells"><i class="fa fa-shopping-cart"></i> <span>Ventas</span></a></li>
            
            <li><a href="./?view=products"><i class="fa fa-glass"></i> <span>Productos</span></a></li>

            <li class="treeview">
              <a href="#"><i class="fa fa-database"></i> <span>Catalogos</span> </a>
              <ul class="treeview-menu">
                <li><a href="./?view=categories">Categorias</a></li>
                <li><a href="./?view=clients">Clientes</a></li>
                <li><a href="./?view=providers">Proveedores</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-area-chart"></i> <span>Inventario</span></a>
              <ul class="treeview-menu">
                <li><a href="./?view=inventary">Inventario</a></li>
                <li><a href="./?view=re">Abastecer</a></li>
                <li><a href="./?view=res">Abastecimientos</a></li>
              </ul>
            </li>
                        <li class="treeview">
              <a href="#"><i class="fa fa-file-text-o"></i> <span>Reportes</span></a>
              <ul class="treeview-menu">
                <li><a href="./?view=reports">Inventario</a></li>
                <li><a href="./?view=sellreports">Ventas</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="#"><i class="fa fa-cog"></i> <span>Administracion</span></a>
              <ul class="treeview-menu">
                <li><a href="./?view=users">Usuarios</a></li>
                <li><a href="./?view=settings">Configuracion</a></li>
              </ul>
            </li>
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

   <div class="content-wrapper" style="min-height: 552px;">
      <div class="content">
          <div class="row">
  <div class="col-md-12">
    <h1>Bienvenido a Sistema de Inventiario</h1>
</div>
</div>
  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php $sql="SELECT count(*) AS total_productos from producto";
                
                $query=$conexion->query($sql);
                $row=$query->fetch_assoc();
                echo $row['total_productos'];



               ?></h3>

              <p>Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="productos-inventario.php" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php $sql="SELECT count(*) AS total_proveedor from proveedor";
                
                $query=$conexion->query($sql);
                $row=$query->fetch_assoc();
                echo $row['total_proveedor'];

               ?></h3>

              <p>Proveedor</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="" class="small-box-footer">Ver mas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="plugins/dist/js/app.min.js" type="text/javascript"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
   


</body></html>