
   <?php   
  include('Connection.php');
    // initialize variables pour search
    $search=false ;
    if (isset($_POST['search']) AND !empty($_POST['sproduct']) ) {
        $search = true;
        $searchproduct=$_POST['sproduct'];
        $sql = "SELECT * FROM `solutions` WHERE titre Like '%$searchproduct%' ";
        $qr = $cnx->query($sql);
       
        $resultsearch = $qr->fetchAll();
      
      }

  	// initialize variables pour update
    $id = "";
    $titre = "";
	$titreD = "";
	$titretexte = "";
    $texte = "";
    $information = "";
	$update = false;
    // pour update
  if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $sql = "SELECT * FROM `solutions` WHERE id=$id";
    $qr = $cnx->query($sql);
    $result = $qr->fetchAll();
    
    if (count($result) == 1 ) {
        $id = $result[0]['id'];
        $titre = $result[0]['titre'];
        $imagetitre = $result[0]['imagetitre'];
        $titretexte = $result[0]['titretexte'];
        $texte = $result[0]['texte'];
        $imagetexte = $result[0]['imagetexte'];
    }
}
// Pour Delete
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql =  "DELETE FROM `solutions` WHERE id=$id";
    $sth = $cnx->query($sql);
    header('location: Administrateur.php');
}
?>

      
   <?php  
$sql = "SELECT * FROM `solutions` ";
//Recherche des données
$sth = $cnx->query($sql);
// On voudrait les résultats sous la forme d’un tableau associatif
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html >
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
        <link rel="stylesheet" href="Administrateur.css">
    <title>Document</title>
    <style>
        h1 , strong { 
    color : rgb(0, 110, 255);
           }
           body{ 
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font-weight: bold;
}
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

footer{ 
    width: 100%;
    position: relative;
    bottom: 0;
    background-color: #229bf8;
    padding: 75px 0 20px;
    border-top-left-radius: 120px;
    font-size: 15px;
    line-height:20px ;
    color: white;
    display: inline-block;
}

.logo{ 
    width:300px ;
    margin-bottom: 30px;

}
.col{ 
    padding-left: 3cm;
    display: inline-block;
}
.a1{ 
    text-decoration: none;
    font-size: 15px;
    color: white;
}
.a1:hover{ 
    color: #202056;
}
#inpS{ 
    
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
        <li><a href="Accueil.html" class="active">Accueil</a></li>
        <li><a href="presentation.html">Présentation</a></li>
        <li><a href="solutions.html">Nos solutions</a></li>
        <li><a href="#" class="settingA">Espace client</a> <br>
          </li> <br> 
     </ul>

   </nav> <br><br> <br> <br> <br>
</div>
<div>

        <h1><hr><center>Search for a solution</center></h1>


        <form  action="#" method="POST">
            <div class="input-group mb-3">
       <input type="text" id="inpS" class="form-control" placeholder="Search for a solution" name="sproduct" >
         <input type=submit value="search" name="search" id="SR" style="background-color :  rgb(42, 211, 211);border-top-right-radius: 7px;
           border-bottom-right-radius: 7px;">
            </div>
            </form> <p></p>

            <table class="table">
    <tr>
                <th>ID</th>
                <th>titre</th>
                <th>TitreD</th>
                <th>imagetitre</th>
                <th>titreTexte</th>
                <th>Texte</th>
                <th>imageTexte</th>
                <th>information</th>
            </tr>
    </table>

            <?php  if($search==true) : ?>
                    <?php foreach ($resultsearch as $row1){ ?>
                        <table class="table">
                            <tr>
            <td><?php echo $row1['id']; ?></td>
            <td><?php echo $row1['titre']; ?></td>
            <td><?php echo $row1['titreD']; ?></td>
            <td><img src=" <?php echo $row1['imagetitre']; ?>" alt="" style="width :4cm ; height : 3cm"></td>
            <td><?php echo $row1['titretexte']; ?></td>
            <td><?php echo $row1['texte']; ?></td>
            <td><img src=" <?php echo $row1['imagetexte']; ?>" alt="" style="width :4cm ; height : 3cm"></td>
            <td><?php echo $row1['information']; ?></td>
                <td>
                    <a href="Administrateur.php?edit=<?php echo $row1['id']; ?>" class="edit_btn" >Edit</a>
                </td>
                <td>
                    <a href="Administrateur.php?del=<?php echo $row1['id']; ?>" class="del_btn">Delete</a>
                </td>
                     </tr>
                  </table>
                        <?php } ?> 
                           
              <?php endif ; ?>

    <h1>
       <hr> <center> Create new solutions </center><hr>
    </h1>
   <div>
<form  action="insertion.php" method="post">
   <strong>ID solution</strong> <p></p>
   <input class="form-control" type="text" placeholder="ID : 1.."  name="id" value="<?php ; ?>"> <p></p>
   <strong>Titre </strong> <p></p>
  <input class="form-control form-control-lg"  type="texte" name="titre" value="<?php echo $titre  ; ?>">
</div> <p></p>
   <strong>TitreD</strong> <p></p>
   <input name="titreD" class="form-control" type="text" placeholder="your solution name.." value="<?php $titreD  ; ?>"> <p></p>
   <strong>Image titre</strong> <p></p>
   <input class="form-control" type="file" placeholder="" name="imagetitre" value="<?php echo $imagetitre ; ?>"> <p></p>
   <strong>Titre texte</strong> <p></p>
   <input class="form-control" type="text" placeholder="" name="titretexte" value="<?php echo $titretexte ; ?>"> <p></p>
   <strong>Texte</strong> <p></p>
   <input class="form-control" type="text" placeholder="" name="texte" value="<?php echo $texte ; ?>"> <p></p>
   <strong>Image texte</strong> <p></p>
   <input class="form-control" type="file" placeholder="" name="imagetexte" value="<?php echo $imagetexte ; ?>"> <p></p>
   <strong>Information</strong> <p></p>
   <input class="form-control" type="text" placeholder="" name="information" value="<?php echo $information ; ?>"> <p></p>

   <?php if ($update == true): ?>
            <button class="btn btn-primary" type="submit" name="update" style="background: #556B2F;" >update</button>
        <?php else: ?>
            <button class="btn btn-primary" type="submit" name="submit" >Save</button>
        <?php endif ?>
   </form>

   <h1>
       <hr> <center> Liste of Product </center><hr>
    </h1>  
              
        
    <table class="table">
    <tr>
    <th>ID</th>
                <th>titre</th>
                <th>TitreD</th>
                <th>imagetitre</th>
                <th>titreTexte</th>
                <th>Texte</th>
                <th>imageTexte</th>
                <th>information</th>
            </tr>
    </table>
          
        

              
       
    <?php foreach ($result as $row){ ?>
        <table class="table">
		<tr>
			<td><?php echo $row['id']; ?></td>
            <td><?php echo $row['titre']; ?></td>
            <td><?php echo $row['titreD']; ?></td>
            <td><img src=" <?php echo $row['imagetitre']; ?>" alt="" style="width :4cm ; height : 3cm"></td>
            <td><?php echo $row['titretexte']; ?></td>
            <td><?php echo $row['texte']; ?></td>
            <td><img src=" <?php echo $row['imagetexte']; ?>" alt="" style="width :4cm ; height : 3cm"></td>
            <td><?php echo $row['information']; ?></td>
			<td>
				<a href="Administrateur.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="Administrateur.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
        </table>
	<?php } ?> 


   
</div>
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