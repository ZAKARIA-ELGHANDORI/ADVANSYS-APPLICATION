<?php
session_start();
include('Connection.php');
$admin=$_SESSION['admin'];
$search=false ;
$commentaire=true ;
if(!$admin){ 
   header('location:loginadmin.php');
}
$sql = "SELECT * FROM `billetadmin` ";
//Recherche des données
$sth = $cnx->query($sql);
// On voudrait les résultats sous la forme d’un tableau associatif
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

$sql3 = "SELECT * FROM `commentaires` ";
//Recherche des données
$sth3 = $cnx->query($sql3);
// On voudrait les résultats sous la forme d’un tableau associatif
$result3 = $sth3->fetchAll(PDO::FETCH_ASSOC);



if (isset($_POST['submit']) AND !empty($_POST['search']) ) {
   $search=$_POST['search'];
   $sql = "SELECT * FROM `billetadmin` WHERE sujet Like '%$search%'";
   $sth3 = $cnx->query($sql);
   $resultsearch = $sth3->fetchAll();
 
 }

 $sql1 = "SELECT COUNT(*) as nbrB FROM `billetadmin`";
//Recherche des données
$sth1 = $cnx->query($sql1);
$count = $sth1->fetchAll();


$sql2 = "SELECT COUNT(*) as nbrS FROM `billet` where sujet Like '%$search%'";
//Recherche des données
$sth2 = $cnx->query($sql2);
$countS = $sth2->fetchAll();

foreach ($countS as $row2){
   if($row2['nbrS']==0){ 
    $search=false;
   }
    //  else $search=true;
  
  } 

$sql4 = "SELECT COUNT(*) as nbrC FROM `commentaires`";
//Recherche des données
$sth4 = $cnx->query($sql4);
$countC = $sth4->fetchAll();

foreach ($countC as $row4){
   if($row4['nbrC']==0){ 
    $commentaire=false;
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
    <title>PAGE ADMIN</title>
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

      <div class="div1">
        <div class="div2"> <h3><i id="I" class='fas fa-tasks' style='font-size:24pxpx;color:white'></i>
            Espace billet <span style="float : right"><?php echo $admin ?>
            <i class='fas fa-user-alt' style='font-size:25px'></i></span></h3>
        
        </div> 
        <!-- <div id="profile" style="display:none;">
         <input type="text" name="profile" class="search" value=" <?php echo $admin ?>">
           
         </div> -->
         <div id="yes">
       
        <div class="div5" style="display: block;" id="divCont">
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
               <th>Consultant</th>
               <th>Etat</th>
            </tr>
           
            
         <?php foreach ($resultsearch as $row1){ ?>
            <tr>
               <th class="th1">#<?php echo $row1['id'] ?></th>
               <th class="th1"><?php echo $row1['sujet'] ?></th>
               <th class="th1"><?php echo $row1['categorie'] ?></th>

               <?php if($row1['consultant']=='Consultant') {  ?>
               <th class="th1" id="lienconsl">
               <a id="lienconsultant" 
                href="consultant.php?id=<?php echo $row1['id'] ?>&sujet=<?php echo $row1['sujet'] ?>&categorie=<?php echo $row1['categorie'] ?>&utilisateur=<?php echo $row1['utilisateur'] ?>">
            
                <input id="consl" type="button" value="<?php echo $row1['consultant'] ?>"> 
                </a>
               </th>
               <?php  } ?>

               <?php if($row1['consultant']!='Consultant') {  ?>
               <th class="th1" style="background-color:green">
               <a id="lienconsultant" 
                href="consultant.php?id=<?php echo $row1['id'] ?>&sujet=<?php echo $row1['sujet'] ?>&categorie=<?php echo $row1['categorie'] ?>&utilisateur=<?php echo $row1['utilisateur'] ?>">
            
                <input style="background-color:green ; border:none ;     font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                 font-weight: bold;"
                 id="consl1" type="button" value="<?php echo $row1['consultant'] ?>"> 
                </a>
               </th>
               <?php  } ?>


               <th class="th1">
                <?php echo $row1['etat'] ?>
               <div style="display: inline-block ; margin-bottom:9px">
               <a id="lieneta" href="etat.php?id=<?php echo $row1['id'] ?>&etatt=<?php echo $row1['etat'] ?>">
               
              <?php if($row1['etat']=='En attente') {  ?>
              <i id="etat1" class='fas fa-times' style='font-size:24px; color:red' ></i>
              <?php  } ?>

                <?php if($row1['etat']=='Fermé') {  ?>
              <i class='far fa-check-circle' style='font-size:24px; color:green'></i>
              <?php  } ?>
                
  </a> </div> 

                 </th>
            </tr>
         
         
          <?php } ?>
          </table>
         <?php 
          } ;
            ?>
         </div>
         
        </div>

        <span style="color: red; padding-left:1cm ;">Liste des billets de vos clients *</span> 
        <div class="div4">
          <table class="T1">
            <tr class="TR1">
               <th>Identifiant</th>
               <th>Sujet</th>
               <th>Catégorie</th>
               <th>Consultant</th>
               <th>Etat</th>
            </tr>
            
         <?php foreach ($result as $row){ ?>
            <tr>
                
               <th class="th1">#<?php echo $row['id'] ?></th>
               <th class="th1"><?php echo $row['sujet'] ?></th>
               <th class="th1"><?php echo $row['categorie'] ?></th>

              
               <?php if($row['consultant']=='Consultant') {  ?>
               <th class="th1" id="lienconsl">
               <a id="lienconsultant" target="_blank"
                href="consultant.php?id=<?php echo $row['id'] ?>&sujet=<?php echo $row['sujet'] ?>&categorie=<?php echo $row['categorie'] ?>&utilisateur=<?php echo $row['utilisateur'] ?>">
            
                <input id="consl" type="button" value="<?php echo $row['consultant'] ?>"> 
                </a>
               </th>
               <?php  } ?>

               <?php if($row['consultant']!='Consultant') {  ?>
               <th class="th1" style="background-color:green" >
               <a id="lienconsultant" 
                href="consultant.php?id=<?php echo $row['id'] ?>&sujet=<?php echo $row['sujet'] ?>&categorie=<?php echo $row['categorie'] ?>&utilisateur=<?php echo $row['utilisateur'] ?>">
            
                <input style="background-color:green ; border:none ;     font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                 font-weight: bold;"
                 id="consl1" type="button" value="<?php echo $row['consultant'] ?>"> 
                </a>
               </th>
               <?php  } ?>

               <th class="th1"><?php echo $row['etat'] ?>

              <div style="display: inline-block ; margin-bottom:9px">
              <a id="lieneta"
               href="etat.php?id=<?php echo $row['id']?>&etatt=<?php echo $row['etat']?>">
              <form action="etat.php" method="POST">
              <input name="etatt" id="ipetat" type="text" value="<?php echo $row['etat'] ?>" style="display:none">
              </form>

              <?php if($row['etat']=='En attente') {  ?>
              <i id="etat1" class='fas fa-times' style='font-size:24px; color:red' ></i>
              <?php  } ?>

                <?php if($row['etat']=='Fermé') {  ?>
              <i class='far fa-check-circle' style='font-size:24px; color:green'></i>
              <?php  } ?>

               </a> </div> 

                 </th>
                 
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
      <?php if($commentaire==true) { ?>
      <center><div style="width: 16cm; border:black solid 1px"></div> <br> <br></center>
      <center> <h3 style="color:  #0082e6">Les ticket traiter par les consultants</h3></center>

      <table class="T1" style="margin-left:18px" >
            <tr class="TR1">
               <th>Identifiant ticket</th>
               <th>Feedback</th>
               <th>Utilisateur</th>
               <th>Consultant</th>
            </tr>
            
         <?php foreach ($result3 as $row3){ ?>
            <tr>
                
               <th class="th1">#<?php echo $row3['id'] ?></th>
               <th class="th1"><?php echo $row3['commentaire'] ?></th>
               <th class="th1"><?php echo $row3['utilisateur'] ?></th>
               <th class="th1"><?php echo $row3['consultant'] ?></th>

         <?php } ?>
          </table> 
          <?php }?>
           <br> 
      


   </div> 
   </div> 
   <!-- yes -->

   
  <a href="logoutadmin.php"><input style="margin-left:27cm;"
     type="button" value="Déconnecter" name="submit" class="btn1"></a>
    
</body>
</html>