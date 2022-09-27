<?php
  include('Connection.php');
  $id=$_GET['sol'];

  $sql = "SELECT * FROM `solutions` where id=$id ";
  //Recherche des données
  $sth = $cnx->query($sql); 
  // On voudrait les résultats sous la forme d’un tableau associatif
  $result = $sth->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php foreach ($result as $row){ ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="solutionD.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title><?php echo $row['titre'] ?></title>
    <?php } ?>
</head>
<body>
<div>
             <nav> 
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                  <i class="fas fa-bars"></i>
                </label>
                <label class='logo'><img src="IMG/logo.png" alt="" 
                    style="width: 6cm; height: 1.8cm; padding-top:6px ;"> </label>
             <ul>
                <li><a href="Accueil.html" >Accueil</a></li>
                <li><a href="presentation.html">Présentation</a></li>
                <li><a href="solutions.html" class="active">Nos solutions</a></li>
                <li><a href="inscription.html">Espace client</a></li>
             </ul>
           </nav> <br><br> <br> 
        </div>
        <?php foreach ($result as $row){ ?>
       <div  class="div1">
           <div class="div2">
           <h2 style="font-size: 50px; color:#0082e6;" id="titre"><?php echo $row['titre'] ?></h2> <br>
           <p id="titreD" style="line-height: 24px; color:rgb(87, 85, 85); font-size: 18px;">
           <?php echo $row['titreD'] ?> <br> <br>
            </p>
            <a href="solutions.html"><button value=""><b>Découvrir les solutions</b></button></a>

           </div>
           <div class="div3" id="imageTitre">
             <img src="./IMGS/<?php echo $row['imagetitre']?>" alt="" class="img1"
              style="width:14cm ; height:13cm">
           </div>
       </div>
        <div style="height:3cm ;"></div>
       <div class="div4" id="titretexte">
         <center><h2 style="font-size: 44px; color:#0082e6; margin:1.9cm" > <?php echo $row['titretexte'] ?>
         </h2> <br></center>
       </div> <br> <br>

       <div class="div5" id="texte">
       <p style="line-height: 24px; color:rgb(87, 85, 85); font-size: 18px;">
       <?php echo $row['texte'] ?> <br> <br>
            </p>
       </div>

       <div class="div6" id="imagetexte">
       <center style="margin-left:50% ">
       <img src="./IMGS/<?php echo $row['imagetexte'] ?>" alt="" class="img1" style="width:15.4cm ; height:14cm">
       </center>  
       </div> <br> <br> <br>

        <div class="div5">
        <p id="titreD" style="line-height: 24px; color:rgb(87, 85, 85); font-size: 18px;">
           <?php echo $row['information'] ?> <br> <br>
            </p>
            
        </div> <br> <br> <br>
        <?php } ?>


       <div class="containerC">
 
 <div class="div11">
     
  </div>
  <div class="div13">
    <center><h1 style="margin-left: 2cm; color: #0082e6;font-size: 40px;">Décrivez-vous votre besoin</h1></center> 
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
  </div>
  
</div>
  
<div style="height:2cm ;"></div>
 
 <center>
   <div class="div12">
       <form action="presentation.php" method="POST" id="myform">
           <!-- Nom & Prénom <br><span style="color: red;">*</span>
           <input type="text"> -->
            <table class="table1">
               <tr>
                   <th>Nom & Prénom <span style="color: red;">*</span> <br>
                       <input type="text" class="inputC" id="nom" name="nom"></th>
                   <th>Société <span style="color: red;">*</span> <br>
                       <input type="text" class="inputC" id="societe" name="societe"></th> <br>
               </tr>
               <tr>
                   <th>Téléphone<span style="color: red;">*</span> <br>
                       <input type="tel" class="inputC" id="tel" name="tel"></th>
                   <th>Adresse E-mail <span style="color: red;">*</span> <br>
                       <input type="email" class="inputC" id="email" name="email"></th> <br>
               </tr>
               <tr>
                   <th>Secteur d'activité <span style="color: red;">*</span> <br>
                       <select class="inputC" id="activite" name="activite">
                           <option  style="color: #a7a6a6 ;"><b> Votre secteur d'activité</b></option>
                           <option value="Textile habilement">Textile habilement</option>
                           <option value="Distribution / Retail">Distribution / Retail</option>
                           <option value="Manifacturing">Manifacturing</option>
                           <option value="Services">Services</option>
                           <option value="Agri/ agro-alimentaire">Agri/ agro-alimentaire</option>
                           <option value="Autres">Autres</option>
                       </select>
                   <th>Votre besoin <span style="color: red;">*</span> <br>
                       <select class="inputC" id="besoin" name="besoin">
                           <option style="color: #a7a6a6 ;"><b> Votre besoin</b></option>
                           <option value="Gestion de production">Gestion de production</option>
                           <option value="Retail">Retail</option>
                           <option value="Comptabilité & finance">Comptabilite & finance</option>
                           <option value="Paie / RH">Paie / RH</option>
                           <option value="GMAO">GMAO</option>
                           <option value="CRM">CRM</option>
                           <option value="Dématérialisation">Dématérialisation</option>
                           <option value="ERP">ERP</option>
                           <option value="BI(Business Intelligence)">BI(Business Intelligence)</option>
                       </select>
               </tr>
               <tr>
                   <th>Message <span style="color: red;">*</span> <br>
                       <input type="text" class="inputM" id="message" name="message"></th>
                   
               </tr> <br>
               <tr>
                   <th><input type="submit" value="ENVOYER" class="btn" name="submit">
               </tr>
           </table>
          

       </form>
       <script src="presentation.js"></script>
       
       
   </center>
     </div> 
     
     <div style="height:4cm;">  </div>














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
</body>
</html>