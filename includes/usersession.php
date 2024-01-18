<?php
   
   class usersession{



   public function __construct (){
   	  session_start();

   }

   public function setcurrentuser($user){
       
       $_SESSION['user']=$user;
   }


   public function getcurrentuser(){
   	   return $_SESSION['user'];
   }

   public function closesession(){

   	  session_unset();
   	  session_destroy();
   }

   }

?>