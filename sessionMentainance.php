<?php
 	
 	session_start();
 if(!isset($_SESSION['admin'])) {
       header('Location:login.php?message=please login first');
  
   }

?>