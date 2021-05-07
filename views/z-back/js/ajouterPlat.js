document.getElementById('ajouterPlat-form').addEventListener("submit",function(e)
{

	var errur;
	var description=document.getElementById("description");
	var image=document.getElementById("image");


if(!description.value || !image.value)
{
	errur="Tout les champs sont obligatoire";
}

if(errur)
{	e.preventDefault();
	alert(errur);
}

});