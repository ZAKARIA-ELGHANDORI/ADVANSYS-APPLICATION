let M1 = document.querySelector(".M1");
let M2 = document.querySelector(".M2");
let M3 = document.querySelector(".M3");
let M4 = document.querySelector(".M4");
let S1 = document.querySelector(".S1");
let S2 = document.querySelector(".S2");
let S3 = document.querySelector(".S3");
let S4 = document.querySelector(".S4");
let imgdiv1 = document.querySelector(".div1");

let isShow=false;

 function hideshowmetier1() { 
    if(isShow==false) { 
    M1.style.display="block";
    S1.innerHTML="<i class='fas fa-search-minus' style='font-size:20px'></i>" 
    isShow=true;
    } else { 
        M1.style.display="none";
        isShow=false; 
        S1.innerHTML="<i class='fas fa-search-plus' style='font-size:20px'></i>" 
    }
 }
 function hideshowmetier2() { 
    if(isShow==false) { 
    M2.style.display="block";
    S2.innerHTML="<i class='fas fa-search-minus' style='font-size:20px'></i>" 
    isShow=true;
    } else { 
        M2.style.display="none";
        isShow=false; 
        S2.innerHTML="<i class='fas fa-search-plus' style='font-size:20px'></i>"  
    }
 }

 function hideshowmetier3() { 
    if(isShow==false) { 
    M3.style.display="block";
    S3.innerHTML="<i class='fas fa-search-minus' style='font-size:20px'></i>" 
    isShow=true;
    } else { 
        M3.style.display="none";
        isShow=false;  
        S3.innerHTML="<i class='fas fa-search-plus' style='font-size:20px'></i>" 
    }
 }

 function hideshowmetier4() { 
    if(isShow==false) { 
    M4.style.display="block";
    S4.innerHTML="<i class='fas fa-search-minus' style='font-size:20px'></i>" 
    isShow=true;
    } else { 
        M4.style.display="none";
        isShow=false;  
        S4.innerHTML="<i class='fas fa-search-plus' style='font-size:20px'></i>" 
    }
 }

 

