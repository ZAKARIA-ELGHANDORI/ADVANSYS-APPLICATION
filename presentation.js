var nom=document.getElementById("nom");
var societe=document.getElementById("societe");
var tel=document.getElementById("tel");
var email=document.getElementById("email");
var activite=document.getElementById("activite");
var besoin=document.getElementById("besoin");
var message=document.getElementById("message");
var myform=document.getElementById("myform");

myform.addEventListener('submit' , function(e) { 
    // e.preventDefault();
    if(nom.value.length<=1) { 
        nom.placeholder="ce champ est obligatoire";
        nom.style="color: red; border: solid red 2.2px;";
    } else { 
        nom.placeholder="";
        nom.style="color: black; border: solid green 2.3px;";

    }

    if(societe.value.length==0) { 
        societe.placeholder="ce champ est obligatoire";
        societe.style="color: red; border: solid red 2.2px;";
    } else { 
        societe.placeholder="";
        societe.style="color: black; border: solid green 2.3px;";

    }

    if(tel.value.length==0) { 
        tel.placeholder="ce champ est obligatoire";
        tel.style="color: red; border: solid red 2.2px;";
    } else { 
        tel.placeholder="";
        tel.style="color: black; border: solid green 2.3px;";

    }

    if(email.value.length<=1) { 
        email.placeholder="ce champ est obligatoire";
        email.style="color: red; border: solid red 2.2px;";
    } else { 
        email.placeholder="";
        email.style="color: black; border: solid green 2.3px;";

    }


    if(message.value.length<=1) { 
        message.placeholder="ce champ est obligatoire";
        message.style="color: red; border: solid red 2.2px;";
    } else { 
        message.placeholder="";
        message.style="color: black; border: solid green 2.3px;";

    }

    if(activite.options[activite.selectedIndex].innerHTML==" Votre secteur d'activité") 
    { 
        activite.style="color: red; border: solid red 2.2px;";
    } else { 
        activite.style="color: black; border: solid green 2.3px;";
         }
     if(besoin.options[besoin.selectedIndex].innerHTML==" Votre besoin") 
    { 
        besoin.style="color: red; border: solid red 2.2px;";
    } else { 
        besoin.style="color: black; border: solid green 2.3px;";
         }
    if( nom.value.length>1 && societe.value.length!=0 &&  tel.value.length!=0 &&
        email.value.length>1 && message.value.length>1   
        && activite.options[activite.selectedIndex].innerHTML!=" Votre secteur d'activité"
        && besoin.options[besoin.selectedIndex].innerHTML!=" Votre besoin") { 
              window.alert("Les donnée que vous avez saisie sont bien enregistrer");
            //   e.preventDefault();
        } else { 
            window.alert("remplir tous les champs s'il vous plait");
            e.preventDefault();
        }
    
})



