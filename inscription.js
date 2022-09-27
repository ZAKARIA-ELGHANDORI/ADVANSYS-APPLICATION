var nom=document.getElementById("nom");
var email=document.getElementById("email");
var societe=document.getElementById("societe");
var fonction=document.getElementById("fonction");
var telephone=document.getElementById("telephone");
var password=document.getElementById("password");
var passwordC=document.getElementById("passwordC");
var myform=document.getElementById("myform");

myform.addEventListener('submit',  function(e) { 
    // e.preventDefault();
    if(nom.value.length<=1) {  
        nom.placeholder="ce champ est obligatoire";
        nom.style="color: red; border: solid red 2.2px;";
    } else { 
        nom.placeholder="";
        nom.style="color: black; border: solid green 2.3px;";

    }

    if(email.value.length<=1) { 
        email.placeholder="ce champ est obligatoire";
        email.style="color: red; border: solid red 2.2px;";
    } else { 
        email.placeholder="";
        email.style="color: black; border: solid green 2.3px;";

    }

    
    if(societe.value.length==0) { 
        societe.placeholder="ce champ est obligatoire";
        societe.style="color: red; border: solid red 2.2px;";
    } else { 
        societe.placeholder="";
        societe.style="color: black; border: solid green 2.3px;";

    }

    
    if(fonction.value.length==0) { 
        fonction.placeholder="ce champ est obligatoire";
        fonction.style="color: red; border: solid red 2.2px;";
    } else { 
        fonction.placeholder="";
        fonction.style="color: black; border: solid green 2.3px;";

    }
    
    if(telephone.value.length==0) { 
        telephone.placeholder="ce champ est obligatoire";
        telephone.style="color: red; border: solid red 2.2px;";
    } else { 
        telephone.placeholder="";
        telephone.style="color: black; border: solid green 2.3px;";

    }

    
    if(password.value.length==0) { 
        password.placeholder="ce champ est obligatoire";
        password.style="color: red; border: solid red 2.2px;";
        passwordC.style="color: red; border: solid red 2.2px;";
    } else { 
        password.placeholder="";
        password.style="color: black; border: solid green 2.3px;";
        

    }
    
    if((password.value)!= (passwordC.value) || passwordC.value.length==0) { 
        passwordC.placeholder="les deux champs no sont pas identiques";
        passwordC.style="color: red; border: solid red 2.2px;";
        passwordC.value="";
    } else { 
        passwordC.placeholder="";
        passwordC.style="color: black; border: solid green 2.3px;";

    }
    if( nom.value.length>1 && societe.value.length!=0 &&  telephone.value.length!=0 &&
        email.value.length>1 && fonction.value.length>1 && password.value.length>1
         && password.value==passwordC.value ) { 
              window.alert("Les donnée que vous avez saisie sont bien enregistrer");
            //   e.preventDefault();
        } else { 
            window.alert("remplir tous les champs s'il vous plait");
            e.preventDefault();
        }
})
 function clicknom(){ 
    nom.placeholder="Nom d'utilisateur";
 }

 function clickemail(){ 
    email.placeholder="Adresse email";
 }

 function clicksociete(){ 
    societe.placeholder="Société";
 }

 function clickfonction(){ 
    fonction.placeholder="Fonction";
 }

 function clicktelephone(){ 
    telephone.placeholder="Téléphone";
 }

 function clickpassword(){ 
    password.placeholder="Mot de passe";
 }

 function clickconfirmer(){ 
    passwordC.placeholder="Confirmer le mot de passe";
 }