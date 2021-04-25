<?php

class plat 
{
	private $id_plat;
	private $nom;
	private $image;
	private $description;
	private $prix;


	function __construct($nom,$image,$description,$prix)
	{
		$this->nom=$nom;
		$this->image=$image;
		$this->description=$description;
		$this->prix=$prix;
	}


function getid(){return $this->id_plat;}
function getnom(){return $this->nom;}
function getimage(){return $this->image;}
function getdescription(){return $this->description;}
function getprix(){return $this->prix;}

public function set_id($id_plat) 
		{ $this->id_plat = $id_plat;}
public function set_nom($nom)	 
		{$this->nom = $nom;}
public function set_image($image)
		{$this->image = $image;}
public function set_description($description)
		{$this->description = $description;}

public function set_prix($prix)
		{$this->prix = $prix;}






}

?>