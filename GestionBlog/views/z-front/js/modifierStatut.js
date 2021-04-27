document.getElementById('form-statut-modifier').addEventListener("submit",function(e)
{

	var errur;
	var titre=document.getElementById("titre");
	var contenu=document.getElementById("contenu");


if(!titre.value || !contenu.value )
{
	errur="Le titre et le contenu sont obligatoire";
}

if(errur)
{	e.preventDefault();
	alert(errur);
}

});