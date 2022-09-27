<?php 
include('Connection.php');
$nom=$_POST['nom'];
$email=$_POST['email'];
$societe=$_POST['societe'];
$fonction=$_POST['fonction'];
$telephone=$_POST['telephone'];
$password=$_POST['Password'];
echo $nom;

if( isset($_POST['submit']) AND !empty($_POST['nom']) AND !empty($_POST['email']) 
AND !empty($_POST['societe']) AND !empty($_POST['fonction']) AND !empty($_POST['telephone']) 
AND !empty($_POST['Password']) AND $password==$_POST['PasswordC']) {
    $sql="INSERT INTO `inscription`(`nom`, `email`, `societe`, `fonction`, `telephone`, `password`)
     VALUES ('$_POST[nom]','$_POST[email]','$_POST[societe]',
     '$_POST[fonction]','$_POST[telephone]','$_POST[Password]')";
    $sth=$cnx->query($sql) ;
    $sql1="INSERT INTO `utilisateurs`(`nom`, `password`) VALUES ('$_POST[nom]','$_POST[Password]')";
    $sth1=$cnx->query($sql1);

    sleep(2);
    header('location:inscription.html');

    
     
}
?>