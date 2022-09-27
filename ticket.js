var listeB=document.getElementById('listeB');
var nouvB=document.getElementById('nouvB');
var monP=document.getElementById('monP');
var profile=document.getElementById('profile');
var divnouv=document.getElementById('div6');
var div1=document.getElementById('div1');
var divliste=document.getElementById('divCont');
var recherche=document.getElementById('recherche');
var yes=document.getElementById('yes');




function clicklisteB() { 
    divliste.style=" display :block";
    divnouv.style=" display :none";  
    profile.style=" display :none";


}
function clicknouv() { 
   if(profile.style="display : none") { 
    profile.style="display : block";
    // yes.style=" display :none";
   } 


}


function clicknouvB() { 
    divliste.style=" display :none";
    divnouv.style="display :block";
    recherche.style="display:none";
    profile.style="display :none";

}



