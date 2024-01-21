<?php




include_once('includes/user.php');
include_once('includes/usersession.php');



$usersession=new usersession();
$user=new user();


if (isset($_SESSION['user'])) {
	//echo "hay sesion";
	//$user->setuser($user->$usersession->getcurrentuser());
	include_once("vistas/home_cliente.php");
}elseif(isset($_POST['username']) && isset($_POST['password'])){
    //echo "validacion de login";

    $userform=$_POST['username'];
    $passform=$_POST['password'];
    $md5pass=md5($passform);

   


    if ($user->userexists($userform,$passform)) {
    	/*echo "<div style='background:lightgreen;width:20%;color:white;'>
               usuario validado
               </div>";*/

                /*$conexion=new mysqli('localhost','root','','implantacion');

    
   $stmt=$conexion->query("SELECT * FROM Usuarios WHERE Usuario='$userform' and Password='$md5pass' ");
               
                $rs=$stmt->fetch_assoc();
                $_SESSION['id']=$rs['Id_usuario'];*/

       
    	$usersession->setcurrentuser($userform);
    	$user->setuser($userform);
    	include_once("vistas/home_cliente.php");
    	}else{
            $errorlogin="nombre y/o password incorrecto";
    		//echo "nombre o contraceña  incorrectos";
    		include_once("vistas/login.php");
    	}
}else{
	//echo "login";
	include_once('vistas/login.php');
}





?>
