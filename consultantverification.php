<?php
session_start();
if($_SESSION['consultant']){ 
  header('location:pageconsultant.php');
  // unset($_SESSION['admin']);
  // unset($_SESSION['utilisateur']);
}
$_SESSION['consultant']=$_POST['nom'];
$_SESSION['password']=$_POST['Password'];
include('Connection.php');
$sql ='SELECT * FROM `consultants` ';
//Recherche des données
$sth = $cnx->query($sql);
// On voudrait les résultats sous la forme d’un tableau associatif
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
$nom=$_POST['nom'];
$password=$_POST['Password'];
if(isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['Password'])) {
  foreach($result as $row) {
    if(($_POST['nom']==$row['nom']) AND ($_POST['Password']==$row['password'])) { 
      header('location:pageconsultant.php');
      break;
    } else { 
        header('location:loginconsultant.php');  
    }
  }
}
?>