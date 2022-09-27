<?php 
   
include('Connection.php');
   


if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $titre=$_POST['titre'];
    $titreD=$_POST['titreD'];
    $imagetitre=$_POST['imagetitre'];
    $titretexte=$_POST['titretexte'];
    $texte=$_POST['texte'];
    $imagetexte=$_POST['imagetexte'];
    $information=$_POST['information'];

  $sql = "UPDATE solutions SET id='$id', titre='$titre' , titreD='$titreD' ,
   imagetitre='$imagetitre' , titretexte='$titretexte', imagetexte='$imagetexte',information='$information' 
    WHERE id=$id";
    $sth = $cnx->query($sql);
    header('location: Administrateur.php');
}


?>


  <?php if(isset($_POST['submit']) AND !empty($_POST['id']) AND !empty($_POST['titre']) AND !empty($_POST['titreD']) AND !empty($_POST['imagetitre']) 
   AND !empty($_POST['titretexte']) AND !empty($_POST['texte']) AND !empty($_POST['imagetexte'])) : ?>
      
    <?php
           
           
$sql="INSERT INTO `solutions` (`id`, `titre`,`titreD`,`imagetitre` ,`titretexte`,`texte` ,`imagetexte` ,`information`) 
           Values ('$_POST[id]','$_POST[titre]','$_POST[titreD]','$_POST[imagetitre]','$_POST[titretexte]',
          '$_POST[texte]', '$_POST[imagetexte]' ,'$_POST[information]')";
      $sth=$cnx->query($sql);
      header('location: Administrateur.php');
  
 
  ?>
 
 <?php endif; ?> 



