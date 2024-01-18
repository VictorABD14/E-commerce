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
    <title>Gestion de usuario</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link href="../bootstrap.min.css" rel="stylesheet" type="text/css">
   
   <link href="../plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link href="../plugins/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="../plugins/dist/css/skins/skin-blue-light.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

  
          <script src="plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="plugins/morris/raphael-min.js"></script>
<script src="plugins/morris/morris.js"></script>
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/morris/example.css">
          <script src="plugins/jspdf/jspdf.min.js"></script>
          <script src="plugins/jspdf/jspdf.plugin.autotable.js"></script>
          
  </head>

  <body class="skin-blue-light sidebar-mini">
    <div class="wrapper">
     
            <header class="main-header">
       
        <div class="logo bg-purple-gradient">
          
          <span class="logo-mini"><b>I</b>L</span>
          
          <span class="logo-lg"><b>Sistema de </b>gestion</span>
        </div>

        
        <nav class="navbar navbar-static-top bg-purple-gradient" role="navigation" style="height: 8%;">
         
         
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              
              <li class="dropdown user user-menu">
               

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
            <div class="content-wrapper" style="min-height: 552px;">
      <div class="content">
        	<div class="row">
	<div class="col-md-12">
		<h1>Gestion de Usuarios</h1>
    <div class="btn-group  pull-right">
  <a href="agregar_usuario.php" class="btn btn-default">Agregar Usuario</a>
</div>


</div>
</div>

  <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
       
        <!-- ./col -->
      </div>
      <!-- /.row -->

<div class="row">
  
	
<div class="clearfix"></div>
<div class="table-responsive">
<br><table class="table table-hover table-bordered">
	<thead>
		<tr><th>Id</th>
		<th>Primer Nombre </th>
		<th>Segundo Nombre</th>
		<th>Primer Apellido</th>
    <th>Segundo Apellido</th>
    <th>Usuario</th>
    <th>Tipo de cedula</th>
    <th>Cedula</th>
    <th>Estado</th>
    <th>Municipio</th>
    <th>Parroquia</th>
    <th>Ciudad</th>
    <th>Correo electronico</th>
    <th>telefono</th>
    <th>Estatus</th>
    <th>Perfil</th>

	</tr></thead>
  <tbody>
    <?php $sql="SELECT * FROM usuarios INNER JOIN estados on usuarios.id_estado=estados.id_estado  INNER JOIN municipios ON usuarios.id_municipio=municipios.id_municipio INNER JOIN parroquias ON usuarios.id_parroquia=parroquias.id_parroquia INNER JOIN ciudades ON usuarios.id_ciudad=ciudades.id_ciudad INNER JOIN status_b ON usuarios.id_status_B=status_b.id_status_B INNER JOIN perfiles_usuario ON usuarios.Id_perfil=perfiles_usuario.Id_perfil order by Id_usuario";
      $query=$conexion->query($sql);

      while ($row=$query->fetch_assoc()) {
        
      

        ?>
    <tr><th><?php echo $row['Id_usuario']; ?></th>
    <td><?php echo $row['Primer_nombre']; ?> </td>
    <td><?php echo $row['Segundo_Nombre']; ?></td>
    <td><?php echo $row['Primer_apellido']; ?></td>
    <td><?php echo $row['Segundo_Apellido']; ?></td>
    <td><?php echo $row['Usuario']; ?></td>
    <td><?php echo $row['Tipo_C']; ?></td>
    <td><?php echo $row['Cedula']; ?></td>
    <td><?php echo $row['estado']; ?></td>

    <td><?php echo $row['municipio']; ?></td>
    <td><?php echo $row['parroquia'] ?></td>
    <td><?php echo $row['ciudad'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['telefono'] ?></td>
    <td><?php echo $row['Nombre_status_B'] ?></td>
    <td><?php echo $row['Nombre_perfil'] ?></td>
    <td style="width:70px;">
    <a href="editar_usuario.php?id=<?php echo $row['Id_usuario']; ?>" class="btn btn-warning">Actualizar</a></td>
    
    <td>
    <a href="../includes/eliminar_usuario.php?id=<?php echo $row['Id_usuario']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
    </td>

    <?php } ?>
    

  </tr>


 
  </tbody>

		</table>
  </div>
  

<div class="clearfix"></div>

	<br><br><br><br><br><br><br><br><br><br>
	</div>
</div>        </div>
      </div><!-- /.content-wrapper -->

        <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright © Victor 2022 <a href="" target="_blank">Victor Camacaro</a></strong>
      </footer>
      

    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="plugins/dist/js/app.min.js" type="text/javascript"></script>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $(".datatable").DataTable({
          "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "Mostrar _MENU_ registros",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "Ningún dato disponible en esta tabla",
        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        "Buscar:",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
        });
      });
    </script>
    
  


</body></html>