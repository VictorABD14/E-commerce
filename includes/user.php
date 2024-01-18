<?php

include_once('db.php');

 class user extends DB{
   
   private $nombre;
   private $username;

   public function userexists($user,$pass){
  	$md5pass=md5($pass);


   $query=$this->connect()->prepare("SELECT * FROM usuarios where Usuario=:user and Password=:pass");

    
   	$query->execute(['user' => $user,'pass' => $md5pass]);
    $resultado=$query->fetch(PDO::FETCH_ASSOC);



   	if ($query->rowCount()) {
      if($resultado['Id_status_B']==1){

      if ($resultado['Id_perfil']==2) {
        $_SESSION['id']=$resultado['Id_usuario'];
       return true;
      }
    }else{
      
    }
   		
   	}else{
   		return false;
   	}
   }


   /*public function setuserid($user,$pass){
    $md5pass=md5($pass);
   $conexion=new mysqli('localhost','root','','implantacion');

   $query=$conexion->prepare("SELECT Usuario,Password,Id_usuario FROM usuarios where Usuario=? and Password=?");
   $query->bind_param('ss',$user,$md5pass);
   $query->execute();
   $query->bind_result($user,$md5pass,$Id_usuario);
   $stmt=$query->fetch();
   $_SESSION['id']=$Id_usuario;

   return $_SESSION['id'];
   }*/
   



      public function setuser($user){


          $query=$this->connect()->prepare("SELECT * FROM usuarios where Primer_nombre=:user");
          $query->execute(['user'=>$user]);



          foreach ($query as $currentuser) {
          	
          	 $this->nombre=$currentuser['Primer_nombre'];
          	 $this->username=$currentuser['Primer_nombre'];

}

}

public function getnombre(){
 	return $this->nombre;
 }



}


?>