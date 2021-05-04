document.getElementById('modifierPlat-form').addEventListener("submit",function(e)
{

	var errur;
	var description=document.getElementById("description");


if(!description.value )
{
	errur="La description est obligatoire";
}

if(errur)
{	e.preventDefault();
	alert(errur);
}

});