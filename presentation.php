<?php
 $nom=$_POST['nom'];
 $societe=$_POST['societe'];
 $tel=$_POST['tel'];
 $email1=$_POST['email'];
 $activite=$_POST['activite'];
 $besoin=$_POST['besoin'];
 $message=$_POST['message'];
 $email="contact.advansys@gmail.com";
 $name="ADVANSYS GROUP";
 $subject="FORMULAIRE de contact ADVANSYS GROUP";
 
 $body="
<strong> CLIENT : </strong> $nom <br>
<strong> SOCIETE : </strong>  $societe <br>
<strong> TELEPHONE : </strong>  $tel <br>
<strong> EMAIL : </strong>  $email1 <br>
<strong> SECTEUR D'ACTIVITE : </strong>  $activite <br>
<strong> BESOIN : </strong>  $besoin <br>
<strong> MESSAGE : </strong>  $message <br>";
 if(isset($_POST['submit']) AND !empty($_POST['nom']) AND !empty($_POST['societe']) AND !empty($_POST['tel']) AND
  !empty($_POST['email']) AND !empty($_POST['activite']) AND !empty($_POST['besoin']))
  { 

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
          "email" => $email,
          "name" => "ADVANSYS"
       ),
       "subject" => $subject , 
       "content" => array(
          array(
              "type" => "text/html",
              "value" => $body
          )
       )
     );
       $ch= curl_init();
       curl_setopt($ch , CURLOPT_URL, "https://api.sendgrid.com/v3/mail/send");
       curl_setopt($ch,CURLOPT_POST ,1);
       curl_setopt($ch,CURLOPT_POSTFIELDS ,json_encode($data));
       curl_setopt($ch,CURLOPT_HTTPHEADER ,$headers);
       curl_setopt($ch,CURLOPT_FOLLOWLOCATION ,1);
       curl_setopt($ch,CURLOPT_RETURNTRANSFER ,1);
       $response= curl_exec($ch);
       curl_close($ch);
       header('location: presentation.html');
  }


?>