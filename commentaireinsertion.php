<?php
include('Connection.php');
$commentaire=$_POST['commentaire'];
$id=$_POST['id'];
$utilisateir=$_POST['utilisateur'];

$sql1 = "SELECT COUNT(*) as nbrC FROM `commentaires` WHERE `id`='$id'";
//Recherche des données
$sth1 = $cnx->query($sql1);
$count = $sth1->fetchAll();
foreach($count as $row){
    if($row['nbrC']==0){
if(isset($_POST['submit']) AND !empty($_POST['commentaire'])){ 
    $sql1 = "INSERT INTO `commentaires`(`id`,`commentaire`,`utilisateur`,`consultant`) 
    VALUES ('$_POST[id]','$_POST[commentaire]','$_POST[utilisateur]','$_POST[consultant]')";
    //Recherche des données
    $sth1 = $cnx->query($sql1);
    header('location:pageconsultant.php');
}
}
}
if($row['nbrC']>0){
    $sql1 = "UPDATE `commentaires` SET `commentaire`='$_POST[commentaire]' ,
    `utilisateur`='$_POST[utilisateur]' ,
    `consultant`='$_POST[consultant]'
     WHERE `id`=$id";
    //Recherche des données
    $sth1 = $cnx->query($sql1);
    header('location:pageconsultant.php');
}


?>