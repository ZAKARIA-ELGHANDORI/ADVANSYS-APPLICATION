<!-- <?php
  session_start();
  if($_SESSION['admin']){
   header('location: pageadmin.php');
  } 

?> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <style>

*{ 
    padding: 0px;
    margin:0px;
    text-decoration: none;
    list-style:none;
    box-sizing:border-box; 
}
.liensol:hover{ 
    padding: 6px;
    background: none;
    margin-left: 5px;
    transition: padding 0.2s;
    color: #0082e6;
}
/* body{ 
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: bold;
} */
nav{
    background: #0082e6;
    height: 80px; 
    width: 100%;
   position: fixed;
}
label.logo{ 
    color: white;
    font-size: 35px; 
    line-height:80px;
    padding: 0 100px;
}
nav ul{
    float : right; 
    margin-right: 20px;
}
nav ul li{ 
    display: inline-block;
    line-height: 80px;
    margin: 0 5px;
}
nav ul li a{ 
    color: white; 
    font-size: 17px;
    padding: 7px 13px;
    border-radius: 3px;
    text-transform: uppercase;
}
a.active,a:hover{ 
    background: #1b9bff;
    transition: .5s;
}
.checkbtn{ 
    font-size: 30px;
    color: white;
    float: right;
    line-height: 80px;
    margin-right: 40px;
    cursor: pointer;
    display: none;
}
#check{ 
    display: none;
}
@media (max-width: 952px) { 
    label.logo{ 
        font-size: 30px;
        padding-left: 50px;
    }
  nav ul li a{ 
    font-size: 16px;
  }
}
@media (max-width: 858px){ 
    .checkbtn{
        display: block;

    }
    ul{ 
        position:fixed;
        height: 100%;
        width: 100%;
        background: #2c3e50;
        top: 80px;
        left: -100%;
        text-align: center;
        transition:all .5s;
    }
  nav ul li{
    display: block;
    margin : 50px 0; 
    line-height: 30px;
    text-decoration: none;
  }
  nav ul li a{ 
    font-size: 20px;
  }
  a:hover, a.active{ 
    background: none;
    color: #0082e6;
  }
  #check:checked ~ ul{ 
    left: 0;
  }
}

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
           <li><a href="solutions.html">Nos solutions</a></li>
           <li><a href="ESPACE.php" class="settingA">Espace client</a> <br>
             </li> <br> 
        </ul>
   
      </nav> <br><br> <br> 
   </div>

    <div class="div1">
      <span id="S1">ADMINISTRATEUR</span> <br>
      <!-- <span id="S3"> Vous-étes administrateur ?</span>  -->
      <span id="S2"> Faciliter vos managements et simplifier l'échanges !</span> <br>
      
    </div>

    <div class="div2">
        <form action="adminverification.php" method="post">
            <input class="input" onclick="clicknom()" type="text" placeholder="Nom d'utilisateur" name="nom" id="nom" > <br>
            <input class="input" onclick="clickpassword()" type="password" placeholder="Mot de passe" name="Password" id="password" > <br> <br>
             <input type="checkbox" id="IN1"> <span style="color: #656566;">Se souvenir de moi</span> <br> <br>
             <span><input type="submit" value="Se connecter" name="submit" class="btn" id="submit">
                <a href="inscription.html"><input type="button" value="S'inscrire" class="btn"></a></span>
           </form>

    </div>
    
</body>
</html>