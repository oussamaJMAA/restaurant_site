document.getElementById('form-statut').addEventListener("submit",function(e)
{

	var errur;
	var titre=document.getElementById("titre");
	var contenu=document.getElementById("contenu");
	var image=document.getElementById("image");

if(!titre.value || !contenu.value || !image.value)
{
	errur="Veuillez renseigner tous les champs";
}

if(errur)
{	e.preventDefault();
	alert(errur);
}

});

