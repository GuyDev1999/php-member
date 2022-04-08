<?php 
   require_once('../../../php/connect.php');

   if( !isset($_SESSION['authen_id'] ) ){
      header('Location: ../../login.php');  
   }
?>