<?php
session_start();
include('Connection.php');
$consultant=$_SESSION['consultant'];
$search=false ;
if(!$consultant){ 
   header('location:loginconsultant.php');
}
$sql = "SELECT * FROM `billetconsultant` WHERE `consultant`='$_SESSION[consultant]' ";
//Recherche des données
$sth = $cnx->query($sql);
// On voudrait les résultats sous la forme d’un tableau associatif
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit']) AND !empty($_POST['search']) ) {
   $search=$_POST['search'];
   $sql = "SELECT * FROM `billetconsultant` WHERE sujet Like '%$search%'";
   $sth3 = $cnx->query($sql);
   $resultsearch = $sth3->fetchAll();
 
 }

 $sql1 = "SELECT COUNT(*) as nbrB FROM `billetconsultant` WHERE `consultant`='$_SESSION[consultant]'";
//Recherche des données
$sth1 = $cnx->query($sql1);
$count = $sth1->fetchAll();


$sql2 = "SELECT COUNT(*) as nbrS FROM `billetconsultant` where sujet Like '%$search%'  AND `consultant`='$_SESSION[consultant]'";
//Recherche des données
$sth2 = $cnx->query($sql2);
$countS = $sth2->fetchAll();

foreach ($countS as $row2){
     if($row2['nbrS']==0){ 
      $search=false;
     }
      //  else $search=true;
    
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pageadmin.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>PAGE CONSULTANT</title>
</head>
<body>
<nav> 
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        <label class='logo'><img src="IMG/logo.png" alt="" 
         style="width: 6cm; height: 1.8cm; padding-top:6px ;"> </label>
         <ul>
        <li><a href="Accueil.html" target="_blank"  >Accueil</a></li>
        <li><a href="presentation.html" target="_blank">Présentation</a></li>
        <li><a href="solutions.html" target="_blank">Nos solutions</a></li>
        <li><a href="ESPACE.php" target="_blank" >Espace client</a> <br>
          </li> <br> 
     </ul>

   </nav> <br><br> <br> <br>
</div>

<div class="div0">
        <!-- <form action="ticket.php" method="post"> -->
         <!-- <button class="btn1" id="listeB" onclick="clicklisteB()"><i id="I1" class='fas fa-tasks' style='font-size:24pxpx;color:#3498db'></i> Liste des billets</button> -->
          <!-- </form>  -->

      </div>
      <div style="height: 3cm"></div>

      <div class="div1">
        <div class="div2"> <h3><i id="I" class='fas fa-tasks' style='font-size:24pxpx;color:white'></i>
            Espace billet <span style="float : right"><?php echo $consultant ?>
            <i class='fas fa-user-alt' style='font-size:25px'></i></span></h3>
        
        </div> 
        <!-- <div id="profile" style="display:none;">
         <input type="text" name="profile" class="search" value=" <?php echo $consultant ?>">
           
         </div> -->
         <div id="yes">
       
        <!-- <div class="div5" style="display: block;" id="divCont">
        <div class="div3">
         <form action="pageadmin.php" method="post">
         <i class='fas fa-search' style='font-size:21px'></i>
         <input type="text" placeholder="Rechereche by subject.." name="search" class="search">
         <button  class="btn1" name="submit">Search</button>
         </form>
         <div style="width: 16cm; border:black solid 1px"></div> <br> <br>
         <?php if($search==true) { ?>
         <div id="recherche" style="display:block">
         <table class="T2" style="margin-right:2cm">
            <tr class="TR1">
               <th>Identifiant</th>
               <th>Sujet</th>
               <th>Catégorie</th>
               <th>Utilisateur</th>
            
            </tr>
           
            
         <?php foreach ($resultsearch as $row1){ ?>
            <tr>
               <th class="th1">#<?php echo $row1['id'] ?></th>
               <th class="th1"><?php echo $row1['sujet'] ?></th>
               <th class="th1"><?php echo $row1['categorie'] ?></th>
               <th class="th1"><?php echo $row1['utilisateur'] ?></th>
               
        


 
            </tr>
         
         
          <?php } ?>
          </table>
         <?php } ;?>
         </div>
         
        </div> -->
        

       <center> <span style="color: red; padding-left:1cm ;">Liste des billets a traiter *</span> </center>
        <div class="div4">
          <table class="T1">
            <tr class="TR1">
               <th>Identifiant</th>
               <th>Sujet</th>
               <th>Catégorie</th>
               <th>Utilisateur</th>
       
            </tr>
            
         <?php foreach ($result as $row){ ?>
            <tr>
                
               <th class="th1">#<?php echo $row['id'] ?></th>
               <th class="th1"><?php echo $row['sujet'] ?></th>
               <th class="th1"><?php echo $row['categorie'] ?></th>
               <th class="th1"><?php echo $row['utilisateur'] ?></th> 
            </tr>
         <?php } ?>
          </table>
          <script src="pageadmin.js"></script>
        </div>
          <center> <h3 style="color:red;">Nombre de billet 
           <?php foreach ($count as $row2){
           echo $row2['nbrB'];
               }?>
           </h3></center> <br>
      </div>


   </div> 
   </div> 
   <!-- yes -->

   
  <a href="logoutconsl.php"><input style="margin-left:27cm;"
     type="button" value="Déconnecter" name="submit" class="btn1"></a>
    
</body>
</html>