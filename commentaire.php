<?php 
session_start();
$consultant=$_SESSION['consultant'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="commentaire.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>PAGE CONSULTANT</title>
    <style>
      #liencom:hover{
      color: #ffff;
     
      }
      #liencom{ 
         background-color:none;
         padding:2px;
      }
      #incom{
    width: 27cm;
    height: 7cm;
    font-size: 20px;
    margin: 7px;
    padding: 7px; 
    font-size: 16px;
    box-shadow: 0.2px 0.3px 1px 0.8px #3498db;
    border-radius:5px;
 
 }
 #incom:hover{ 
    background-color: #cae8ff;
    border: 1px solid black;
 }
 textarea::-webkit-scrollbar {
    width:9px;
 }
 textarea::-webkit-scrollbar-track { 
    -webkit-box-shadow:inset 0 0 10px #BDDAE0;
 }
 textarea::-webkit-scrollbar-thumb {
    background-color: #0B8FF9;
 }
 /* .div1 , .div2{
   border-radius: 15px;
 } */

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
      <div style="height: 0.3cm"></div>

      <div class="div1" >
        <div class="div2"> <h3><i class='far fa-caret-square-down' style='font-size:24px'></i>
          Feedback pour : <?php echo $_GET['utilisateur'] ?> <span style="float : right"><?php echo $consultant ?>
            <i class='fas fa-user-alt' style='font-size:25px'></i></span></h3> <br> 
        <h3 style="color:red">vous pouvez écrire votre feedback ici :</h3> 
        </div> 
        <center>
        <form action="commentaireinsertion.php" method="POST">
       <textarea name="commentaire" onkeyup="charCount()"
        placeholder="Commentaire..." id="incom" type="text" rows="4" cols="37"
       style="margin-top:1.2cm; width:18cm"
       value="" ></textarea>  <br> <br>
       <span id="textarea_count" style="color: red">0/500 (Max character 500)
       </span> <br> <br> 
<input type="text" value="<?php echo $_GET['id'] ?>" name="id" style="display: none">
<input type="text" value="<?php echo $_GET['utilisateur'] ?>" name="utilisateur" style="display: none">
<input type="text" value="<?php echo $_GET['consultant'] ?>" name="consultant" style="display: none">
            <!-- <a href="commentaireinsertion.php?id=<?php echo $_GET['id'] ?>&utilisateur=<?php echo $_GET['utilisateur'] ?>"> -->
      <input name="submit" type="submit" value="Fermer le ticket" class="btn1">
            <!-- </a>  -->
            </form>
        
        </center>
      
           <script type="text/javascript">
 function charCount(){ 
    var element=document.getElementById('incom').value.length;
    document.getElementById('textarea_count').innerHTML=element+"/500 (Max character 500).";

 }


           </script>
         </div> 
 


   </div> 
   </div> 