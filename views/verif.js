function verif() {
    
    var erreur = document.querySelector('#erreur').value;
    var erreur2= document.querySelector('#erreur2').value;
    var erreur3= document.querySelector('#erreur3').value;
    var nom = document.querySelector('#nom').value;
    /*  document.getElementById('nom').value
    */
    var prenom = document.querySelector('#prenom').value;
    var pass = document.querySelector('#pass').value
    var pass1 = document.querySelector('#pass1').value;


    if (nom.charAt(0) < 'A' || nom.charAt(0) > 'Z') {
        //document.getElementById('erreur').innerHTML = "Le nom doit commencer par une lettre Majuscule";
        //return false;
        erreur2 += "Le nom doit commencer par une lettre Majuscule ";
    }
    if (prenom.charAt(0) < 'A' || prenom.charAt(0) > 'Z') {
        erreur += "Le prenom doit commencer par une lettre Majuscule ";
    }
 
  

 

    if (pass !== pass1 || pass === "" || pass1 === "") {
        erreur3 += "<li> Veuillez vérifier le mot de passe saisi </li>";
        document.querySelector('#pass').value = "";
        document.querySelector('#pass1').value = "";
        document.querySelector('#pass').focus();
    }

    if (errors !== "<ul>") {
        document.querySelector('#erreur').style.color = 'red';
        errors += "</ul>"
        document.getElementById('erreur').innerHTML = errors;
        return false;
    }


}