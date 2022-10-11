
<?php
session_start();
include('Connection.php');
$utilisateur=$_SESSION['utilisateur'];
$search=false ;
$commentaire=true;
$etat=false;
$tic=false;
if(!$utilisateur){ 
   header('location:login.php');
}
$sql = "SELECT * FROM `billet` where utilisateur='$utilisateur'";
//Recherche des données
$sth = $cnx->query($sql);
// On voudrait les résultats sous la forme d’un tableau associatif
$result = $sth->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit']) AND !empty($_POST['search']) ) {
   $search=$_POST['search'];
   $sql = "SELECT * FROM `billet` WHERE sujet Like '%$search%' 
   AND utilisateur='$utilisateur'";
   $sth3 = $cnx->query($sql);
   $resultsearch = $sth3->fetchAll();
 
 }

 $sql1 = "SELECT COUNT(*) as nbrB FROM `billet` where utilisateur='$utilisateur'";
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

    $sql3 = "SELECT * FROM `commentaires` WHERE `utilisateur`='$utilisateur' ";
//Recherche des données
$sth3 = $cnx->query($sql3);
// On voudrait les résultats sous la forme d’un tableau associatif
$result3 = $sth3->fetchAll(PDO::FETCH_ASSOC);


$sql4 = "SELECT COUNT(*) as nbrC FROM `commentaires` WHERE `utilisateur`='$utilisateur' ";
//Recherche des données
$sth4 = $cnx->query($sql4);
$countC = $sth4->fetchAll();

foreach ($countC as $row4){
   if($row4['nbrC']==0){ 
    $commentaire=false;
   }
    //  else $search=true;
  
  }
  
  $sql5 = "SELECT `etat` ,`id` FROM `billetadmin` WHERE `utilisateur`='$utilisateur' ";
//Recherche des données
$sth5 = $cnx->query($sql5);
$countE = $sth5->fetchAll();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="ticket.css">
    <title>Support - Advansys Group</title>
    <style>
        .btn1{
           width:5cm;
           height: 1.3cm;
           font-size: 20px;
           margin: 10px;
           background-color: none;
           color: #3498db;
           transition: 0.8s;
             }
             .btn1:hover{ 
             color: rgb(74, 72, 72);
             background-color: #7cc0f3;
             border: 1px;
    
             }
             .div0{ 
                 margin-left: 4cm;
                 
                  }
               #I1:hover{
                  color: rgb(74, 72, 72);
                  background-color: #7cc0f3;
                  border: 1px;
               }
 .div1{ 
    height: auto;
    width: 28cm;
    border: solid 2px black;
    margin-left: 4.2cm;
    align-content: center;
}
.div4{ 
   height: auto;
   margin: 20px;
   box-shadow: 1px 3px 4px 3px rgb(179, 179, 179);
   border-radius: 8px;
}
.T1{
   border: px solid black;
   padding: 7px;
   width: 26.87cm;
   margin-top: 7px;
   border-top-left-radius:8px ;
   border-top-right-radius:8px ;
}
.T2{
   border: px solid black;
   padding: 7px;
   width: 24cm;
   margin-top: 7px;
   border-top-left-radius:8px ;
   border-top-right-radius:8px ;

}
.TR1{
 background-color: #3498db;   
 margin: 8px;
}
th{ 
   width: 8.66cm;
   height: 1cm;
   box-shadow: 1px 3px 4px 1px rgb(179, 179, 179) ;
}
th:hover{ 
   background-color: #7cc0f3
}
.th1{ 
   background-color: rgb(220, 221, 222);
}

.div2{ 
   width: 27.9cm;
   height: 1.3cm;
   background-color: #3498db;
   color: white;
   padding: 10px;
   margin:0;
}
.div3{ 
   margin: 2cm;
}
.search{ 
   width: 16cm;
   height: 1.2cm;
   font-size: 24px;
   margin: 7px;
   border: none;
   padding: 7px;
}
.search:hover{ 
   background-color: #cae8ff;
}
.div6{ 
   height: 17cm;
   margin: 10px;
   
}
#in1{
   width: 27cm;
   height: 0.9cm;
   font-size: 20px;
   margin: 7px;
   padding: 7px; 

}
#in1:hover{ 
   background-color: #cae8ff;
   border: 1px solid black;
}
#in2{
   width: 27cm;
   height: 7cm;
   font-size: 20px;
   margin: 7px;
   padding: 7px; 
   font-size: 16px;

}
#in2:hover{ 
   background-color: #cae8ff;
   border: 1px solid black;
}
#in3{
   width: 20cm;
   height: 1cm;
   font-size: 20px;
   margin: 7px;
   padding: 7px; 
   font-size: 16px;

}
#in3:hover{ 
   background-color: #cae8ff;
   border: 1px solid black;
}
.container {
    padding-right: 20px;
    padding-left: 20px;
    margin-right: 2cm;
    margin-left: 2cm;
  }
  @media (min-width: 768px) {
    .container {
      width: 750px;
    }
  }
  @media (min-width: 992px) {
    .container {
      width: 970px;
    }
  }
  @media (min-width: 1200px) {
    .container {
      width: 1170px;
    }
  }

    </style>
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
        <li><a href="ESPACE.php" target="_blank" class="active">Espace client</a> <br>
          </li> <br> 
     </ul>

   </nav> <br><br> <br> <br>
  
        <div class="div0">
        <!-- <form action="ticket.php" method="post"> -->
         <button class="btn1" id="listeB" onclick="clicklisteB()"><i id="I1" class='fas fa-tasks' style='font-size:24pxpx;color:#3498db'></i> Liste des billets</button>
         <button class="btn1" id="nouvB" onclick="clicknouvB()"><i class='fas fa-edit' style='font-size:23px;color:#3498db'></i> Nouveau billet</button>
          <!-- </form>  -->

      </div>
    

   <div class="div1">
        <div class="div2"> <h3><i class='far fa-caret-square-down' style='font-size:24px'></i>
         Espace billet <span style="float : right"><?php echo $utilisateur ?>
        <i class='fas fa-user-alt' style='font-size:24px'></i></span></h3>
        
        </div> 
        <!-- <div id="profile" style="display:none;">
         <input type="text" name="profile" class="search" value=" <?php echo $utilisateur ?>">
           
         </div> -->
         <div id="yes">
        <div class="div6" style="display:none ;" id="div6">
         <form action="ticketinsertion.php" method="post">
            Sujet <span style="color: red;">*</span> <br>
            <input type="text" name="sujet" id="in1"> <br> <br>
            Description <span style="color: red;">*</span> <br>
            <input type="text" name="description" id="in2"> <br> <br>
            Catégorie <span style="color: red;">*</span> <br>
            <select name="categorie" id="in3">
               <option value="Fonctionnel">Fonctionnel</option>
               <option value="Technique">Technique</option>
               <option value="Autre">Autre</option>
            </select> <br> <br>
            <input type="submit" name="soumettre" value="soumettre" class="btn1">
         </form> 

        </div>

         

   
       
        <div class="div5" style="display: block;" id="divCont">
        <div class="div3">
         <form action="ticket.php" method="post">
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
               <th>Etat</th>
            </tr>
           
            
         <?php foreach ($resultsearch as $row1){ ?>
            <tr>
               <th class="th1">#<?php echo $row1['id'] ?></th>
               <th class="th1"><?php echo $row1['sujet'] ?></th>
               <th class="th1"><?php echo $row1['categorie'] ?></th>


               <?php if($row1['etat']=='En attente') {  ?>
               <th class="th1" id="th1" style="background-color:red" >
               <?php  } ?>
               <?php if($row1['etat']=='Fermé') {  ?>
               <th class="th1" id="th1" style="background-color:green" >
               <?php  } ?>
                  
               
               
               <?php echo $row1['etat'] ?>
               <input id="ipetat" type="text" value="<?php echo $row1['etat'] ?>" style="display:none">
                 
               </th>
            </tr>
         
          <?php } ?>
          </table>
         <?php } ;?>
         </div>
         
        </div>

        <span style="color: red; padding-left:1cm ;">Liste de votre billets *</span> 
        <div class="div4">
          <table class="T1">
            <tr class="TR1">
               <th>Identifiant</th>
               <th>Sujet</th>
               <th>Catégorie</th>
               <th>Etat</th>
            </tr>
            
         <?php foreach ($result as $row){ ?>
            <tr>
               <th class="th1">#<?php echo $row['id'] ?></th>
               <th class="th1"><?php echo $row['sujet'] ?></th>
               <th class="th1"><?php echo $row['categorie'] ?></th>

               <?php if($row['etat']=='En attente') {  ?>
               <th class="th1" id="th1" style="background-color:red" >
               <?php  } ?>
               <?php if($row['etat']=='Fermé') {  ?>
               <th class="th1" id="th1" style="background-color:green" >
               <?php  } ?>

               
               <?php echo $row['etat'] ?>
                  <input id="ipetat" type="text" value="<?php echo $row['etat'] ?>"
                   style="display:none">
                 </th>
            </tr>

         <?php } ?>
          </table>

        </div>
          <center> <h3 style="color:red;">Nombre de billet 
           <?php foreach ($count as $row2){
           echo $row2['nbrB'];
               }?>
           </h3></center> <br>
      </div>

      <!-- <?php if($tic==false){ ?>
      <center><h3 style="color:#0082e6">Les traitements faites par nos consultants seront affichés au-dessous </h3></center>
      <?php } ?> -->
      <?php foreach ($result3 as $row3){  ?>
      <?php foreach ($countE as $row5){ ?>
         <?php if($row5['etat']=='Fermé' AND $row5['id']==$row3['id'])  {?>
      <?php if($commentaire==true) { ?>
      <center><div style="width: 16cm; border:black solid 1px"></div> <br> <br></center>
      <center> <h3 style="color:  #0082e6">Traitement de ticket <span style="color: red">
      <?php echo "#".$row3['id'] ?>
      </span></h3></center>

      <table class="T1" style="margin-left:18px" >
            <tr class="TR1">
               <!-- <th>Identifiant ticket</th> -->
               <th>Feedback</th>
              
            </tr>
            
         
            <tr>
                
               <!-- <th class="th1">#<?php echo $row3['id'] ?></th> -->
               <th class="th1"><?php echo $row3['commentaire'] ?></th>
          

         <?php }
        
          ?>
          </table> 
          <?php }  
         ?>
           <?php } ?>
           <?php } ?>
           <br> 

   </div> 
   </div> 
   <!-- yes -->

   
  <a href="logoututil.php"><input style="margin-left:27cm;"
     type="button" value="Déconnecter" name="submit" class="btn1"></a>

     <!-- <button class="btn1" id="monP" onclick="clicknouv()" >
          <i class='fas fa-edit' style='font-size:23px;color:#3498db'></i> Mon profile</button> 

         <script src="ticket1.js"></script> -->

   <script src="ticket.js"></script>

  
     






   <div style="height:6cm ;"></div>

   <footer>
      <div class="row">
         <div class="col">
            <img src="IMG/logo.png" class="logo">
            <p style="line-height: 28px;">Nous vous proposons des solutions de <br> gestion utiles et innovantes 
               pour vous <br> aider à réaliser vos projets.</p> <br>
            <p>  <i class='fas fa-map-marker-alt' style='font-size:24px'></i>
               1, rue Arago, Quartier des hôpitaux <br>
                Mers Sultan 20100 Casablanca.</p> <br>
               <p> <i class='fas fa-paper-plane' style='font-size:24px'></i>
                  contacts@advansys.ma</p> <br>
               <p> <i class='fas fa-phone-square-alt' style='font-size:24px'></i>
                  0522 863 000</p> 
         </div>
         <div class="col">
            <h2>LIENS UTILES</h2>
            <br> 
            <p><a href="Accueil.html" class="a1">Accueil</a></p> <br> 
            <p><a href="presentation.html" class="a1">Présentation</a></p> <br>
            <p><a href="solutions.html" class="a1">Nos solutions</a></p> <br>
            <p><a href="#" class="a1">Espace clients</a></p> <br> <br> <br> <br>
         </div> 
         <div class="col">
            <h2>NEWSLETTER</h2>
              <br>
             <form action="">
                <input type="email" style="height: 33px; width:4.5cm ; padding: 3px; border-radius: 5px;" placeholder=" Email">
                <br> <br>
                <button style="height: 33px; width:4.5cm ; padding: 3px; border-radius: 5px;
                 background-color:#36367e ; color: white;">ENVOYER</button>
             </form>
             <br> <br> <br> <br> <br> <br> <br> 
         </div>
         <div class="col">
            <h2>NOUS-JOINDRE</h2> <br>
            <a href="https://www.linkedin.com/company/advansysgroupmaroc" class="a1"> 
               <i class='fab fa-linkedin' style='font-size:36px'> linkedin</i> 
                <br></a> <br>
            <a href="https://www.facebook.com/profile.php?id=100070862046393" class="a1"> 
               <i class='fab fa-facebook' style='font-size:36px'> facebook</i>
                <br></a> <br>
            <a href="https://www.instagram.com/advansys.group/" class="a1"> 
               <i class='fab fa-instagram' style='font-size:36px'> instagram</i>
                <br></a> <br>
            <a href="https://www.youtube.com/channel/UChTutGAMNAFxSj63mmx8WMA" class="a1"> 
               <i class='fab fa-youtube' style='font-size:36px'> youtube</i>
                 <br></a> <br>
            
         </div>
      </div>
   </footer>

   <script>

   

</script> 
    
</body>
</html>