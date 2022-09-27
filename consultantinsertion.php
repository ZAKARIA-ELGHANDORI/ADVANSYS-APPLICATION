<?php 
include('Connection.php');
$id=$_GET['id'];
$consultantt=$_GET['consultantt'];
$sql2 = "SELECT  COUNT(*) as constt FROM `billetconsultant` where `id`=$id";
//Recherche des données
$sth2 = $cnx->query($sql2);
$const = $sth2->fetchAll();

foreach ($const as $row2) {
if(isset($_GET['consultantt']) AND $row2['constt']==0){
   
    $sql = "UPDATE `billetadmin` SET `consultant`='$_GET[consultantt]' WHERE `id`=$id ";

  
 $sth = $cnx->query($sql);
  

  

    $sql1 = "INSERT INTO `billetconsultant`(`id`, `sujet`, `categorie`, `utilisateur`,`consultant`) 
    VALUES ('$_GET[id]','$_GET[sujet]','$_GET[categorie]','$_GET[utilisateur]','$_GET[consultantt]')";
    //Recherche des données
    $sth1 = $cnx->query($sql1);
    header('location:pageadmin.php');
}
}
foreach ($const as $row2) {
 if(isset($_GET['consultantt']) AND $row2['constt']>0) {
  $sql = "UPDATE `billetadmin` SET `consultant`='$_GET[consultantt]' WHERE `id`=$id ";

  
  $sth = $cnx->query($sql);
  header('location:pageadmin.php');

 }
}



?>