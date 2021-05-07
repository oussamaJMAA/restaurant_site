
document.getElementById('ajouter-commentaire').addEventListener("submit",function(a)
{

	var errur;
	var contenu=document.getElementById("contenu");

if(!contenu.value)
{
	errur="Commentaire vide n'accepte pas";
}

if(errur)
{	a.preventDefault();
	alert(errur);
}

});