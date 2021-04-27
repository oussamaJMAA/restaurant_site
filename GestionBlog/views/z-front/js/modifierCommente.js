document.getElementById('modifier-commentaire').addEventListener("submit",function(e)
{

	var errur;
	var contenu=document.getElementById("contenu");

if(!contenu.value)
{
	errur="Commentaire vide n'accepte pas";
}

if(errur)
{	e.preventDefault();
	alert(errur);
}

});



