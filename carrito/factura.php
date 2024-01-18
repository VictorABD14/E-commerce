<?php 
session_start();
//$conexion=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();
$sesion=$_SESSION['user'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Shopping cart</title>
	<link rel="stylesheet"  href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="..\plugins\bootstrap\css\bootstrap.min.css">
	<link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
	<link href="../plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
	<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    <script type="text/javascript" src="../jspdf/jquery.min.js"></script>
<script src="../jspdf/bootstrap.min.js"></script>

  <script src="../jspdf/dist/jspdf.min.js"></script>
  <script src="../jspdf/jspdf.plugin.autotable.min.js"></script>

          <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="plugins/morris/raphael-min.js"></script>
<script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">
          <script src="../plugins/jspdf/jspdf.min.js"></script>
          <script src="../plugins/jspdf/jspdf.plugin.autotable.js"></script>
	
</head>


	<body class="  skin-blue-light sidebar-mini ">
    <div class="" >
      <!-- Main Header -->
            <header class="main-header">
        <!-- Logo -->
        <a href="./" class="logo bg-purple-gradient">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>I</b>L</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Tienda </b>online</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top bg-purple-gradient" role="navigation">
          <!-- Sidebar toggle button-->

          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class=""><?php $sql="SELECT * FROM usuarios where Usuario='$sesion'";


                  $query=$conexion->query($sql);

                  while ($row=$query->fetch_assoc()) {
                    echo $row['Primer_nombre'];
                  }

                   ?> <b class="caret"></b> </span>

                </a>
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
                                    <li><a href="../pagina-principal.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            
            <li><a href="cart.php"><i class="fa fa-glass"></i> <span>Productos</span></a></li>

            <li class="treeview">
              <a href="../vistas/mi_cuenta.php"><i class="fa fa-database"></i> <span>Mi cuenta</span> </a>
              <ul class="treeview-menu">
                <li><a href="./?view=categories">Categorias</a></li>
                <li><a href="./?view=clients">Clientes</a></li>
                <li><a href="./?view=providers">Proveedores</a></li>
              </ul>
            </li>

            <li class="treeview">
              
              <ul class="treeview-menu">
                <li><a href="./?view=inventary">Inventario</a></li>
                <li><a href="./?view=re">Abastecer</a></li>
                <li><a href="./?view=res">Abastecimientos</a></li>
              </ul>
            </li>
                        <li class="treeview">
             
              <ul class="treeview-menu">
                <li><a href="./?view=reports">Inventario</a></li>
                <li><a href="./?view=sellreports">Ventas</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="../includes/logout1.php"><i class="fa fa-cog"></i> <span>Cerrar sesion</span></a>
              <ul class="treeview-menu">
                <li><a href="./?view=users">Usuarios</a></li>
                <li><a href="./?view=settings">Configuracion</a></li>
              </ul>
            </li>
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>




<div class="container" style="width: 700px;padding: 0px 100px 20px 10px;">



 <div class="table" style="height: 100%;padding-top: 20px;/*width: 600px;*/padding-left: 25%;margin-bottom: 20px;" >
  <table class="table table-bordered">
  <tr>
    <th width="30%">Nombre del producto</th>
    <th width="10%">Cantidad</th>
    <th width="13%">Precio in bolivares</th>
    <th width="10%">Precio in dolares</th>
    <th width="10%">Precio Total </th>
    <th width="10%">Precio Total en dolares</th>
    <th width="17%">Eliminar producto</th>
  </tr>
<?php


if (!empty($_SESSION['cart'])) {
      $total=0;
      $total_dolares=0;
  
      foreach ($_SESSION['cart'] as $key => $value) {
        ?>


        <tr>
          <td><?php echo $value['nombre_producto'];?></td>
          <td><?php echo $value['item_quantity']; ?></td>
          <td><?php echo $value['precio']; ?></td>
          <td><?php echo $value['Precio_dolares']; ?></td>
          <td><?php echo number_format($value["item_quantity"] * $value["precio"],2); ?></td>
          <td><?php echo number_format($value["item_quantity"] * $value["Precio_dolares"],2); ?></td>
          <td><a class="btn btn-danger" href="cart.php?action=delete&id=<?php echo $value['id_producto']; ?>"><span class="text-danger" style="color: #fff;">Remove item</span></a></td>

        </tr>
      </div>

    
        
        
      
        <?php



         $total+= ($value['precio'] * $value['item_quantity']);
              $total_dolares+= ($value['Precio_dolares'] * $value['item_quantity'] );

             
        
      }

        $iva=0.16;
          $IGT=0.03;

              echo "<div style='margin-bottom:20px'>";

              $total_iva=$total* $iva;
              $total_iva_dolares=$total_dolares* $iva;

              $total_completo=$total + $total_iva;
              $total_completo_dolares=$total_dolares + $total_iva_dolares;

            srand(time());
              //mt_srand(10);
              $codigo_factura=rand(1,1000000);
              $_SESSION['factura']=$codigo_factura;

              $sql1="SELECT * FROM empresa";
              $consulta=$conexion->query($sql1);
              $row=$consulta->fetch_assoc();

              echo "<br>";
             
              echo "<br>";

              echo "<h1 style='text-align:center;'>SENIAT</h1>";
              echo "<p style='text-align:center'>Empresa ". $row['Nombre_empresa']   ." </p>";
              echo "<p style='text-align:center'>".$row['direccion']." </p>";
               echo "<h1 style='text-align:center;'>FACTURA</h1>";
               echo "<p>FACTURA:                         ".$codigo_factura." </p>";
               echo "FECHA:    ".date('m/y/d')."" ;
               echo "<br>";
               echo "HORA:".date('h:i:s');
               echo "<br>";
               echo "<select id='' class='' name='metodo' style='height:30px;border-radius:5px;'>
                <option>Seleccione metodo de pago</option>
                <option>Transerencia</option>
                <option>Pago movil</option>
               </select>";
               echo "<hr>";
              
             echo "El total del precio de los productos es ".$total." Bs<br> y en dolares es ".$total_dolares."$";

            
              echo "<br>";
             
              echo "<br>";

              echo "El iva es ".$total_iva." Bs";
              echo "<br>";

              echo "El iva en dolares ". $total_iva_dolares." $<br>";

               echo "El total a pagar en bolivares es ".$total_completo;
               echo "<br>";
                echo "El total en dolares ".$total_completo_dolares;

             

             echo "<br>";
             echo "<br>";
             echo "<button type='submit' class='btn btn-primary'><a href='restar_stock.php' style='color:white;margin-bottom'> Terminar compra</a></button>";

             echo "</div>";

             echo "<div style=margin-bottom:10px;>";
             echo "<button id='generarpdf' class='btn btn-default'>Generar PDF</button>";
             echo "</div>";

    }
        ?>


 




 <!-- <?php
	if (!empty($_SESSION['cart'])) {

  $total=0;
  $total_dolares=0;

       
     foreach ($_SESSION['cart'] as $key => $value) {

      ?>
      
          
        
      
      
          <p>Nombre:  <?php echo $value['nombre_producto'];?></p>
          <p> Cantidad: <?php echo $value['item_quantity']; ?></p>
          <p>Precio: <?php echo $value['precio']; ?></p>
          <p>Precio en dolares: <?php echo $value['Precio_dolares']; ?><p>
          <p>Total en bolivares: <?php echo number_format($value["item_quantity"] * $value["precio"],2); ?></p>
          <p>Total en dolares <?php echo number_format($value["item_quantity"] * $value["Precio_dolares"],2); ?></p>
          <p><a class="btn btn-danger" href="cart.php?action=delete&id=<?php echo $value['id_producto']; ?>"><span  style="color: white;">Remove item</span></a></p>
        

              

        <?php

          $total+= ($value['precio'] * $value['item_quantity']);
              $total_dolares+= ($value['Precio_dolares'] * $value['item_quantity'] );
            
             }

              $iva=0.16;
          $IGT=0.03;

              

              $total_iva=$total* $iva;
              $total_iva_dolares=$total_dolares* $iva;

              $total_completo=$total + $total_iva;
              $total_completo_dolares=$total_dolares + $total_iva_dolares;

              echo "El iva es ".$total_iva;
              echo "<br>";

              echo "El iva en dolares ". $total_iva_dolares."<br>";

              echo "El total a pagar en bolivares es ".$total_completo;
              echo "<br>";
              echo "El total en dolares ".$total_completo_dolares;

             echo "<br>";
             echo "<br>";
             echo "<button type='submit' class='btn btn-primary'><a href='restar_stock.php' style='color:white;'> Terminar compra</a></button>";

             echo "<p>";
             echo "fff";
             echo "</p>";

}


?>
-->


</div>
</div>



<script>
$("#generarpdf").click(function(){
  var pdf = new jsPDF();
  pdf.text(20,20,"Mostrando Los datos de la compra");

  var columns = ["Id","nombre producto", "Precio", "Cantidad"];
  var data = [
  <?php $n=0 ;?>
<?php foreach($_SESSION['cart'] as $c):?>
  <?php $n++; ?>
 [<?php echo $n; ?>, "<?php echo $c['nombre_producto']; ?>", "<?php echo $c['precio']; ?>", "<?php echo $c['item_quantity']?>"],
<?php endforeach; ?>  
  ];

  pdf.autoTable(columns,data,
    { margin:{ top: 25  }}
  );

  pdf.save('compra.pdf');

});


</script>

<script type="text/javascript" src="..\plugins\bootstrap\js\bootstrap.min.js"></script>
</body>
</html>