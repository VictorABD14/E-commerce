<?php 
session_start();
if (!isset($_SESSION['user'])) {
  //echo "hay sesion";
  //$user->setuser($user->$usersession->getcurrentuser());
  header("location:../index.php");
}
//$conexion=new mysqli('localhost','root','','implantacion');
include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

$sesion=$_SESSION['user'];




if (isset($_POST['add'])) {
	if (isset($_SESSION['cart'])) {
		$item_array_id=array_column($_SESSION['cart'], 'id_producto');
		if (!in_array($_GET['id'], $item_array_id)) {
			$count=count($_SESSION['cart']);
			$item_array=array(

              'id_producto'=>$_GET["id"],
              'nombre_producto'=>$_POST["hidden_name"],
          'precio'=>$_POST["hidden_price"],
          'Precio_dolares'=>$_POST['hidden_price_dolar'],
          'item_quantity'=>$_POST["quantity"],

			                  );
			$_SESSION['cart'][$count]=$item_array;
			echo '<script>window.location="cart.php"</script>';
		}else{
			 echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="cart.php"</script>';
		}
	}else{
		$item_array=array(
          'id_producto'=>$_GET["id"],
          'nombre_producto'=> $_POST["hidden_name"],
          'precio'=>$_POST["hidden_price"],
          'Precio_dolares'=>$_POST['hidden_price_dolar'],
          'item_quantity'=>$_POST["quantity"],

		  );
		$_SESSION['cart'][0]=$item_array;
	}
}

if (isset($_GET['action'])) {
	if ($_GET['action']== "delete") {
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($value["id_producto"]== $_GET['id']) {
				unset($_SESSION['cart'][$key]);
				echo "<script> alert('producto ha sido eliminado')</script>";
				echo "<script>window.location='cart.php'</script>";
			}
		}
	}
	# code...
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="shortcut icon" href="../vistas/images/fondo.jfif" type="image/x-icon">

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


          <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="plugins/morris/raphael-min.js"></script>
<script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">
          <script src="plugins/jspdf/jspdf.min.js"></script>
          <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
	<style type="text/css">
		.producto{
			border: 1px solid #eaeaec;
			margin: -1px 19px 3px -1px;
			padding: 10px;
			text-align: center;
			background-color: #efefef;

		}
		table th tr{
			text-align: center;
		}
        
        .title2{
        	text-align: center;
        	color: #66afe9;
        	background-color: #efefef;
        	padding: 2%;
        }
        h2{
        	text-align: center;
        	color: #66afe9;
        	background-color: #efefef;
        	padding: 2%;
        }
        table th{
        	background-color: #efefef;
        }

	</style>
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
          <span class="logo-lg">PC SYSTEM</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top bg-purple-gradient" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="" style="text-transform: uppercase;"><?php $sql="SELECT * FROM usuarios where Usuario='$sesion'";


                  $query=$conexion->query($sql);

                  while ($row=$query->fetch_assoc()) {
                    echo $row['Primer_nombre'];
                  }


                   ?>    </span>

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
          <ul class="sidebar-menu" >
            <li class="header" style="text-transform: uppercase;"><?php $sql="SELECT * FROM usuarios where Usuario='$sesion'";


                  $query=$conexion->query($sql);

                  while ($row=$query->fetch_assoc()) {
                    echo $row['Primer_nombre'];

                   
                  }


                  
                   ?></li>
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
                <li><a href="./?view=reports">Inventario</a></li>
                <li><a href="./?view=sellreports">Ventas</a></li>
              </ul>
            </li>


            <li class="treeview">
              <a href="../includes/logout1.php"><i class="fa fa-cog"></i> <span> Cerrar Sesion</span></a>
              <ul class="treeview-menu">
                <li><a href="./?view=users">Usuarios</a></li>
                <li><a href="./?view=settings">Configuracion</a></li>
              </ul>
            </li>
          
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>




<div class="container" style="width: 650px;padding: 0px 100px 20px 0px;margin-right:20px">
	<h2>Nuestros Productos</h2>
<?php
$idSesion = session_id();
$sql="SELECT * FROM producto";
$result = mysqli_query($conexion,$sql);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
 	<div class="col-md-3" style="margin-bottom: 20px;" >
	<form method="POST" action="cart.php?action=add&id=<?php echo $row['id_producto'] ?>">
		<div class="product" >
			<img style="height: 200px;" src="..\vistas\images\<?php echo $row['imagen_producto'] ?>" class="img-responsive">
			<h5 class="text-info"><?php echo $row['Nombre_producto']; ?></h5>
			<h5 class="text-danger">Bs <?php echo $row['Precio'];echo "/  $".$row['Precio_dolares'] ?></h5>
			<input type="text" name="quantity" class="form-control" value="1">
			<input type="hidden" name="hidden_name" value="<?php echo $row['Nombre_producto']; ?>">
			<input type="hidden" name="hidden_price_dolar" value="<?php echo $row['Precio_dolares']; ?>">
			<input type="hidden" name="hidden_price" value="<?php echo $row['Precio']; ?>">
			<input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="
			Añadir al carrito">
			
		</div>
	</form>
	
</div>

<?php
 	
 }
}
?>


	
</div>

<div style="clear: both;">
	
</div>
<h3 class="title2" style="display: flex; justify-content: center; padding-left: 25%;">Carrito</h3>
<div class="table-responsive" style="/*width: 600px;*/padding-left: 25%;margin-bottom: 20px;" >
	<table class="table table-bordered" >
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
     		<?php
     		$total=$total + ($value['item_quantity'] * $value['precio']);
     		$total_dolares=$total + ($value['item_quantity'] * $value['Precio_dolares']);
     	}
     		?>

     		<tr>
     			<td colspan="3" align="right"> Total</td>
     			<th align="right"><?php echo number_format($total,2) ?></th>
     			<td></td>
     		</tr>

     		<tr>
     			<td colspan="3" align="right"> Total en dolares</td>
     			<th align="right"><?php echo number_format($total_dolares,2) ?></th>
     			<td></td>
     		</tr>
     		<?php
     	}
     

	?>
</table>

<button class="btn btn-warning" ><i class="fa fa-shopping-cart"></i> <a href="factura.php" style="color: #fff;">Ver carrito</a></button>
	
</div>

<script type="text/javascript" src="..\plugins\bootstrap\js\bootstrap.min.js"></script>
</body>
</html>