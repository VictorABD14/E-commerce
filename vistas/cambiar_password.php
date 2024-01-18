<?php
session_start();

if (!isset($_SESSION['user'])) {
  //echo "hay sesion";
  //$user->setuser($user->$usersession->getcurrentuser());
  header("location:../index.php");
}




include("../includes/db.php");

$connect=new db();
$conexion=$connect->conexion();

if(isset($_POST['changepwd'])){
	
	$op= md5($_POST['oldpassword']);
	$np= md5($_POST['newpassword']);


	$sql="SELECT Password,Id_usuario FROM usuarios where Password=?";
	$chngpwd=$conexion->prepare($sql);
	$chngpwd->bind_param("s",$op);
	$chngpwd->execute();
	$chngpwd->bind_result($op,$id);
	$chngpwd->store_result();
	$chngpwd->fetch();
	$row=$chngpwd->num_rows;
	$_SESSION['id']=$id;

	if($row!=0){

   

     /* $consulta="SELECT password,id FROM usuario where password=? ";
      $resul=$conexion->prepare($consulta);
      $resul->bind_param("s",$op);
      $resul->execute();
      $resul->bind_result($op,$id);
      $fila=$resul->fetch();
      $_SESSION['id']=$id;*/
      
     

		$connect="update usuarios set Password=? where Id_usuario=?";
		$query1=$conexion->prepare($connect);
		$query1->bind_param('si',$np,$id);
        //$query1->execute();
		//$query1->bind_param('si',$np,$id);
		$query1->execute();
			$_SESSION['msg']="Contraseña cambiada exitosamente";
		
		/*if(mysqli_query($conexion,$con)){
			echo $id;
		   echo $np;
		}*/
		

		
		

	}else{
		$_SESSION['msg']="Contraseña antigua no coincide";
	}

}






?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Cambiar password</title>
	<link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Font Awesome Icons -->
    <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Theme style -->
    <link href="../plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
     <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/morris/example.css">
	<script src="../plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
		function valid(){
			if(document.changepwd.newpassword.value!=document.changepwd.cpassword.value){
				alert("Nueva contraseña y Confirmar contraseña no coinciden");
				document.changepwd.cpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body class=" skin-blue-light sidebar-mini">

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
<!-- -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="">Cliente <b class="caret"></b> </span>

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
                                    <li><a href="../index.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="./?view=sell"><i class="fa fa-usd"></i> <span>Vender</span></a></li>
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

	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md">

					<h2 class="page-title" style="justify-content: center;">Cambia la contraseña</h2>

					<div class="row">
						<div class="panel-body">

							<form action="" method="post" name="changepwd" id="changepwd" onSubmit="return valid();">
			<?php          if(isset($_POST['changepwd'])){ ?>
				   <p style="color: red "><?php echo htmlentities($_SESSION['msg']) ?><?php echo htmlentities($_SESSION['msg']="");?></p>
				<?php } ?>

				<div class="hr-dashed"></div>
				<div class="form-group">
               <label class="col-sm-3 control-label">Antigua contraseña</label>
               <div class="col-sm-9">
               	<input type="password" value="" style="width: 50%;" name="oldpassword" id="oldpassword" class="form-control" onBlur="checkpass()" required="required">
               	<span id="password-availability-status" class="help-block m-b-none" style="font-size:;"></span></div>

               </div>
               <div class="form-group">
               	<label class="col-sm-3 control-label" >Nueva contraseña</label>
               	<div class="col-sm-9" style="text-align: center;">
               		<input type="password" class="form-control" style="width: 50%;" name="newpassword" id="newpassword" >
               </div>
               <br>
				<br>

				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Confirmar contraseña</label>
					<div class="col-sm-9" style="justify-content: right;">
                    
						<br>
                
                <input type="password" class="form-control" style="width: 50%;" name="cpassword" id="cpassword" required="required">
					
				</div>
			</div>
				<br>

                <br>
                <br>
                <br>
                <br>

				<div class="col-sm-6 col-sm-offset-4">
					<button class="btn btn-default" type="submit">Cancelar</button>
					<input type="submit" name="changepwd" value="Cambia contraseña" class="btn btn-primary">

						</div>

					</form>
					</div>
					
				</div>
				
			</div>
			


		</div>
		
	</div>
</div>

<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright © 2022 <a href="http://evilnapsis.com/company/" target="_blank">Victor Camacaro</a></strong>
      </footer>

<script >
	function checkpass(){
		$('#loaderIcon').show();
		$.ajax({
			url:"../includes/check_availability.php",
			data:'oldpassword='+$('#oldpassword').val(),
			type:"POST",
			success:function(data){
				$("#password-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error:function(){}
		});
	}
</script>

</body>
</html>