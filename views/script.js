
function verif()                                 
         { 
            var name = document.querySelector("#name2").value;
            var phone = document.querySelector("#phone").value;
                     var adresse = document.querySelector("#email").value;
              
               //Controle de saise pour le mail 
       
               var  re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
               if(adresse.value.match(re)) {
         
         document.getElementById('errorname').innerHTML=""; 
                 
                  }
                  else{
                     document.getElementById('errorname').innerHTML="Votre Email est Invalide";  
                  return false ;
                  }
       
       
       //Controle de saisie pour le nom
                if (name.value == ""){ 
                        document.getElementById('errorname').innerHTML="Veuillez entrez Votre Nom";  
                        name.focus(); 
                        return false; 
                    }else{
                        document.getElementById('errorname').innerHTML="";  
                    }
       
                    if (name.value.substring(0,1)<'A'||name.value.substring(0,1)>'Z' ){ 
                        document.getElementById('errorname').innerHTML="Veuillez entrez un nom commancant par une lettre majuscule";  
                        name.focus(); 
                        return false; 
                    }else{
                        document.getElementById('errorname').innerHTML="";  
                    }
       //Control de saisie de Tel
       
       
       var t = /^\d{8}$/;
       if (!(isNaN(phone)) || phone.value.match(t) ){
       
           document.getElementById('errorname').innerHTML=""; 
                 
               }
               else{
                  document.getElementById('errorname').innerHTML="Votre Telephone est Invalide";  
               return false ;
               }
       
            
       
               var daterr=document.querySelector("#dater").value;
       
       if(daterr === ""){
           document.getElementById('error').innerHTML="Vous Devez Choisir Un date";
           return false;
       
       }else{
           var today= new Date();
           daterr=new Date(daterr);
           var dayChosen=daterr.getDate();
           var daytoday=today.getDate();
           if(dayChosen < daytoday){
               document.getElementById('error').innerHTML="Votre Date est invalide";
               return false;
           }else{
               document.getElementById('error').innerHTML="Votre date est Valide !"
           }
       
       }
              
         }


