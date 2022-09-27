<?php
session_start();
include('Connection.php');
 $utilisateur=$_SESSION['utilisateur'];
 $sujet=$_POST['sujet']  ;
 $description=$_POST['description'];
 $categorie=$_POST['categorie'];
 $email="contact.advansys@gmail.com";
 $name="ADVANSYS GROUP";
 $body="<center> <h1 style='color:#3498db'>Un nouveau ticket a été crée, de $utilisateur ! </h1></center> <br>
 Ci-dessous les détails du ticket : <br>
 <h2><strong>Sujet :</strong></h2> <h3 style='color:red'>$sujet</h3> <br>
 <h2><strong>Description :</strong></h2> <h3 style='color:red'>$description</h3>  <br>
 <h2><strong>Categorie :</strong></h2> <h3 style='color:red'>$categorie </h3> ";
 $subject="TICKET $utilisateur ";
  
   $headers= array(
    'Authorization: Bearer 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',
    'Content-Type: application/json'
   );

   $data= array(
     "personalizations" => array(
        array(
            "to" => array(
                array(
                    "email" => $email, 
                    "name" => "Contact Advansys"
                )
            )
        )
     ) ,
     "from" => array(
        "email" => $email
     ),
     "subject" => $subject , 
     "content" => array(
        array(
            "type" => "text/html",
            "value" => $body
        )
     )
   );



if(isset($_POST['soumettre']) AND isset($_POST['sujet']) AND isset($_POST['categorie'])) { 
    $sql="INSERT INTO `billet` (`sujet`, `categorie`, `utilisateur`,`etat`)
     VALUES ('$_POST[sujet]','$_POST[categorie]','$_SESSION[utilisateur]',
     'En attente')";
     $sth=$cnx->query($sql);
     $ch= curl_init();
     curl_setopt($ch , CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
     curl_setopt($ch,CURLOPT_POST ,1);
     curl_setopt($ch,CURLOPT_POSTFIELDS ,json_encode($data));
     curl_setopt($ch,CURLOPT_HTTPHEADER ,$headers);
     curl_setopt($ch,CURLOPT_FOLLOWLOCATION ,1);
     curl_setopt($ch,CURLOPT_RETURNTRANSFER ,1);
     $response= curl_exec($ch);
     curl_close($ch);

//    echo $response;

     header('location: ticket.php');

}
?>