<?php
  session_start();
  if($_SESSION['utilisateur']){
  unset($_SESSION['utilisateur']);
   header('location: login.php');
  } 

?>