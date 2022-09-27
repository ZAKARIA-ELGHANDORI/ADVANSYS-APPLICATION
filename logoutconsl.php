<?php
  session_start();
  if($_SESSION['consultant']){ 
    unset($_SESSION['consultant']);
   header('location: loginconsultant.php'); 
  }
?>