<?php 
// session_start();
// if($_SESSION['utilisateur']){ 
//   header('location:ticket.php');
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <style>
.div1{
  display: inline-block;
  width: 15cm;
  height: 10cm;
  margin-left: 2cm;
  margin-top: 4cm;
  padding-top: 3.6cm;
  font-size: 35px;
  
}
.div2{ 
  display: inline-block;
  border: 1px rgb(98, 101, 197) ;
  border-radius: 10px;
  width: 14cm;
  height: 9cm;
  float:right;
  margin-right: 2cm;
  margin-top: 3.2cm;
  box-shadow: 2px 2px 3px 2px rgb(204, 202, 202);
}
.input { 
  margin-top: 20px;
  width: 10cm;
  height: 1.2cm;
  padding: 8px;
  border-color: 1px rgb(164, 164, 164);
  margin-left: 1.3cm;
}
.input:hover{ 
  background-color: #dae8f3 ;
  border: 1px;
}
#IN1{
    margin-left: 1.3cm;
}
.btn{ 
  width: 4.3cm;
  margin-right: 0.5cm;
  font-size: 20px;
  cursor: pointer;
  margin: 10px;
  background-color: none;
  color: #3498db;
  transition: 0.8s;
  position: relative;
  overflow: hidden;
  margin-left: 1.3cm;
  height:1.3cm
}
.btn:hover{ 
  color: rgb(74, 72, 72);
  background-color: #a5c5de;
  border: 1.4px;
  
}
#S1{ 
   font-size: 55px;
   color: #3498db;
}
#S2{ 
   font-size: 20px;
   color: #222a7b;
}
#S3{ 
   font-size: 20px;
   color: #ff7f29;
}
    </style>
</head>
<body>
  
  <div class="div1">
      <span id="S1">Se connecter</span> <br> 
      <span id="S2"> Faciliter vos démarches et simplifier nos échanges !</span> <br>
      <span id="S3"> Besoin d’assistance technique ? des questions ? (Compte, factures, commandes,)
        faites votre demande ici :</span>
    </div>

    <div class="div2">
        <form action="loginverification.php" method="post">
            <input class="input" onclick="clicknom()" type="text" placeholder="Nom d'utilisateur" name="nom" id="nom" > <br>
            <input class="input" onclick="clickpassword()" type="password" placeholder="Mot de passe" name="Password" id="password" > <br> <br>
             <input type="checkbox" id="IN1"> <span style="color: #656566;">Se souvenir de moi</span> <br> <br>
             <span><input type="submit" value="Se connecter" name="submit" class="btn" id="submit">
                <a href="inscription.html"><input type="button" value="S'inscrire" class="btn"></a></span>
           </form>

    </div>
    
</body>
</html>