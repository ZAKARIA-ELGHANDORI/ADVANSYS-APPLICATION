<?php
session_start();
if($_SESSION['admin']){ 
  header('location:pageadmin.php');
  // unset($_SESSION['consultant']);
  // unset($_SESSION['consultant']);
}
$_SESSION['admin']=$_POST['nom'];
$_SESSION['password']=$_POST['Password'];
include('Connection.php');
$sql ='SELECT * FROM `administrateurs` ';
//Recherche des données
$sth = $cnx->query($sql);
// On voudrait les résultats sous la forme d’un tableau associatif
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
$nom=$_POST['nom'];
$password=$_POST['Password'];
if(isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['Password'])) {
  foreach($result as $row) {
    if(($_POST['nom']==$row['nom']) AND ($_POST['Password']==$row['password'])) { 
      header('location:pageadmin.php');
      break;
    } else { 
        header('location:loginadmin.php');  
    }
  }
}
?>