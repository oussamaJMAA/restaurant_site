<?php

/**
 * 

 */
class rec
{
	private $id_recette;
	private $nom;
	private $image;
	private $description;
	


	function __construct($nom,$image,$description)
	{
		$this->nom=$nom;
		$this->image=$image;
		$this->description=$description;
		
	}


function getid(){return $this->id_recette;}
function getnom(){return $this->nom;}
function getimage(){return $this->image;}
function getdescription(){return $this->description;}


public function set_id($id_recette) 
		{ $this->id_plat = $id_recette;}
public function set_nom($nom)	 
		{$this->nom = $nom;}
public function set_image($image)
		{$this->image = $image;}
public function set_description($description)
		{$this->description = $description;}








}

?>