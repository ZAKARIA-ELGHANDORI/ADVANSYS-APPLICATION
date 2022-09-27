<?php
session_start();
if($_SESSION['utilisateur']){ 
  header('location:ticket.php');
  // unset($_SESSION['admin']);
  // unset($_SESSION['consultant']);
}
$_SESSION['utilisateur']=$_POST['nom'];
$_SESSION['password']=$_POST['Password'];
include('Connection.php');
$sql ='SELECT * FROM `utilisateurs` ';
//Recherche des données
$sth = $cnx->query($sql);
// On voudrait les résultats sous la forme d’un tableau associatif
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
$nom=$_POST['nom'];
$password=$_POST['Password'];
if(isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['Password'])) {
  foreach($result as $row) {
    if(($_POST['nom']==$row['nom']) AND ($_POST['Password']==$row['password'])) { 
      header('location:ticket.php');
      break;
    } else { 
        header('location:login.php');  
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div style="display : none">
   <form action="ticket.php" method="post">
     <input type="text" value="<?php echo $_POST['nom'] ?>" name="utilisateur">
   </form>
  </div>
  
</body>
</html>