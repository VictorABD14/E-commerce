<?php 

//$mysqli=new mysqli('localhost','root','','implantacion'); 
include("../includes/db.php");

$connect=new db();
$mysqli=$connect->conexion();
session_start();

 if (!isset($_SESSION['administrador'])) {
  //echo "hay sesion";
  //$user->setuser($user->$usersession->getcurrentuser());
  header("location:../vistas/login_modo_privilegiado.php");
}
?>

<html><head>
    <meta charset="UTF-8">
    <title>Agregar usuario</title>
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
  
    $(document).ready(function(){
      $("#cbx_estado").change(function(){
        $('#cbx_ciudad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
        $("#cbx_estado option:selected").each(function(){
          id_estado=$(this).val();
          $.post("../includes/getmunicipio.php",{id_estado:id_estado},function(data){
                $("#cbx_municipio").html(data);
          });
        });
      });
    });


    $(document).ready(function(){
      $("#cbx_municipio").change(function(){
        
        $("#cbx_municipio option:selected").each(function(){
            id_municipio=$(this).val();
            $.post("../includes/getlocalidad.php",{id_municipio:id_municipio},function(data){
              $("#cbx_parroquia").html(data);
            });
        });
      });
    });


    $(document).ready(function(){
      $("#cbx_estado").change(function(){
        
        $("#cbx_estado option:selected").each(function(){
            id_municipio=$(this).val();
            $.post("../includes/getciudad.php",{id_estado:id_estado},function(data){
              $("#cbx_ciudad").html(data);
            });
        });
      });
    });


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
                                    <li><a href="../vistas/home_admin.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
            
            <li><a href="ver_ventas.php"><i class="fa fa-shopping-cart"></i> <span> Ventas</span></a></li>
            
            <li><a href="ver_productos.php"><i class="fa fa-glass"></i> <span>Productos</span></a></li>

            <li class="treeview">
              <a href="mi_cuenta_admin.php"><i class="fa fa-database"></i> <span>Mi cuenta</span> </a>
              <ul class="treeview-menu">
                <li><a href="./?view=categories">Categorias</a></li>
                <li><a href="./?view=clients">Clientes</a></li>
                <li><a href="./?view=providers">Proveedores</a></li>
              </ul>
            </li>

            
                        <!--<li class="treeview">
              <a href="#"><i class="fa fa-file-text-o"></i> <span>Reportes</span></a>
              <ul class="treeview-menu">
                <li><a href="./?view=reports">Inventario</a></li>
                <li><a href="./?view=sellreports">Ventas</a></li>
              </ul>
            </li>-->


            <li class="treeview">
              <a href="../includes/cerrar_sesion.php"><i class="fa fa-cog"></i> <span> Cerrar sesion</span></a>
              <ul class="treeview-menu">
                <li><a href="./?view=users">Usuarios</a></li>
                <li><a href="./?view=settings">Configuracion</a></li>
              </ul>
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
  <h1>Nuevo Usuario</h1>
  <br>
    <form class="form-horizontal" method="post" enctype="multipart/form-data" id="addproduct" action="../includes/agregar_usuario.php" role="form">



      <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Imagen</label>
    <div class="col-md-6">
      <input type="file" name="imagen" id="image" placeholder="">
    </div>
  </div>

  
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Primer Nombre</label>
    <div class="col-md-6">
      <input type="text" name="p_nombre" id="product_code" class="form-control" placeholder="Ingresar Primer Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Segundo Nombre</label>
    <div class="col-md-6">
      <input type="text" name="s_nombre" required="" class="form-control" id="name" placeholder="Ingresar Segundo Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Primer Apellido</label>
    <div class="col-md-6">
      <input type="text" name="p_apellido" required="" class="form-control" id="name" placeholder="Ingresar Primer Apellido">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Segundo Apellido</label>
    <div class="col-md-6">
      <input type="text" name="s_apellido" required="" class="form-control" id="name" placeholder="Ingresar Segundo Apellido">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Usuario</label>
    <div class="col-md-6">
      <input type="text" name="usuario" required="" class="form-control" id="name" placeholder="Ingresar usuario">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Password</label>
    <div class="col-md-6">
      <input type="password" name="password" required="" class="form-control" id="password" placeholder="Ingresar password">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tipo de cedula</label>
    <div class="col-md-6">
      <select name="tipo_c" class="form-control" required>
            <option>Tipo cedula</option>
            <option value="V">V</option>
            <option value="E">E</option>
          </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">N° cedula</label>
    <div class="col-md-6">
      <input type="text" name="cedula" minlength="7" maxlength="11" required="" class="form-control" id="name" placeholder="Ingresar numero de cedula">
    </div>
  </div>

 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Direccion</label>
    <div class="col-md-6">
      <input type="text" name="direccion" required="" class="form-control" id="name" placeholder="Ingresar direccion">
    </div>
  </div>




<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-md-6">

    <div>Selecciona estado: <select name="cbx_estado" id="cbx_estado" class="form-control">
      <option value="0">Seleccionar estado</option>
      <?php
      $query="SELECT * FROM estados";
            $resultado=$mysqli->query($query);

            while($row=$resultado->fetch_assoc()){?>
              <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
            <?php }?>
      

    </select>
      
    </div>    </div>
  </div>
 <!-- <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Estado</label>
    <div class="col-md-6">
      <input type="text" name="name" required="" class="form-control" id="name" placeholder="Ingresar Estado">
    </div>
  </div>-->


  <div class="form-group" >
    <label for="inputEmail1" class="col-lg-2 control-label">Municipio</label>
    <div class="col-md-6" id="div">
     <div>Selecciona municipio<select name="cbx_municipio" id="cbx_municipio" class="form-control"></select></div>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Parroquia</label>
    <div class="col-md-6">
      <div>Selecciona parroquia <select name="cbx_parroquia" id="cbx_parroquia" class="form-control"></select></div>
        </div>

          </div>
          </div>

          
    </div>
  </div>



  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ciudad</label>
    <div class="col-md-6">
      <div>Selecciona ciudad <select name="cbx_ciudad" id="cbx_ciudad" class="form-control"></select></div>
    </div>
  </div>




 <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Genero</label>
    <div class="col-md-6">
      <select name="genero"id="" class="form-control">
            <option value="">seleccione un genero</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            
        </select>
      

    </div>
  </div>

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Email</label>
    <div class="col-md-6">
      <input type="text" name="email" required="" class="form-control" id="name" placeholder="Ingresar Email">
    </div>
  </div>

   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Telefono</label>
    <div class="col-md-6">
      <input type="text" name="telefono" required="" class="form-control" id="name" placeholder="Ingresar telefono">
    </div>
  </div>

<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Estatus</label>
    <div class="col-md-6">
     
    <select name="estatus" class="form-control">
     <option value="">Seleccione un Estatus</option>
      <?php 

      $sql="SELECT Id_status_B,Nombre_status_B FROM status_b ";
      
      $query=$mysqli->query($sql);

       while ($row=$query->fetch_assoc()) {
         
       

       ?>

    <option value="<?php echo $row['Id_status_B'] ?>"><?php echo $row['Nombre_status_B'] ?></option>
    
         

          <?php } ?>
           </select>    </div>
  </div>
   
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Perfil</label>
    <div class="col-md-6">
    <select name="perfil" class="form-control">

    <option value="">Seleccione un Perfil</option>
    <?php $sql="SELECT Id_perfil,Nombre_perfil FROM perfiles_usuario " ;
      
      $query=$mysqli->query($sql);

       while ($row=$query->fetch_assoc()) {
         
       
?>
    <option value="<?php echo $row['Id_perfil'] ?>"><?php echo $row['Nombre_perfil'] ?></option>
   <?php } ?>

          </select>    </div>
  </div>
   

  
  
  
  <br>
  <br>
  

  
  

  

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Usuario</button>
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