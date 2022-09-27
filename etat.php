<?php
$id=$_GET['id'];
include('Connection.php');

if(isset($_GET['id'])AND $_GET['etatt']=='En attente')
{
    $sql = "UPDATE `billet` SET `etat`='Fermé' WHERE `id`=$id";
//Recherche des données
$sth = $cnx->query($sql);
sleep(2); 
header('location:pageadmin.php');
}

if(isset($_GET['id']) AND $_GET['etatt']=='Fermé'){
    $sql = "UPDATE `billet` SET `etat`='En attente' WHERE `id`=$id";
//Recherche des données
$sth = $cnx->query($sql);
sleep(2); 
header('location:pageadmin.php');
}


?>